<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['deco']))
{
    header("location:connexion.php");
    die;
}
?>