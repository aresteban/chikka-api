<?php
namespace Lib;

class Chikka {

    private $url = 'https://post.chikka.com/smsapi/request';

    private $ch;

    private $message, $recipient, $msgId, $config;

    private $fields = [
        "message_type"  => "send",
        "mobile_number" => "",
        "shortcode"     => "",
        "message_id"    => "",
        "message"       => "",
        "client_id"     => "",
        "secret_key"    => ""
    ];

    function __construct () {

        $this->config = include ('config.php');

    }

    public function init () {

        $this->ch = curl_init($this->url);

    }

    public function recipient ($mobile_number) {

        $this->recipient = $mobile_number;

    }

    public function message ($msg) {

        $this->message = $msg;

    }

    public function send () {

        $this->fields["message"]       = $this->message;
        $this->fields["message_id"]    = "123451235"; // Generate random (?)
        $this->fields["mobile_number"] = $this->recipient;

        $fields_string = http_build_query(array_merge($this->fields, $this->config));

        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);

        return curl_exec($this->ch);

    }

    public function close () {

        curl_close($ch);

    }

}
