<?php

namespace model;
use ListeGateway;
use TacheGateway;

class UtilisateurModel{

    public $gatewayListe;
    public $gatewayTache;

    public function __construct(){
        $this->gatewayListe=new ListeGateway();
        $this->gatewayTache=new TacheGateway();
    }

    public function ajout_liste_public(){
        if(ISSET($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre = $_POST['titre'];
                $this->gatewayListe->addPublicList($titre);
            }
        }
    }

    public function ajout_tache_public(){
        if(ISSET($_POST['add'])){
            if($_POST['texte'] != ""){
                $texte = $_POST['texte'];
                $idListeParent = $_POST['idListe'];
                $this->gatewayTache->addTask($texte, $idListeParent);
            }
        }
    }

    public function check_public(){
        if($_GET['id'] != ""){
            $id = $_GET['id'];
            $this->gatewayTache->checkTask($id);
        }
    }

    public function supprimer_liste_public(){
        if($_GET['id']){
            $id = $_GET['id'];
            $this->gatewayListe->delList($id);
        }
    }

    public function supprimer_tache_public(){
        if($_GET['id']){
            $id = $_GET['id'];
            $this->gatewayTache->delTask($id);
        }
    }

}

?>