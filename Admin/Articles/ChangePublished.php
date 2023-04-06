<?php
session_start();
if (!isset($_SESSION['user'])) {
    Header('Location: ../../Index.php');
    die();
}
if (isset($_GET['id'])) {
    require_once '../../models/Database.php';
    require_once '../../models/BaseRepository.php';
    require_once '../../models/ArticlesRepository.php';
    require_once '../../models/AuthorizationService.php';
    $db = new Database();

    $authService = new AuthorizationService($db);
    if (!$authService->IsAuthorized($_SESSION['user']['id'], $_GET['id'])) {
        Header('Location: ../Articles.php');
        die();
    }
    $arRep = new ArticlesRepository($db);
    $arRep->ChangePublished($_GET['id']);
}
Header('Location: ../Articles.php');
die();