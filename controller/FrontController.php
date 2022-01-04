<?php

namespace controller;
use Exception;
use model\MembreModel;
require "../metier/Connection.php";
require "../controller/MembreController.php";
require "../controller/UtilisateurController.php";

class FrontController{

    public function __construct()
    {
        session_start();
        $dVueErreur=array();
        
        try {
            $isMembre = new MembreModel();

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
                    $controllerMembre= new MembreController($isMembre);
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