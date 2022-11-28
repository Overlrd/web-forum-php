<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/my-questions-Action.php');
   
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <div class="container">
    <?php
     while($questions =$GetAllMyQuestions->fetch()){
        ?>
        <div class="card">
            <div class="card-header">
                <a href="article.php?id=<?= $questions['id'] ;?>" >
                   <?php echo $questions['titre'] ; ?> 
                </a> 
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $questions['description']; ?></p>
                <a href="article.php?id=<?= $questions['id'] ;?>" class="btn btn-primary">Acceder à la question</a>
                <a href="edit-question.php?id=<?= $questions['id'] ;?>" class="btn btn-warning">Modifier la question  </a>
                <a href="actions/questions/delete-question-Action.php?id=<?= $questions['id'] ;?>" class="btn btn-danger">Supprimer la question  </a>

            </div>
        </div>
        <br>
     <?php
     }
     
    ?>
    </div>
</body>
</html>