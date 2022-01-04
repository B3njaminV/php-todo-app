<?php
class TacheGateway
{
    public function findAllTask($id){
        global $con;
        $query = "SELECT * FROM tache WHERE idParent='$id'";
        $con->executeQuery($query);
        $results=$con->getResults();

        Foreach ($results as $fetch){
            $this->tabTaches[]=new Tache($fetch['id'], $fetch['texte'], $fetch['status'], $fetch['idParent']);
        }
        return $this->tabTaches;
    }

    public function delTask($id){
        global $con;
        $query = "DELETE FROM `tache` WHERE `id` = $id";
        $con->executeQuery($query);
    }

    public function checkTask($id){
        global $con;
        $query = "UPDATE `tache` SET `status` = 'OK' WHERE `id` = $id";
        $con->executeQuery($query);
    }

    public function addTask($texte, $idParent){
        global $con;
        $query = "INSERT INTO `tache`(`texte`, `status`,`idParent`) VALUES('$texte', 'NON', '$idParent')";
        $con->executeQuery($query);
    }
}
?>
