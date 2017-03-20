<?php
namespace Lib;

class Chikka {

    /**
     * URL destination for Chikka API requests.
     * @var string
     */
    private $url = 'https://post.chikka.com/smsapi/request';


    /**
     * Variable for curl handler.
     * @var object
     */
    private $ch;


    /**
     * Variables for user specified values.
     * @var mixed
     */
    private $message, $recipient, $config;


    /**
     * Array containing data to be sent to URL.
     * @var array
     */
    private $fields = [
        "message_type"  => "send",
        "mobile_number" => "",
        "shortcode"     => "",
        "message_id"    => "",
        "message"       => "",
        "client_id"     => "",
        "secret_key"    => ""
    ];



    /**
     * Codes to run on class creation.
     * Retrieves configuration setting.
     *
     * @return null     returns no value.
     */
    function __construct () {

        $this->config = include ('config.php');

    }


    /**
     * Initailizes curl instance.
     *
     * @return bool     Returns initialization status.
     */
    public function compose () {

        $result = false;

        $this->ch = curl_init($this->url);

        if (isset($this->ch)) {
            $result = true;
        }

        return $result;

    }


    /**
     * Set list of recipients to send message to.
     *
     * @param  array  $mobile_number     List of mobile numbers to send to.
     * @return bool                      Returns true if recipients exist.
     */
    public function recipient (array $mobile_number) {

        $result = false;

        $this->recipient = $mobile_number;

        if (isset($this->recipient) && !empty ($this->recipient)) {
            $result = true;
        }

        return $result;

    }


    /**
     * Set message to be sent to recipients.
     *
     * @param  string $msg     Message to be sent to recipient(s).
     * @return bool            Returns true if message not null.
     */
    public function message ($msg = "") {

        $result = false;

        $this->message = $msg;

        if (!empty($this->message)) {
            $result = true;
        }

        return $result;

    }


    /**
     * Formats and forwards details to Chikka's server for SMS service.
     *
     *  @return array     returns an array of the sent status of each recipient.
     */
    public function send () {

        $status = array ();

        $this->fields["message"] = $this->message;

        foreach ($this->recipient as $number) {

            $this->fields["message_id"]    = uniqid();
            $this->fields["mobile_number"] = $number;

            $fields_string = http_build_query(array_merge($this->fields, $this->config));

            curl_setopt($this->ch, CURLOPT_POST, true);
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);

            $status[$number] = curl_exec($this->ch);

        }

        return $status;

    }


    /**
     * Terminates curl instance.
     *
     * @return bool     Returns termination status.
     */
    public function close () {

        curl_close($ch);

        return true;

    }


}
