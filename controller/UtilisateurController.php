<?php
namespace controller;
use Nettoyage;
require "config/Nettoyage.php";

class UtilisateurController{

    private $model;
    public function __construct($modelMembre){

        $this->model= $modelMembre;
        try{
            if(!isset($_REQUEST['action'])){
                $action=null;
            }
            else{
                $action=$_REQUEST['action'];
            }

            switch ($action){
                case NULL;
                    $this->Reinit();
                    break;

                case "ajouterListe";
                    $this->ajouterListe();
                    break;

                case "supprimerListe";
                    $this->supprimerListe();
                    break;

                case "ajouterTache";
                    $this->ajouterTache();
                    break;

                case "supprimerTache";
                    $this->supprimerTache();
                    break;

                case "checkTache";
                    $this->checkTache();
                    break;

                case "connexion";
                    $this->connexion();
                    break;

                default;
                    echo "Erreur";
                    break;
            }
        }catch(Exception $e){
            echo "Erreur !!!";
        }
    }

    public function Reinit(){
        $listeDeListePublic = $this->model->affichage_liste_public();
        require("vue/pagevisiteur.php");

    }

    public function ajouterListe(){
        if(ISSET($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre = $_POST['titre'];
                if (Nettoyage::securite($titre) != 1) {
                    $this->model->ajout_liste_public($titre);
                    $this->Reinit();
                }
            }
        }
    }

    public function supprimerListe(){
        if(ISSET($_POST['remove'])){
            if($_POST['idListeL'] != ""){
                $id = $_POST['idListeL'];
                $this->model->supprimer_liste_public($id);
                $this->Reinit();
            }
        }
    }

    public function ajouterTache(){
        if(ISSET($_POST['add'])){
            if($_POST['texte'] != ""){
                $texte = $_POST['texte'];
                $idListeParent = $_POST['idListe'];
                if (Nettoyage::securite($texte) != 1) {
                    $this->model->ajout_tache_public($texte, $idListeParent);
                    $this->Reinit();
                }
            }
        }
    }

    public function supprimerTache(){
        if(ISSET($_POST['remove'])){
            $idTe = $_POST['idTacheTe'];
            $this->model->supprimer_tache_public($idTe);
            $this->Reinit();
        }
    }

    public function checkTache(){
        if(ISSET($_POST['check'])){
            $idT = $_POST['idTacheT'];
            $this->model->check_prive($idT);
            $this->Reinit();
        }
    }

    public function connexion(){
        $this->model->deconnexion();
        $newF= new FrontController();
    }
}
?>