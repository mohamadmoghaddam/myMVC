<?php
ini_set('display_errors', '1');
require_once __DIR__ . '/../vendor/autoload.php';



function dd($input)
{
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
    die;
}




?>