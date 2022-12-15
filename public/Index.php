<?php

require '../vendor/autoload.php';
require '../core/helpers.php';
// require '../app/routes.php';
require '../app/views/index.view.php';


$EmailModel = new EmailModel(DBConnection::start()); // instance of the $conn
// $sql = 'SELECT * FROM feedback'; 
// $result = mysqli_query($db, $sql);
// $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', function () {
  // echo 'home page';
});

$router->get('/about', function () {
  echo 'about page';
});

// Run it!
$router->run();
