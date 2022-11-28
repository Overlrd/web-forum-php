<?php 
require('actions/database.php');
if(isset($_POST['validate'])){
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        $new_question_title =htmlspecialchars($_POST['title']);
        $new_question_description =nl2br(htmlspecialchars($_POST['description']));
        $new_question_content =nl2br(htmlspecialchars($_POST['content']));
        $EditQuestionOnSite =$bdd->prepare('UPDATE `questions` SET `titre`=? ,`description`=?, `contenu`=? WHERE id =?');
        $EditQuestionOnSite->execute(array($new_question_title, $new_question_description, $new_question_content ,$idOfQuestion));
        header("Location: my-questions.php");

    }else{
        $errormsg ="Veuillez completer tous les champs !!";
    }

}