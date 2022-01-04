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
        $tab2=$this->gatewayListe->findAllPublicList();
        return $tab2;
    }

    public function affichage_tache_public($ide){
        $tab=$this->gatewayTache->findAllTask($ide);
        return $tab;
    }

    public function ajout_liste_public($titre){
        $this->gatewayListe->addPublicList($titre);
    }

    public function ajout_tache_public($texte, $idListeParent){
        $this->gatewayTache->addTask($texte, $idListeParent);
    }

    public function supprimer_tache_public($ide){
        $this->gatewayTache->delTask($ide);
    }
    public function supprimer_liste_public($id){
        $this->gatewayListe->delList($id);
    }

    public function check_prive($id){
        $this->gatewayTache->checkTask($id);
    }

}

?>