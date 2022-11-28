<?php
require('actions/database.php');
$getAllAnswers =$bdd->prepare('SELECT  `id_auteur`, `pseudo_auteur`, `id_question`, `contenu`, `date_publication` FROM `réponses` WHERE id_question =? ORDER BY id DESC');
$getAllAnswers->execute(array($DQuestionId));