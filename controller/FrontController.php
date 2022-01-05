<?php

namespace controller;
use Exception;
use model\MembreModel;
use model\UtilisateurModel;

class FrontController{

    public function __construct()
    {
        $dVueErreur=array();
        session_start();
        try {

            $isMembre = new MembreModel();
            $isUser = new UtilisateurModel();
            if ($_REQUEST['actionM'] === "connexion") {
                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['user']))
                {
                    $isUser->connexion();
                    $controllerUser2= new UtilisateurController($isUser);
                    die;
                }

                if ($isMembre->isMembre() == NULL) {
                    require("vue/connexion.php");
                } else {
                    $controllerMembre = new MembreController($isMembre);
                }

                if (!empty($_REQUEST['user_name']) && !empty($_REQUEST['password'])) {
                    $isMembre->connexion($_REQUEST['user_name'], $_REQUEST['password']);
                }else{
                    $controllerUser= new UtilisateurController($isUser);
                }
            }else{
                if ($isMembre->isMembre() == NULL && $isUser->isUser() == NULL) {
                    require("vue/connexion.php");
                } else {
                    if ($isMembre->isMembre() == 1){
                        $controllerMembre2 = new MembreController($isMembre);
                    }
                    if($isUser->isUser() == 1){
                        $controllerUser3= new UtilisateurController($isUser);
                    }
                }
            }
        } catch (Exception $e) {
            $dVueErreur[] = "Erreur : " . $e->getMessage() . "<br/>";
            require("vue/erreur.php");
        }
    }
}
?>