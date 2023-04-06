<?php
session_start();
if (!isset($_SESSION['user'])) {
    Header('Location: ../../Index.php');
    die();
}

if (isset($_GET['id'])) {
    if ($_GET['id'] != $_SESSION['user']['id'] && !$_SESSION['user']['isAdmin']) {
        Header('Location: ../Authors.php');
        die();
    }

    require_once '../../models/Database.php';
    require_once '../../models/BaseRepository.php';
    require_once '../../models/AdminsRepository.php';
    require_once '../../models/ArticlesRepository.php';
    $db = new Database();
    $auRep = new AdminsRepository($db);
    $arRep = new ArticlesRepository($db);
    if (!$arRep->GetArticlesByAuthor($_GET['id'])) {
        $auRep->RemoveAuthor($_GET['id']);
        if (!$_SESSION['user']['isAdmin'])
            Header('Location: ../Logout.php');
        else
            Header('Location: ../Authors.php');

    } else
        Header('Location: ../Authors.php?id=' . $_GET['id']);

    die();
}
Header('Location: ../Authors.php');
die();
