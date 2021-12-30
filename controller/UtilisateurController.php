<?php

    namespace controller;

    class UtilisateurController{

        public $model;
        public function __construct(){
            global $rep, $vue, $action;
            $dVueErreur = array();

            $this->model= new UtilisateurModel($con);

            try{
                switch ($action){
                    case NULL;
                    echo "Pas d'action user";
                    break;

                    default;
                    echo "Action user";
                    break;
                }
            }
            catch(Exception $e) {
                echo "Erreur !!!";
                $dVueErreur[] = "Erreur !!!";
                require ($rep.$vue['erreur']);
            }
        }
    }

?>