<?php
if (isset($_GET['id'])) {
    require_once '../../models/Database.php';
    require_once '../../models/BaseRepository.php';
    require_once '../../models/AuthorsRepository.php';
    require_once '../../models/ArticlesRepository.php';
    $db = new Database();
    $auRep = new AuthorsRepository($db);
    $arRep = new ArticlesRepository($db);
    if(!$arRep->GetArticlesByAuthor($_GET['id'])) {
        $auRep->RemoveAuthor($_GET['id']);
    }
    Header('Location: ../Authors.php?id=' . $_GET['id']);
    die();
}
Header('Location: ../Authors.php');
die();
