<?php
namespace model;
use ListeGateway;
use TacheGateway;
use UtilisateurGateway;

require "gateway/ListeGateway.php";
require "gateway/TacheGateway.php";

class MembreModel{

    public $gatewayListe;
    public $gatewayTache;

    public function __construct($con){
        $this->gatewayListe=new ListeGateway($con);
        $this->gatewayTache=new TacheGateway($con);
    }

    public function connexion($name, $password) {

        $gateway=new UtilisateurGateway($con);
        $result=$gateway->findOneUser($name);

        if($result) {
            if ($result->getPassword() == md5($password)) {
                $_SESSION['role'] = "membre";
                $_SESSION['id']=$result->getUserId();
                die;
            }else{
                echo "WRONG PASSWORD !";
            }
        }
    }

    public function isMembre() {
        if(isset($_SESSION['role']) && isset($_SESSION['id'])) {
            $role = $_SESSION['role'];
            $id = $_SESSION['login'];
            return 1;
        } else {
            return NULL;
        }
    }

    public function deconnexion() {
        $_SESSION = array();
        session_unset();
        session_destroy();
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