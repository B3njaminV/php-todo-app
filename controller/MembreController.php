<?php
    namespace controller;
    use model\MembreModel;
    require "../model/MembreModel.php";

    class MembreController{

        //public $model;
        public function __construct($con){
            global $rep, $vue, $action;
            $dVueErreur = array();

            //$this->model= new MembreModel($con);

            try{
                $isMembre = MembreController();
                if($isMembre->isMembre() == NULL){
                    require('vue/connexion.php');
                }

                switch ($action){
                    case NULL;
                        echo "Pas d'action membre";
                        break;

                    default;
                        echo "Action membre";
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