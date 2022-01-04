<?php

class ListeGateway
{
    public function findAllPrivateList(){
        global $con;
        $query = "SELECT * FROM liste WHERE status='prive'";
        $con->executeQuery($query);
        $results=$con->getResults();

        Foreach ($results as $fetch){
            $this->tabListe[]=new Liste($fetch['id'], $fetch['titre'], $fetch['status']);
        }

        return $this->tabListe;
    }

    public function findAllPublicList(){
        global $con;
        $query = "SELECT * FROM liste WHERE status='public'";
        $con->executeQuery($query);
        $results=$con->getResults();

        Foreach ($results as $fetch){
            $this->tabListesss[]=new Liste($fetch['id'], $fetch['titre'], $fetch['status']);
        }
        return $this->tabListesss;
    }

    public function delList($id){
        global $con;
        $query = "DELETE FROM `liste` WHERE `id` = $id";
        $con->executeQuery($query);
    }

    public function addPrivateList($titre){
        global $con;
        $query = "INSERT INTO `liste`(`titre`, `status`) VALUES('$titre', 'prive')";
        $con->executeQuery($query);
    }

    public function addPublicList($titre){
        global $con;
        $query = "INSERT INTO `liste`(`titre`, `status`) VALUES('$titre', 'public')";
        $con->executeQuery($query);
    }
}
?>