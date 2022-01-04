<?php

namespace controller;
use Exception;
use model\MembreModel;

class FrontController{

    public function __construct()
    {
        $dVueErreur=array();
        session_start();
        try {

            $isMembre = new MembreModel();
            if ($_REQUEST['actionM'] === "connexion") {
                if ($isMembre->isMembre() == NULL) {
                    require("vue/connexion.php");
                } else {
                    $controllerMembre = new MembreController($isMembre);
                }

                if (!empty($_REQUEST['user_name']) && !empty($_REQUEST['password'])) {
                    $isMembre->connexion($_REQUEST['user_name'], $_REQUEST['password']);
                }else{
                    $controllerUser= new UtilisateurController($isMembre);
                }
            }else{
                if ($isMembre->isMembre() == NULL) {
                    $controllerUser2= new UtilisateurController($isMembre);
                } else {
                    $controllerMembre2 = new MembreController($isMembre);
                }
            }
        } catch (Exception $e) {
            $dVueErreur[] = "Erreur : " . $e->getMessage() . "<br/>";
            require("vue/erreur.php");
        }
    }
}
?>