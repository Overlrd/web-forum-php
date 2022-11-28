<?php 
require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfQuestion =$_GET['id'] ;
    $CheckIfQuestionExists =$bdd->prepare('SELECT * FROM `questions` WHERE id = ?');
    $CheckIfQuestionExists->execute(array($idOfQuestion));
    if($CheckIfQuestionExists->rowCount() >0){
        echo  "<script>console.log('question exists')</script>";
        $questionInfos =$CheckIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] ==$_SESSION['id'])
        {
            $question_title =$questionInfos['titre'] ;
            $question_description=$questionInfos['description'];
            $question_content =$questionInfos['contenu'] ;
            $question_date =$questionInfos['date_publication'];
           
            $question_content= str_replace('<br />' ,'',$question_content);
            $question_description= str_replace( '<br />' ,'',$question_description);

       
         }else{
            $errormsg ="Vous n'etes pas l'auteur de cette question  !";
        }

    }else{
        $errormsg ="Aucune question n'a été trouvée !";
    }

}else{
    $errormsg ="Aucune question n'a été trouvée !";
}
