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
                    $this->supprListe();
                    break;

                case "ajouterTache";
                    $this->ajouterTache();
                    break;

                case "supprTache";
                    $this->supprTache();
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
/*
    public function connection($userName, $password){
        validation::nettoyageChaine($userName);
        validation::nettoyageChaine($password);
        $userNameDB=$this->userGw->getUserName();
        $passwordDB=$this->userGw->getPassword();
        if(($userName==$userNameDB) && (password_verify($password,$passwordDB))){
            //$_SESSION['status']="membre";
            $_SESSION['userName']=$userName;
        }else{
            require $rep.$vue['erreur'];
            throw new Exception{"Erreur a la connection"};
        }

    }

    public function ajouterList(){

    }
*/
    public function Reinit(){
        $listeDeListe = $this->model->affichage_liste_public();
        require ("vue/pagevisiteur.php");
    }
}
?>