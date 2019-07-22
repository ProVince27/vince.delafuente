<?php
namespace Icg\Notifications\Onesignal;

use Exception;

class OneSignalService {

    protected $app_id = null;

    protected $endpoint = "https://onesignal.com/api/v1/notifications";

    protected $rest_key = null;

    protected $title = []; // title of the push notification

    protected $message = []; // push notification taht will be receive in the app

    protected $content = []; // content in the push notificaiton section

    protected $player_ids = [];

    protected $included_segment = [];

    protected $excluded_segment = [];

    protected $attachment = [];

    protected $data = [];

    public function __construct($appId = null, $rest_key = null , $endpoint = null) {
        $this->app_id   = $appId ?: config('services.onesignal.app_id');
        $this->rest_key = $rest_key ?: config('services.onesignal.rest_api_key');
        $this->endpoint = $endpoint ?? $this->endpoint;
    }

    /* @todo check if the array is a valid format */
    public function setContent(string $i, string $lang = "en") {
        $this->content[$lang] = $i;
        return $this;
    }

    public function setHeading(string $i, string $lang = "en") {
        $this->title[$lang] = $i;
        return $this;
    }

    public function setPlayerId(array $i) {
        array_push();
    }

    public function includeSegment(array $arg = ["ALL"]) {
        $this->included_segment = $arg;
        return $this;
    }

    public function setData(array $args) {
        $this->data = $args;
        return $this;
    }

    /* see valid attachment
    / https://documentation.onesignal.com/reference#section-attachments
    */
    public function setAttachment(array $args){
        $this->attachment = $args;
        return $this;
    }

    private function validateRequiredFields() {
        if (!isset($this->content) && count($this->content) < 1) {
            throw new Exception("Content can't be empty");
        }

        if (!isset($this->title) && count($this->content) < 1) {
            throw new Exception("Title can't be empty");
        }

        if (!isset($this->data)) {
            throw new Exception("Data can't be empty and must be in array");
        }
    }

    private function setup() {
        $this->validateRequiredFields();
        $fields = [
            'app_id' => $this->app_id,
        ];

        if (count($this->title) > 0) {
            $fields['headings'] = $this->title;
        }

        if (count($this->included_segment) > 0) {
            $fields['included_segments'] = $this->included_segment;
        }

        if(count($this->attachments) > 0 ){
            foreach($this->attachments as $key => $attachment){
                $fields[$key] = $attachment;
            }
        }

        /* @add validation that there must be a included segment or player_id */
        $fields['data']     = $this->data;
        $fields['contents'] = $this->content;

        return json_encode($fields);
    }

    public function send() {
        $fields = $this->setup();
        $ch     = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic ' . $this->rest_key,
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}
