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


## Usage ##
After configuring your `config.php` you can use the `chikka.php` class by initalizing its instance and calling its functions.

    $chikka = new Chikka(); // Create a chikka instance.

    $chikka->compose(); // To initialize a new SMS.

    $chikka->recipient(['09151234567']); // Set number recipient.

    $chikka->recipient('Heya ! I am from Chikka API !'); // Message to be sent.

    $chikka->send (); // Will execute the script that will pass your values to the Chikka server.

    $chikka->close(); // Close resource instance. Dont be sad, you can always open a new one.

*Note: Dont forget to `include()` your `chikka.php` at the top of your script or make sure your autoload finds it!*
