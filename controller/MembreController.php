<?php
namespace controller;

use Nettoyage;
require "config/Nettoyage.php";

class MembreController{

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

                case "deconnexion";
                    $this->deconnexion();
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
        $listeDeListe = $this->model->affichage_liste_prive();
        $listeDeListePublic = $this->model->affichage_liste_public();
        if ($listeDeListe == NULL){
            echo "<script type='text/javascript'>alert('Vous n\'avez aucune liste à votre actif');</script>";
            require("vue/pagemembre.php");
        }else{
            $this->model->affichage_tache_prive($_POST['idListeL']);
            require("vue/pagemembre.php");
        }
    }

    public function ajouterListe(){
        if(ISSET($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre = $_POST['titre'];
                if (Nettoyage::securite($titre) != 1){
                    $this->model->ajout_liste_prive($titre);
                    $this->Reinit();
                }
            }
        }
    }

    public function supprimerListe(){
        if(ISSET($_POST['remove'])){
            if($_POST['idListeL'] != ""){
                $id = $_POST['idListeL'];
                $this->model->supprimer_liste_prive($id);
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
                    $this->model->ajout_tache_prive($texte, $idListeParent);
                    $this->Reinit();
                }
            }
        }
    }

    public function supprimerTache(){
        if(ISSET($_POST['remove'])){
            $idTe = $_POST['idTacheTe'];
            $this->model->supprimer_tache_prive($idTe);
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

    public function deconnexion(){
        $this->model->deconnexion();
        $newF= new FrontController();
    }
}
?>