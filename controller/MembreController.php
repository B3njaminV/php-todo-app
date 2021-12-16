<?php

namespace controller;

class MembreController{

    public function __construct(){

        global $rep, $vue, $con;
        session_start();
        $userGw= new UtilsateurGateway($con);
        $dVueErreur=array();

        try{
            $action=$_REQUEST['action'];
            switch ($action){
                case NULL;
                $this->Reinit();
                break;

                case "ajouterListe";
                $this->ajouterListe($dVueErreur);
                break;

                case "supprimerListe";
                $this->supprimerListe($dVueErreur);
                break;

                case "ajouterTache";
                $this->ajouterTache($dVueErreur);
                break;

                case "supprimerTache";
                $this->supprimerTache($dVueErreur);
                break;

                case "checkTache";
                    $this->checkTache($dVueErreur);
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

    public function ajouterList($dVueErreur){

    }

    public function isConnected(){
        if(isset($_SESSION['userName'])){
            return true;
        }else{
            return false,
        }
    }
}