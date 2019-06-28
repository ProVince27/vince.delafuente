<?php

namespace Icg\Console\Commands;

use Illuminate\Console\Command;

class GitPushNewRelease extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'release:version';

    private $version = 1;
    private $major   = 0;
    private $minor   = 0;
    private $patch   = 0;
    private $result;
    private $note = 'New release';
    const BRANCH  = 'master'; // use only this script in a specific branch
    private $currentBranch;
    private $incrementBy = 1;
    private $origin      = 'origin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Release a new version';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();

    }

    private function setup() {
        $this->getLatestTag();
        $this->currentBranch = exec('git rev-parse --abbrev-ref HEAD');
        $data                = explode('.', $this->result);
        $this->major         = $data[0];
        $this->minor         = $data[1];
        $this->patch         = $data[2];
    }

    private function getLatestTag(): string {
        $this->info('Get latest tags from the repo to local');
        exec('git fetch --tags');
        $this->info('Get latest tag');
        exec('git describe --tags --abbrev=0', $result, $err);
        if (count($result) > 0) {
            $this->result = $result[0];
        } else {
            $this->result = sprintf("%s.%s.%s",
                $this->major,
                $this->minor,
                $this->patch
            );
        }
        return $this->result;
    }

    private function checkIfBranchCanUpdate(): bool {
        return $this->currentBranch === self::BRANCH;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        // dd("custom command");
        $this->setup();
        $this->info('curent version ' . $this->currentBranch);
        $this->setVersion();
        $this->runGitCommand();
    }

    private function setVersion() {
        if (!$this->checkIfBranchCanUpdate()) {
            $this->error("Can't create the latest tags!");
            die();
            return;
        }

        if ($this->confirm('Increment major?')) {
            $this->major += 1;
        }
        if ($this->confirm('Increment minor?')) {
            $this->minor += 1;
        }
        $this->patch += (int) $this->choice('Increment patch by:', [1, 3, 5, 10], 0);
        $this->version = sprintf('%s.%s.%s', $this->major, $this->minor, $this->patch);
        $note          = $this->ask('Add release note') ?: $this->note;
        $this->note    = sprintf('%s - %s', $note, $this->version);
    }

    private function runGitCommand() {
        $this->info("Creating a new tag {$this->version}");
        $gitTagCommit = __('project.commands.git-tag', [
            'version' => $this->version,
            'note'    => $this->note,
        ]);
        exec($gitTagCommit);
        $this->info("Pushing {$this->version} tag");
        $gitTag = __('project.commands.git-tag-push', [
            'remote' => $this->origin,
            'tag'    => $this->version,
        ]);
        exec($gitTag);
        $this->info("Successfully push {$this->version} tag");

    }
}
