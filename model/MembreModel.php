<?php
namespace model;
use ListeGateway;
use TacheGateway;
require "gateway/ListeGateway.php";
require "gateway/TacheGateway.php";

class MembreModel{

    public $gatewayListe;
    public $gatewayTache;

    public function __construct($con){
        $this->gatewayListe=new ListeGateway($con);
        $this->gatewayTache=new TacheGateway($con);
    }

    public function affichage_liste_prive(){
        $tab=$this->gatewayListe->findAllPrivateList();
        return $tab;
    }

    public function ajout_liste_prive($titre){
        $this->gatewayListe->addPrivateList($titre);
    }

    public function ajout_tache_prive(){
        if(ISSET($_POST['add'])){
            if($_POST['texte'] != ""){
                $texte = $_POST['texte'];
                $idListeParent = $_POST['idListe'];
                $this->gatewayTache->addTask($texte, $idListeParent);
                header('location:../vue/pagemembre.php');
            }
        }
    }

    public function check_prive(){
        if($_GET['id'] != ""){
            $id = $_GET['id'];
            $this->gatewayTache->checkTask($id);
            header('location:../vue/pagemembre.php');
        }
    }

    public function supprimer_liste_prive(){
        if($_GET['id']){
            $id = $_GET['id'];
            $this->gatewayListe->delList($id);
            header("location:../vue/pagemembre.php");
        }
    }

    public function supprimer_tache_prive(){
        if($_GET['id']){
            $id = $_GET['id'];
            $this->gatewayTache->delTask($id);
            header("location:../vue/pagemembre.php");
        }
    }

}

?>