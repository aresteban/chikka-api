<?php
include ('Chikka.php');
use Lib\Chikka;

$chikka = new Chikka();

$chikka->recipient ('09154343293');
$chikka->message ("Lemons");
$chikka->send();

?>
