<?php

    public class FrontController{
        public function __construct(){
            global $rep, $vue, $action;
            $listeActionCToutCassé = array();
            $listeActionMembre = array('connexion','deconnexion','checkPublic','checkPrive','ajouterListePublic','ajouterListePrive', 'ajouterTachePrive','ajouterTachePublic','supprimerListePublic','supprimerListePrive','supprimerTachePrive','supprimerTachePublic');
            $listeActionUser = array('ajouterListePublic','ajouterTachePublic','checkPublic');
            session_start();
            $dVueErreur = array();

            try{
                $isUser = new UtilisateurModel();
                $isMembre = new MembreModel();

                if(!empty($_REQUEST['action'])){
                    $action = $_REQUEST['action'];
                }

                if(in_array($action, $listeActionCToutCassé)){
                    if($action == "connexion" && !empty($_REQUEST['login']) && !empty($_REQUEST['password'])){
                        $isMembre->connexion($_REQUEST['login']), $_REQUEST['password']);
                    } elseif($action == "deconnexion") {
                        $isMembre->deconnexion();
                    }

                    if($action == "ajouterListePrive" && !empty($_REQUEST['login']) && !empty($_REQUEST['password'])) {
                        $isMembre->ajouter_liste_prive();
                    } else {
                        require('vue/connexion.php');
                    }

                    if($action == "ajouterTachePrive" && !empty($_REQUEST['login']) && !empty($_REQUEST['password'])) {
                        $isMembre->ajout_tache_prive();
                    } else {
                        require('vue/connexion.php');
                    }

                    if($action == "checkPrive"){
                        $is
                    }

                    if($action == "checkPublic"){

                    }

                    //je me souviens plus si un membre peut ajouter des taches publiques
                    if($action == "ajouterListePublic"){
                        $isMembre->ajout_liste_public();
                    }

                    if($action == "ajouterTachePublic"){
                        $isMembre->ajout_tache_public();
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