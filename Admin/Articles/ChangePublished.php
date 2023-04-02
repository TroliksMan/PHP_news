<?php
session_start();
if(!isset($_SESSION['user'])) {
    Header('Location: ../../Index.php');
    die();
}
if(isset($_GET['id'])) {
    require_once '../../models/Database.php';
    require_once '../../models/BaseRepository.php';
    require_once '../../models/ArticlesRepository.php';
    $db = new Database();
    $arRep = new ArticlesRepository($db);
    $arRep->ChangePublished($_GET['id']);
}
Header('Location: ../Articles.php');
die();