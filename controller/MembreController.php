<?php
namespace controller;

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

                case "affichage";
                    $this->affichage();
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

        if ($listeDeListe == NULL){
            echo "Pas de Liste !!";
            require("vue/pagemembre.php");
        }else{
            require("vue/pagemembre.php");
        }
    }

    public function deconnexion(){
        $this->model->deconnexion();
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

    public function checkTache(){
        $this->model->check_prive();
    }

    public function affichageTache(){
        $listeDeTache = $this->model->affichage_tache_prive($_REQUEST['idListe']);
    }

    public function ajouterTache(){
        if(ISSET($_POST['add'])){
            if($_POST['texte'] != ""){
                $texte = $_POST['texte'];
                $idListeParent = $_POST['idListe'];
                $this->model->ajout_tache_prive($texte, $idListeParent);
                $this->Reinit();
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

    public function supprimerTache(){
        $this->model->supprimer_tache_prive();
    }

}
?>