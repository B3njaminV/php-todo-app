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
            <form method="post">
                <div class="tab" width="15px">
                    <button id="button" name="deco" class="tablinks" type="submit">Connexion</button>
                    <input type="hidden" name="action" value="connexion">
                </div>
            </form>
        </div>

    </center>
</nav>

<center>
    <form method="POST" class="form-inline" action="">
        <input type="text" class="form-control" name="titre" required/>
        <input type="hidden" name="idMembre" value="<?php //echo $idUser?>">
        <input type="hidden" name="action" value="ajouterListe">
        <button class="btn btn-primary form-control" name="add">Ajouter Liste Public</button>
    </form>
</center>
<div class="col-md-4"></div>
<br/><br/><br/>
<div class="col-md-4"></div>
<?php
Foreach ($listeDeListePublic as $lp){
    ?>
    <div class="col-md-6 well">
        <h3 class="text-primary">
            <?php
            echo $lp->getTitre();
            ?>
            <form method="POST" class="btn btn-danger" action="">
                <input type="hidden" name="idListeL" value="<?php echo $lp->getId()?>">
                <input type="hidden" name="action" value="supprimerListe">
                <button name="remove" class="glyphicon glyphicon-remove"></button>
            </form>
        </h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <center>
                <form method="POST" class="form-inline" action="">
                    <input type="hidden" name="idListe" value="<?php echo $lp->getId()?>">
                    <input type="text" class="form-control" name="texte" required/>
                    <input type="hidden" name="action" value="ajouterTache">
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
            $gateway = new TacheGateway();
            $tabTache=$gateway->findAllTask($lp->getId());
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
                                ?>
                                <form method="POST" class="btn btn-success" action="">
                                    <input type="hidden" name="idTacheT" value="<?php echo $t->getId()?>">
                                    <input type="hidden" name="action" value="checkTache">
                                    <button name="check" class="glyphicon glyphicon-check"></button>
                                </form> |
                            <?php } ?>
                            <form method="POST" class="btn btn-danger" action="">
                                <input type="hidden" name="idTacheTe" value="<?php echo $t->getId()?>">
                                <input type="hidden" name="action" value="supprimerTache">
                                <button name="remove" class="glyphicon glyphicon-remove"></button>
                            </form>
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