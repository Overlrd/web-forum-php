<?php

require('actions/database.php');
$GetAllMyQuestions =$bdd->prepare('SELECT `id`, `titre`, `description`, `contenu` FROM `questions` WHERE id_auteur =? ORDER BY id DESC');
$GetAllMyQuestions->execute(array($_SESSION['id']));