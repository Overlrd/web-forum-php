<?php session_start();
      require('actions/users/ShowProfile.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php  include 'includes/head.php';?>
   

<body>
    <?php  include 'includes/navbar.php';?>
    <?php if(isset($errormsg)){echo $errormsg ;} ?>
    <br><br>
    <div class="container">
            <?php 
                if(isset($UserQuestions)){
                    ?>
                    <div class="card">
                       
                        <div class="card-body">
                            <h3>@<?= $User_Pseudo  ;?></h3> 
                            <br>
                            <p><?= $User_First_Name.' '.$User_Name ; ?></p>
                        </div>
                        
                    </div>
                    <br><br>
                    <?php
                    while($question =$UserQuestions->fetch()){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <p><?= $question['titre']; ?></p>
                            </div>
                            <div class="card-body">
                            <p><?= $question['contenu']; ?></p>
                            </div>
                            <div class="card-footer">
                            <p>Publié par <?=  $User_Pseudo.' le '.  $question['date_publication']; ?></p>
                            </div>
                            
                        </div>
                        <br>
                        <?php
                    
                    }
                   
                }    
            ?>
     </div>
</body>
</html>