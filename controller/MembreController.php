<?php
namespace controller;

class MembreController{

    private $model;

    public function __construct($con, $modelMembre){
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

                case "affichage";
                    $this->affichage();
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
        require("vue/pagemembre.php");
    }

    public function ajouterListe(){
        if(ISSET($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre = $_POST['titre'];
                $this->model->ajout_liste_prive($titre);
                $this->Reinit();
            }
        }
    }

    public function affichage(){
        $this->model->affichage_liste_prive();
    }

    public function checkTache(){
        $this->model->check_prive();
    }

    public function ajouterTache(){
        $this->model->ajout_tache_prive();
    }

    public function supprimerListe(){
        $this->model->supprimer_liste_prive();
    }

    public function supprimerTache(){
        $this->model->supprimer_tache_prive();
    }

}
?>