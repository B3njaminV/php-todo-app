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
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <h3 class="text-primary">PHP - Simple To Do List App</h3>
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
        require('connection.php');
        $query = $connection->query("SELECT * FROM `tache`");
        while($fetch = $query->fetch_array()){
            ?>
            <tr>
                <td>
                <?php
                if($fetch['status'] == "OK"){
                    echo
                       '<strike>'.$fetch['texte'].'</strike>';
                }else{
                    echo $fetch['texte'];
                }
                ?>
                </td>
                <td colspan="2">
                    <center>
                        <?php
                        if($fetch['status'] != "OK"){
                            echo
                                '<a href="check.php?id='.$fetch['id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
                        }
                        ?>
                        <a href="supprimer_tache.php?id=<?php echo $fetch['id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>