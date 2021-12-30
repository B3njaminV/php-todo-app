<?php

public class FrontController{
    public function __construct(){
        global $rep, $vue, $action;

        $listeAction = array('connexion','deconnexion', 'ajouterListe','ajouterTache','supprimerListe','supprimerTache');
        session_start();
        $dVueErreur = array();

        try{
            $isMembre = new MembreModel();

            if(!empty($_REQUEST['action'])){
                $action = $_REQUEST['action'];
            }

            if(in_array($action, $listeAction)){
                if($action == "connexion" && !empty($_REQUEST['login']) && !empty($_REQUEST['password'])){
                    $isMembre->connexion($_REQUEST['login']), $_REQUEST['password']);
                } elseif($action == "deconnexion") {
                    $isMembre->deconnexion();
                }

                if($isMembre->isMembre() == NULL){
                    require('vue/connexion.php');
                } else {
                    $membre = new MembreController();
                }
            } else {
                $user = new UtilisateurController();
            }
        }
        catch (Exception $e){
            $dVueErreur[] = "Erreur : ".$e->getMessage()."<br/>";
            require($rep.$vue['erreur']);
        }
    }
}
?>