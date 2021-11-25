<?php
class Tache{

    private $id;
    private $texte;
    private $status;

    public function __construct($id, $texte, $status){
        $this->id=$id;
        $this->texte= $texte;
        $this->status= $status;
    }
}