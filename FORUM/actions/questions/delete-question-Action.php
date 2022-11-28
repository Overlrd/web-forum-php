<?php 
session_start();
if(!isset($_SESSION['auth'])){
    header("Location: ../../login.php");
}
require('../database.php');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $IdOfQuestion =$_GET['id'];
    $CheckIfQuestionExists =$bdd->prepare('SELECT `id_auteur` FROM `questions` WHERE id=?');
    $CheckIfQuestionExists->execute(array($IdOfQuestion));
    if($CheckIfQuestionExists->rowCount() > 0){
        
        $questionINfos=$CheckIfQuestionExists->fetch();
        if($questionINfos['id_auteur']==$_SESSION['id']){
           
            $DeleteQuestion =$bdd->prepare('DELETE FROM `questions` WHERE id =?');
            $DeleteQuestion->execute(array($IdOfQuestion));
            if($DeleteQuestion){
                $DeleteAnswers =$bdd->prepare('DELETE FROM `réponses` WHERE `id_question` =?');
                $DeleteAnswers->execute(array($IdOfQuestion));
            }
            header("Location: ../../my-questions.php");

        }else{
            echo "Vous ne pouvez pas modifier cette question ! !";
        }

    }else{
        echo "Cette question n'existe pas !";
       // header("Location: ../../my-questions.php");
    }

}else{
    echo "Aucune question n'a été trouvée!";
}