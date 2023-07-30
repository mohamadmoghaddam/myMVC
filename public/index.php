<?php
ini_set('display_errors', '1');

use Core\App;
require_once __DIR__ . '/../vendor/autoload.php';
use \Base\Classes\Session;

Session::init();
new App();
function dd($input)
{
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
    die;
}




?>
