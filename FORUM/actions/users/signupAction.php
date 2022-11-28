<?php

require('actions/database.php');

if(isset($_POST['validate'])){
    //verifier que tous les champs du formulaire sont remplis

    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])) {
       //les donnees de l'user
        $user_pseudo =htmlspecialchars($_POST['pseudo']);
        $user_lastname =htmlspecialchars($_POST['lastname']);
        $user_firstname= htmlspecialchars($_POST['firstname']);
        $user_password =password_hash($_POST['password'], PASSWORD_DEFAULT);
        //verifier si l'user exite deja 
        $CheckIfUserAlreadyExists =$bdd ->prepare('SELECT pseudo FROM `users` WHERE pseudo =?');
        $CheckIfUserAlreadyExists->execute(array($user_pseudo));
        if($CheckIfUserAlreadyExists->rowCount() ==0){
            $insertUserOnWebsite =$bdd->prepare('INSERT INTO `users`( `pseudo`, `nom`, `prenom`, `mdp`) VALUES (?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));
            /*
            $get_info_req=$bdd->prepare('SELECT id, pseudo, nom, prenom FROM `users` WHERE pseudo =? AND nom =? AND prenom =?');
            $get_info_req->execute(array($user_pseudo, $user_lastname, $user_firstname));
            $user_infos =$get_info_req->fetch();
            //authentifier l'user sur le site et recuperer ses infos via des variables sessions
            $_SESSION['auth']=true;
            $_SESSION['id'] =$user_infos['id'];
            $_SESSION['lastname'] =$user_infos['nom'];
            $_SESSION['firstname'] =$user_infos['prenom'];
            $_SESSION['pseudo'] =$user_infos['pseudo'];
            //rediriger l'user vers la page de connexion index.php */
            header("Location: login.php");

        }else{ 
            $errormsg="L'utilisateur existe deja sur le site";
        }




    }else{
        $errormsg ="Veuillez completer tous les champs";
    }
}