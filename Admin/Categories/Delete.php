<?php
session_start();
if (!isset($_SESSION['user'])) {
    Header('Location: ../../Index.php');
    die();
}
if (!$_SESSION['user']['isAdmin']) {
    Header('Location: ../Categories.php');
    die();
}
if (isset($_GET['id'])) {
    require_once '../../models/Database.php';
    require_once '../../models/BaseRepository.php';
    require_once '../../models/CategoriesRepository.php';
    require_once '../../models/ArticlesRepository.php';
    $db = new Database();
    $caRep = new CategoriesRepository($db);
    $arRep = new ArticlesRepository($db);
    if (!$arRep->GetArticlesByCategory($_GET['id'])) {
        $caRep->RemoveCategory($_GET['id']);
    }
    Header('Location: ../Categories.php?id=' . $_GET['id']);
    die();
}
Header('Location: ../Categories.php');
die();
