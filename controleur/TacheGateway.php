<?php
class TacheGateway
{
    private $con;

    public function __construct($con){
        $this->con=$con;
    }

    public function findAllTask($id){
        $query = "SELECT * FROM tache WHERE idParent='$id'";
        $this->con->executeQuery($query);
        $results=$this->con->getResults();

        Foreach ($results as $fetch){
            $this->tabTaches[]=new Tache($fetch['id'], $fetch['texte'], $fetch['status'], $fetch['idParent']);
        }
        return $this->tabTaches;
    }

    public function delTask($id){
        $query = "DELETE FROM `tache` WHERE `id` = $id";
        $this->con->executeQuery($query);
    }

    public function checkTask($id){
        $query = "UPDATE `tache` SET `status` = 'OK' WHERE `id` = $id";
        $this->con->executeQuery($query);
    }

    public function addTask($texte, $idParent){
        $query = "INSERT INTO `tache`(`texte`, `status`,`idParent`) VALUES('$texte', 'NON', '$idParent')";
        $this->con->executeQuery($query);
    }
}
?>
