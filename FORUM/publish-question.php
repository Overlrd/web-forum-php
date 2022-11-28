<?php 
require('actions/users/securityAction.php') ;
require('actions/questions/publish-question-Action.php') ;


?> 
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';  ?>
<?php include 'includes/navbar.php'; ?>
<body>
<br><br>
<form class="container" method="POST">
  <?php
   if(isset($errormsg))
    { echo '<p>'.$errormsg.'</p>';
    }elseif(isset($succesmsg)){
      echo '<p>'.$succesmsg.'</p>';
    }
  ?>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de la quetion</label>
    <input type="text" class="form-control" name="title" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description de la question </label>
    <textarea type="text" class="form-control" name="description" ></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
    <textarea type="text" class="form-control"  name="content"></textarea>
  </div>
  
 
  <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
  
</form>
</body>
</html>