<?php

use controller\Autoload;
//error_reporting(0);
require "Connection.php";

require_once "config/Chargement.php";
Autoload::charger();

$Fcont = new \controller\FrontController();
?>