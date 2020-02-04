<?php

require '../config/db.php';
require '../vendor/autoload.php';


$router = new \App\config\Router();
$router->run();