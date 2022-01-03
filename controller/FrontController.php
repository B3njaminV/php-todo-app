<?php

namespace controller;

require "metier/Connection.php";
use model\MembreModel;
require "model/MembreModel.php";
require "MembreController.php";
require "UtilisateurController.php";

class FrontController{

    public function __construct()
    {
        session_start();
        $dVueErreur=array();
        
        try {
            $isMembre = new MembreModel($con);

            if(!empty($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            }

            if ($action === "connexion") {
                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['member'])) {
                    if (!empty($_REQUEST['user_name']) && !empty($_REQUEST['password'])) {
                        $isMembre->connexion($_REQUEST['user_name'], $_REQUEST['password']);
                    }
                }

                if ($isMembre->isMembre() == NULL) {
                    require("vue/connexion.php");
                }else {
                    $controllerMembre= new MembreController($con, $isMembre);
                }

                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['user']))
                {
                    $controllerUser= new UtilisateurController($con);
                }

            }
        } catch (Exception $e) {
            $dVueErreur[] = "Erreur : " . $e->getMessage() . "<br/>";
            require("vue/erreur.php");
        }
    }
}
?>