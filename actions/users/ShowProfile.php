<?php
include 'actions/database.php';
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $UserId =$_GET['id'];
    $ProfileInfos =$bdd->prepare('SELECT  `pseudo`, `nom`, `prenom` FROM `users` WHERE id =?');
    $ProfileInfos->execute(array($UserId));
    if($ProfileInfos->rowCount() >0){
        $UserInfos =$ProfileInfos->fetch();

        $User_Pseudo = $UserInfos['pseudo'];
        $User_Name   = $UserInfos['nom'];
        $User_First_Name =$UserInfos['prenom'];

        $UserQuestions =$bdd->prepare('SELECT  `titre`, `description`, `contenu`, `id_auteur`,  `date_publication` FROM `questions` WHERE id_auteur =? ORDER BY id DESC ');
        $UserQuestions->execute(array($UserId));
        
    }else{
        $errormsg ="Aucun utilisateur trouvé" ;
    }
}else{
        $errormsg ="Aucun utilisateur trouvé" ;
}