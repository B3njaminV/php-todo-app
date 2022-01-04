<?php
namespace model;
use ListeGateway;
use TacheGateway;
use UtilisateurGateway;

class MembreModel{

    public $gatewayListe;
    public $gatewayTache;

    public function __construct(){
        $this->gatewayListe=new ListeGateway();
        $this->gatewayTache=new TacheGateway();
    }

    public function connexion($name, $password) {
        $gateway=new UtilisateurGateway();
        $result=$gateway->findOneUser($name);

        if($result) {
            if ($result->getPassword() == md5($password)) {
                $_SESSION['role'] = "membre";
                $_SESSION['id']=$result->getUserId();
                die;
            }else{
                echo "MAUVAIS MOT DE PASSE !";
            }
        }
    }

    public function isMembre() {
        if(isset($_SESSION['role']) && isset($_SESSION['id'])) {
            $role = $_SESSION['role'];
            $id = $_SESSION['id'];
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

    public function affichage_tache_prive($ide){
        $tab=$this->gatewayTache->findAllTask($ide);
        return $tab;
    }

    public function ajout_liste_prive($titre){
        $this->gatewayListe->addPrivateList($titre);
    }

    public function ajout_tache_prive($texte, $idListeParent){
        $this->gatewayTache->addTask($texte, $idListeParent);
    }

    public function supprimer_liste_prive($id){
        $this->gatewayListe->delList($id);
    }


    public function check_prive(){
        if($_GET['id'] != ""){
            $id = $_GET['id'];
            $this->gatewayTache->checkTask($id);
        }
    }

    public function supprimer_tache_prive(){
        if($_GET['id']){
            $id = $_GET['id'];
            $this->gatewayTache->delTask($id);
        }
    }

}

?>