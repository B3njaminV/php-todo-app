<?php

use controller\Autoload;

require "Connection.php";

require_once "config/Chargement.php";
Autoload::charger();

$Fcont = new \controller\FrontController();
?>