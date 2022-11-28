<?php
require('actions/database.php');
if(isset($_POST['validate'])){
    if(!empty($_POST['answer'])){
        $useranswer =nl2br(htmlspecialchars( $_POST['answer']))  ;
        $answer_date =date('d/m/Y');
        $inserAnswer =$bdd->prepare('INSERT INTO `réponses`( `id_auteur`, `pseudo_auteur`, `id_question`, `contenu`, `date_publication`) VALUES (?,?,?,?,?)');
        $inserAnswer->execute(array($_SESSION['id'],$_SESSION['pseudo'],$DQuestionId,$useranswer,$answer_date));
    }else{}
}else{}