<?php
class ListeGateway
{
    private $con;

    public function __construct($con){
        $this->con=$con;
    }

    public function findAllPrivateList(){
        $query = "SELECT * FROM liste WHERE status='prive'";
        $this->con->executeQuery($query);
        $results=$this->con->getResults();

        Foreach ($results as $fetch){
            $this->tabListe[]=new Liste($fetch['id'], $fetch['titre'], $fetch['status']);
        }
        return $this->tabListe;

    }

    public function delList($id){
        $query = "DELETE FROM `liste` WHERE `id` = $id";
        $this->con->executeQuery($query);
    }

    public function addPrivateList($titre){
        $query = "INSERT INTO `liste`(`titre`, `status`) VALUES('$titre', 'prive')";
        $this->con->executeQuery($query);
    }

    public function addPublicList($titre){
        $query = "INSERT INTO `liste`(`titre`, `status`) VALUES('$titre', 'public')";
        $this->con->executeQuery($query);
    }
}
?>