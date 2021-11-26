<?php
class UtilisateurGateway
{
    private $con;

    public function __construct($con){
        $this->con=$con;
    }

    public function findOneUser($name){
        $query = "SELECT * FROM utilisateur WHERE user_name = '$name' limit 1";
        $this->con->executeQuery($query);
        $results=$this->con->getResults();

        Foreach ($results as $fetch){
            $this->result=new Utilisateur($fetch['user_id'], $fetch['user_name'], $fetch['password']);
        }
        return $this->result;
    }

}
?>
