<?php
session_start();
if (!isset($_SESSION['user'])) {
    Header('Location: ../Index.php');
    die();
}
$isAdmin = $_SESSION['user']['isAdmin'];
require_once '../models/HeadingAdmin.php';
require_once '../models/Database.php';
require_once '../models/BaseRepository.php';
require_once '../models/CategoriesRepository.php';

$db = new Database();
$caRep = new CategoriesRepository($db);
$categories = $caRep->GetCount();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP News - ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <style>
        .no-underline {
            text-decoration: none;
        }

        nav a.active {
            border-bottom: 3px solid white;
        }
    </style>
</head>
<body>
<?php $hd = new HeadingAdmin();
$hd->Draw('categories');
?>
<main class="container d-flex justify-content-center">
    <div class="col-md-8 mb-5">
        <div class="py-4 mb-4 border-bottom d-flex justify-content-between">
            <h3 class="fst-italic">Všechny kategorie</h3>
            <?php if ($isAdmin): ?>
                <div>
                    <a href="Categories/Add.php" class="btn btn-warning">Přidat kategorii</a>
                </div>
            <?php endif; ?>
        </div>
        <?php foreach ($categories as $category): ?>
            <div class="blog-post">
                <h2 class="blog-post-title mb-1"><?= $category['name'] ?> </h2>
                <div class="row mb-2">
                    <p class="col blog-post-meta mb-0">
                        Počet článků: <?= $category['article_count'] ?>
                    </p>
                </div>
                <div class="d-flex justify-content-end gap-3">
                    <a class="no-underline" href="../CategoryArticles.php?id=<?= $category['id'] ?>">Zobrazit příspěvky
                        kategorie</a>
                    <?php if ($isAdmin): ?>
                        <a class="no-underline" href="Categories/Update.php?id=<?= $category['id'] ?>">Upravit</a>
                        <a class="no-underline" href="Categories/Delete.php?id=<?= $category['id'] ?>">Smazat</a>
                    <?php endif; ?>
                </div>
                <?php if (isset($_GET['id']) && $_GET['id'] == $category['id']): ?>
                    <div class="text-danger text-end fst-italic fw-bold">Nelze smazat! Kategorie má články.</div>
                <?php endif; ?>
                <hr class="mb-5">
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>