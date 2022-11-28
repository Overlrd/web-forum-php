<?php
require('actions/database.php');
$GetQuestions =$bdd->query('SELECT `id`, `titre`, `description`, `contenu`, `pseudo_auteur`, `id_auteur`, `date_publication` FROM `questions` WHERE 1 ORDER BY id DESC LIMIT 0,5');
if(isset($_GET['search']) AND !empty($_GET['search'])){
    $UserSearch =$_GET['search'];
    $GetQuestions =$bdd->query('SELECT `id`, `titre`, `description`, `contenu`, `pseudo_auteur`, `id_auteur`, `date_publication` FROM `questions` WHERE titre LIKE "%'.$UserSearch.'%" ORDER BY id DESC ');


}