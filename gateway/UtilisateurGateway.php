<?php
class UtilisateurGateway
{

    public function findOneUser($name){
        global $con;
        $query = "SELECT * FROM utilisateur WHERE user_name = '$name' limit 1";
        $con->executeQuery($query);
        $results=$con->getResults();

        Foreach ($results as $fetch){
            $this->result=new Utilisateur($fetch['user_id'], $fetch['user_name'], $fetch['password']);
        }
        return $this->result;
    }
}
?>
