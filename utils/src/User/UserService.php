<?php

namespace Icg\User;

use App\Models\Permission;
use App\Models\Team;
use App\Models\User;
use Exception;
use Icg\Files\ImageService;

class UserService {

    private function baseCreate(array $args, User $modifier = null) {
        try {
            $team = $this->setTeam($args);
            $data = $this->unsetData($args);

            if (inConsole()) {
                $this->setImage($data);
            }

            $user = null;
            if (!is_null($modifier)) {
                $user = User::createWithModifier($data, $modifier);
            } else {
                $user = User::createWithAuthUser($data);
            }
            $this->setRoles($args, $user, $team);
            $this->setPermissions($args, $user, $team);
            $this->setCategories($args, $user);
            $this->setChannels($args, $user);
            $this->setClients($args, $user);

            return $user;
        } catch (Exception $e) {
            dd($e);
        }
    }

    private function unsetData($data) {
        $args = ['client_id', 'team_id', 'role_id', 'level', 'category_id', 'permissions', 'channel_id'];
        foreach ($args as $a) {
            foreach ($data as $d) {
                unset($data[$a]);
            }
        }
        return $data;
    }

    public function setImage(&$args, $prefix = 'profile') {
        if (key_exists('image', $args)) {
            $image       = $args['image'];
            $path        = "images/$prefix";
            $packagePath = public_path($path);
            $file        = uniqid();
            $content     = ImageService::generateBase64Image($packagePath, $image, [
                'name'        => $file,
                'enhancement' => 0,
            ]);
            return $args['image'] = sprintf('%s/%s/%s', url('/'), $path, $file . '.png');
        }
    }

    public function createWithAuthUser(array $args) {
        return $this->baseCreate($args);
    }

    public function create(array $args, User $modifier) {
        return $this->baseCreate($args, $modifier);
    }

    public function setRoles($args, $user, $teams = null) {
        if (key_exists('role_id', $args)) {
            $roles = $args['role_id'];

            $teams = !is_array($teams) ? [$teams] : $teams;
            foreach ($teams as $team) {
                $user->attachRole($roles, $team);
            }
        }
    }

    public function setPermissions($args, $user, $teams = null) {
        $teams = !is_array($teams) ? [$teams] : $teams;

        if (key_exists('permissions', $args)) {
            $permissions  = Permission::addReadWrite($args['permissions']);
            $permissions  = Permission::whereIn('name', $permissions)->get();
            $capabilities = [];
            foreach ($permissions as $permission) {
                $capabilities[] = $permission;
            }
            $user->syncPermissions($capabilities);
        }
    }

    public function setTeam(array $args = []) {
        if (key_exists('team_id', $args)) {
            $team_id = $args['team_id'];

            // if team is array, get all team
            if (is_array($team_id)) {
                $teams = [];
                foreach ($team_id as $team) {
                    array_push($teams, Team::find($team));
                }
                return $teams;
            } else {
                return Team::find($team_id);
            }
        }

        return null;
    }
}
