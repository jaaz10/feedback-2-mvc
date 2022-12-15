<?php

$db_name = 'mysql:host=localhost;dbname=php_dev';
$db_user_name = 'root';
$db_user_pass = '';

$conn = new PDO($db_name, $db_user_name, $db_user_pass);

function create_unique_id()
{
   $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   $rand = array();
   $length = strlen($str) - 1;

   for ($i = 0; $i < 20; $i++) {
      $n = mt_rand(0, $length);
      $rand[] = $str[$n];
   }
   return implode($rand);
}

// create cookies with unique ids for each users 

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   setcookie('user_id', create_unique_id(), time() + 60 * 60 * 24 * 30, '/');
   header('location:products.php');
}
