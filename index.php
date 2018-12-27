<?php 

// regular expressions
// $str = "hello my name is Seda  2000";
// $pat = "/[0-9]+/";
// $result = preg_match($pat, $str);
// var_dump($result);
////////////////////////////////
// $string = "21-02-2018";
// $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
// $replace = "Year $3, month $2, day $1";

// echo preg_replace($pattern, $replace, $string);




 ?>

 <?php 

 //FRONT CONTROLLER

 // 1.General Settings

ini_set('display_errors', 1);
error_reporting(E_ALL);


 // 2.FIlE connection


//function define for defineing constants
// first argument for name ,,,the second for value
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
// echo(ROOT);
 // 3.Connect DB
 // 4.Call Router

$router = new Router();
$router ->run();

  ?>


  https://youtu.be/aPoNUhUzjg8?t=1126