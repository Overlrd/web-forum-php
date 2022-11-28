<?php 
require('actions/database.php');
if(isset($_GET['id']) AND !empty($_GET['id'])){
$DQuestionId =$_GET['id'];
$CheckQuestionExists =$bdd->prepare('SELECT * FROM `questions` WHERE id= ?');
$CheckQuestionExists->execute(array($DQuestionId));
if($CheckQuestionExists->rowCount() > 0){
    //recuperer le contenu de la requete
    $QuestionInfos =$CheckQuestionExists->fetch();
    //inclure chaque data de la requette dans une variable
    $question_title =$QuestionInfos['titre'];
    $question_description =$QuestionInfos['description'];
    $question_content =$QuestionInfos['contenu'];
    $question_id_author =$QuestionInfos['id_auteur'];
    $question_date_publication =$QuestionInfos['date_publication'];
    $question_pseudo_author =$QuestionInfos['pseudo_auteur'];

}else{
    $errormsg = "Aucune question n' été trouvée !";
}

}else{
    $errormsg = "Aucune question n' été trouvée !";
}