<?php

session_start();
if (!isset($_SESSION['user'], $_GET['id'])) {
    Header('Location: ../Authors.php');
    die();
}
if(!$_SESSION['user']['isAdmin']) {
    Header('Location: ../Authors.php');
    die();
}

require_once '../../models/Database.php';
require_once '../../models/BaseRepository.php';
require_once '../../models/AdminsRepository.php';


$adminRepo = new AdminsRepository(new Database());
$adminRepo->ChangeAdmin($_GET["id"]);
Header('Location: ../Authors.php');

