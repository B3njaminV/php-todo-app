<?php
require "gateway/UtilisateurGateway.php";

public class MembreController
{
    public function __construct()
    {
        global $con;
        $UserGateway=new UtilisateurGateway($con);
    }
}
?>