<?php
namespace model;
use ListeGateway;
use TacheGateway;
use UtilisateurGateway;

class UtilisateurModel{

    public $gatewayListe;
    public $gatewayTache;

    public function __construct(){
        $this->gatewayListe=new ListeGateway();
        $this->gatewayTache=new TacheGateway();
    }

    public function affichage_liste_public(){
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

    public function supprimer_tache_prive($ide){
        $this->gatewayTache->delTask($ide);
    }
    public function supprimer_liste_prive($id){
        $this->gatewayListe->delList($id);
    }


    public function check_prive($id){
        $this->gatewayTache->checkTask($id);
    }

}

?>