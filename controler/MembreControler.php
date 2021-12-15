<?php

namespace controler;

class MembreControler {
    function __construct(){

        session_start();
        $dVueErreur = array();
        try{
            $action=$_REQUEST['action'];

            switch($action){
                case NULL:
                    $this->Reinit();
                    break;

                case "jeSaisPas":
                    break;

                default:
                    $dVueErreur[]="Erreur dans l'appel";
                    require ($rep.$vues['pagemembre'])
                    break;
            }
        }
        catch (PDOException $e){
            $dVueErreur[]= "Erreur malotru";
            require ($rep.$vues['erreur'])
        }
        exit(0);
    }
}