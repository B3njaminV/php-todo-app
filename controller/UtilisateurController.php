<?php

namespace controller;

class UtilisateurController{

    public function __construct(){

        global $rep, $vue, $con;
        $userGw= new UtilsateurGateway($con);
        $dVueErreur=array();

        try{
            $action=$_REQUEST['action'];
            switch ($action){
                case NULL;
                $this->Reinit();
                break;

                case "ajouterListe";
                $this->ajouterListe;
                break;

                case "supprListe";
                $this->supprListe;
                break;

                case "ajouterTache";
                $this->ajouterTache;
                break;

                case "supprTache";
                $this->supprTache;
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

    public function Reinit(){
        session_reset();
    }

    public function isConnected(){
        if(isset($_SESSION['userName'])){
            return true;
        }else{
            return false;
        }
    }
}