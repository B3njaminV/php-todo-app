<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
<nav class="navbar navbar-default">
    <center>
        <div class="container-fluid">
            <a class="navbar-brand">PROJET</a>
        </div>

    </center>
</nav>

<center>
    <form method="POST" class="form-inline" action="ajout_liste.php">
        <input type="text" class="form-control" name="titre" required/>
        <button class="btn btn-primary form-control" name="add">Ajouter Liste</button>
    </form>
</center>
<div class="col-md-4"></div>
<br/><br/><br/>
<div class="col-md-4"></div>

<div id="Prive" class="tabcontent">
    <div class="col-md-4"></div>
    <?php
    require('metier/Connection.php');
    require("controleur/TacheGateway.php");
    require("metier/Tache.php");
    require("controleur/ListeGateway.php");
    require("metier/Liste.php");
    $gateway1=new ListeGateway($con);
    $tabListe=$gateway1->findAllPrivateList();

    Foreach ($tabListe as $l){
        ?>
        <div class="col-md-6 well">
            <h3 class="text-primary">
                <?php
                echo $l->getTitre();
                ?>
                <a href="supprimer_liste.php?id=<?php echo $l->getId()?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
            </h3>
            <hr style="border-top:1px dotted #ccc;"/>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <center>
                    <form method="POST" class="form-inline" action="ajout_tache.php">
                        <input type="text" class="form-control" name="texte" required/>
                        <button class="btn btn-primary form-control" name="add">Ajouter Tache</button>
                    </form>
                </center>
            </div>
            <br /><br /><br />
            <table class="table">
                <thead>
                <tr>
                    <th>Tache</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $gateway=new TacheGateway($con);
                $tabTache=$gateway->findAllTask();

                Foreach ($tabTache as $t){
                    ?>
                    <tr>
                        <td>
                            <?php
                            if($t->getStatus() == "OK"){
                                echo
                                    '<strike>'.$t->getTexte().'</strike>';
                            }else{
                                echo $t->getTexte();
                            }
                            ?>
                        </td>
                        <td colspan="2">
                            <center>
                                <?php
                                if($t->getStatus() != "OK"){
                                    echo
                                        '<a href="check.php?id='.$t->getId().'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
                                }
                                ?>
                                <a href="supprimer_tache.php?id=<?php echo $t->getId()?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </center>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4"></div>
        <?php
    }
    ?>
</div>

<div id="Public" class="tabcontent">

</div>


<script>
    document.getElementById("defaultOpen").click();
    function AffList(evt, choix) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(choix).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>


</body>
</html>