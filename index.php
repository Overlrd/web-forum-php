<?php 
session_start();
//require('actions/users/securityAction.php'); 
require('actions/questions/Show-Questions-Action.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'includes/head.php'; ?>
   
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <div class="container">
        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" class="form-control" name="search" >
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>

            </div>

        </form>
        <br>
        <?php
            while($questions =$GetQuestions->fetch()){
                ?>
                    <div class="card">
                        <div class="card-header" >
                          <a href="article.php?id=<?= $questions['id'] ;?>"> <?= $questions['titre'] ; ?> </a>
                        </div >
                        <div class="card-body">
                        <?= $questions['description'] ; ?>

                        </div>
                        <div class="card-footer">
                            Publié par 
                            <a href="profile.php?id=<?= $questions['id_auteur'] ;?>"><?= $questions['pseudo_auteur'] ; ?></a>
                            
                            le <?= $questions['date_publication'] ; ?>
                         </div>
                    </div>
                    <br>
                <?php
            }
        ?>
    </div>
</body>
</html>
 