<?php 
      require('actions/users/securityAction.php') ;
      require('actions/questions/Get-Question-Infos-Action.php') ;
      require('actions/questions/edit-questions-Action.php');


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
    <?php if(isset($errormsg)){ echo '<p>'.$errormsg.'</p>'; }?>
    <?php if(isset($question_description)){ 
        ?>
            <form  method="POST">
    

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la quetion</label>
                    <input type="text" class="form-control" name="title" value="<?= $question_title ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description de la question </label>
                    <textarea type="text" class="form-control" name="description" ><?= $question_description ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                    <textarea type="text" class="form-control"  name="content"><?= $question_content ?></textarea>
                </div>
                
                
                <button type="submit" class="btn btn-primary" name="validate">Modifier la question </button>
                
</form>


        <?php
    } ?>
        


   


</div>


</body>
</html>