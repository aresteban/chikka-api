# Chikka API #

A ready to use message sending script for [Chikka](https://api.chikka.com)

## Prerequisites ##
* Registered account at Chikka API. You can register [_here_](https://api.chikka.com/signup).


## Installation ##

Assuming you are registered, Chikka will provide you your account information for the next steps.

**Modifying _`config.php`_**

Your `shortcode` is the number your recipients will see once they recieve your SMS. You can find this in your Chikka account.



    "shortcode" => "XXXXXXXXX",



`client_id` is your account identification provided by Chikka.


    "client_id" => "XXXXXXXXX",


`secret_key` is used to authenticate your `client_id`.


    "secret_key" => "XXXXXXXXX",

*Note: Keep your `client_id` and `secret_key` private*
