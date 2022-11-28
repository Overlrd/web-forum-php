<?php 
session_start();
    require('actions/questions/Show-Question-Content-Action.php');
    require('actions/questions/PostAnswerAction.php');
    require('actions/questions/ShowAllAnswers.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ; ?>
<body>
    <?php include 'includes/navbar.php' ; ?>
    <div class="container">
    <?php 
    
    if(isset($errormsg)){ echo $errormsg ; }    
   
    if(isset($question_pseudo_author)){
        ?>
            <section class="show-content">
                <h3><?=  $question_title ; ?></h3>
                <br>
                <p><?=  $question_content ;?></p>
                <br>
                <small>Publié par <a href="profile.php?id=<?=$question_id_author; ?>"><?= $question_pseudo_author;?></a>  le <?= $question_date_publication ;?> </small>
            </section>
            <section class="show-answer">
                <form class="form-group" method="POST" >
                    <br><br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Réponse</label>
                    <textarea name="answer" class="form-control"></textarea>
                    <button class="btn btn-primary" type="submit" name="validate">Répondre</button>          
                </div>
                </form>
                <?php 
                    while($answer =$getAllAnswers->fetch()){ 
                        ?>
                        <div class="card">
                            <div class="card-header">
                              <a href="profile.php?id=<?=$question_id_author; ?>">  <?= $answer['pseudo_auteur'] ; ?> </a> 
                            </div>
                            <div class="card-body">
                                <?= $answer['contenu'] ;?>
                            </div>
                            <div class="card-footer">
                                <small>
                                    Publié le <?= $answer['date_publication'] ;?>
                                </small>
                            </div>
                        </div>
                        <br>
                        <?php
                    }                
                ?>
            </section>
            
        <?php
    } 
    
    ?>
    </div>
</body>
</html>