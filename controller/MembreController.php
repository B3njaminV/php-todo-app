<?php
namespace controller;
use model\MembreModel;

require "../model/MembreModel.php";

class MembreController{

    public $model;

    public function __construct($con){

        session_start();
        $this->model= new MembreModel($con);

        try{
            $action=$_REQUEST['action'];
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

    public function ajouterListe(){
        if(ISSET($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre = $_POST['titre'];
                $this->model->ajout_liste_prive($titre);
                header('location:../vue/pagemembre.php');
            }
        }
    }
}