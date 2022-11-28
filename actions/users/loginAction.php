<?php
session_start();
require('actions/database.php');

if(isset($_POST['validate'])){
    //verifier que tous les champs du formulaire sont remplis

    if(!empty($_POST['pseudo']) AND  !empty($_POST['password'])) {
       //les donnees de l'user
        $user_pseudo =htmlspecialchars($_POST['pseudo']);
        $user_password =htmlspecialchars($_POST['password']);
       //verifier via le pseudo si l'utilisateur existe
        $CheckIfUserExists =$bdd->prepare('SELECT * FROM `users` WHERE pseudo=?');
        $CheckIfUserExists->execute(array($user_pseudo));
        if($CheckIfUserExists->rowCount() >0){
            $user_infos=$CheckIfUserExists->fetch();
            //verifier le password
            if(password_verify($user_password , $user_infos['mdp'])){
                //password correct on authetifie l'user
                $_SESSION['auth']=true;
                $_SESSION['id'] =$user_infos['id'];
                $_SESSION['lastname'] =$user_infos['nom'];
                $_SESSION['firstname'] =$user_infos['prenom'];
                $_SESSION['pseudo'] =$user_infos['pseudo'];
                //rediriger l'utilisateur vers la page d acceuil
                header("Location: index.php");

            }else{
                $errormsg="Votre mot de passe est incorrect";
            }

        }else{
            $errormsg="Votre pseudo est incorrect/ $user_pseudo, $user_password";
        }




    }else{
        $errormsg ="Veuillez completer tous les champs";
    }
}