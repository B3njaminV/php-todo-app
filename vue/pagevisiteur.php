<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
<nav class="navbar navbar-default">
    <center>
        <div class="container-fluid">
            <a class="navbar-brand">PROJET</a>
            <?php
            include("../connexion/deconnexion.php")
            ?>
            <form method="post">
                <div class="tab">
                    <button id="button" name="deco" class="tablinks" type="submit">Déconnexion</button>
                </div>
            </form>
        </div>

    </center>
</nav>

<center>
    <form method="POST" class="form-inline" action="../action/ajout_liste_public.php">
        <input type="text" class="form-control" name="titre" required/>
        <button class="btn btn-primary form-control" name="add">Ajouter Liste</button>
    </form>
</center>
<div class="col-md-4"></div>
<br/><br/><br/>
<div class="col-md-4"></div>
<?php
require('../metier/Connection.php');
require("../gateway/TacheGateway.php");
require("../metier/Tache.php");
require("../gateway/ListeGateway.php");
require("../metier/Liste.php");
$gateway10 = new ListeGateway($con);
$tabListe = $gateway10->findAllPublicList();

foreach ($tabListe as $l) {
    ?>
    <div class="col-md-6 well">
        <h3 class="text-primary">
            <?php
            echo $l->getTitre();
            ?>
            <a href="../action/supprimer_liste_public.php?id=<?php echo $l->getId() ?>" class="btn btn-danger"><span
                        class="glyphicon glyphicon-remove"></span></a>
        </h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <center>
                <form method="POST" class="form-inline" action="../action/ajout_tache_public.php">
                    <input type="hidden" name="idListe" value="<?php echo $l->getId()?>">
                    <input type="text" class="form-control" name="texte" required/>
                    <button class="btn btn-primary form-control" name="add">Ajouter Tache</button>
                </form>
            </center>
        </div>
        <br/><br/><br/>
        <table class="table">
            <thead>
            <tr>
                <th>Tache</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $gateway = new TacheGateway($con);
            $tabTache = $gateway->findAllTask($l->getId());

            foreach ($tabTache as $t) {
                ?>
                <tr>
                    <td>
                        <?php
                        if ($t->getStatus() == "OK") {
                            echo
                                '<strike>' . $t->getTexte() . '</strike>';
                        } else {
                            echo $t->getTexte();
                        }
                        ?>
                    </td>
                    <td colspan="2">
                        <center>
                            <?php
                            if ($t->getStatus() != "OK") {
                                echo
                                    '<a href="../action/check_public.php?id=' . $t->getId() . '" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
                            }
                            ?>
                            <a href="../action/supprimer_tache_public.php?id=<?php echo $t->getId() ?>" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-remove"></span></a>
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
</body>
</html>