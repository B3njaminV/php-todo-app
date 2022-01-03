<?php
namespace controller;
use model\UtilisateurModel;
require "model/UtilisateurModel.php";

class UtilisateurController{

    private $model;

    public function __construct($con){
        session_start();
        $this->model= new UtilisateurModel($con);
        global $rep, $vue;
        $dVueErreur=array();

        try{
            if(!isset($_REQUEST['action'])){
                $action=NULL;
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

                case "supprListe";
                    $this->supprimerListe();
                    break;

                case "ajouterTache";
                    $this->ajouterTache();
                    break;

                case "supprTache";
                    $this->supprimerTache();
                    break;

                case "checkTache";
                    $this->checkTache();
                    break;

                case "affichage";
                    $this->affichage();
                    break;

                default;
                    $dVueErreur[]="Erreur appel php";
                    require ($rep.$vue['index.php']);
                    break;
            }
        }catch(Exception $e){
            $dVueErreur[]="Erreur malotru!";
            require($rep.$vue['erreur']);
        }
    }

    public function ajouterListe(){
        if(isset($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre=$_POST['titre'];
                $this->model->ajout_liste_public($titre);
                $this->Reinit();
            }
        }
    }

    public function affichage(){
        $this->model->affichage_liste_public();
    }

    public function checkTache(){
        $this->model->check_public();
    }

    public function ajouterTache(){
        $this->model->ajout_tache_public();
    }

    public function supprimerListe(){
        $this->model->supprimer_liste_public();
    }

    public function supprimerTache(){
        $this->model->supprimer_tache_public();
    }

    public function Reinit(){
        $listeDeListe = $this->model->affichage_liste_public();
        require ("vue/pagevisiteur.php");
    }
}
?>