<?php

namespace controller;
use model\MembreModel;
use model\UtilisateurModel;

require "model/UtilisateurModel";
require "MembreController.php";
require "UtilisateurController.php";
require("metier/Connection.php");
require("gateway/UtilisateurGateway.php");
require("metier/Utilisateur.php");

class FrontController{

    public function __construct()
    {
        session_start();
        try {
            $isUser = new UtilisateurModel();
            $isMembre = new MembreModel();

            if (!empty($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            }
            else{
                $action=$_REQUEST['action'];
            }
            if ($action === "connexion") {
                if ($action == "connexion" && !empty($_REQUEST['login']) && !empty($_REQUEST['password'])) {
                    $isMembre->connexion($_REQUEST['login']);
                }
                if ($isMembre->isMembre() == NULL) {
                    require("vue/connexion.php");
                }
            }
        } catch (Exception $e) {
            $dVueErreur[] = "Erreur : " . $e->getMessage() . "<br/>";
            require("vue/erreur.php");
        }
    }
}

?>