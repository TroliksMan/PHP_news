<?php
require_once '../models/HeadingAdmin.php';
require_once '../models/Database.php';
require_once '../models/BaseRepository.php';
require_once '../models/ArticlesRepository.php';
$db = new Database();
$ar = new ArticlesRepository($db);
$articles = $ar->GetArticles();
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
$hd->Draw('articles');
?>
<main class="container d-flex justify-content-center">
    <div class="col-md-8 mb-5">
        <div class="py-4 mb-4 border-bottom d-flex justify-content-between">
            <h3 class="fst-italic">Všechny články</h3>
            <div>
                <a href="Articles/Add.php" class="btn btn-warning">Přidat článek</a>
            </div>
        </div>
        <?php foreach ($articles as $article): ?>
            <article class="blog-post">
                <h2 class="blog-post-title mb-1"><?= $article['heading'] ?> </h2>
                <div class="row mb-2">
                    <p class="col blog-post-meta mb-0">
                        <?= date_format(new DateTime($article['create_date']), 'd.m.Y H.i.s'); ?>
                        od
                        <a href="../AuthorArticles.php?id=<?= $article['author_id'] ?>"><?= $article['name'] . ' ' . $article['surname'] ?></a>
                    </p>
                    <div class="col text-end">
                        <a href="../CategoryArticles.php?id=<?= $article['cat_id'] ?>"
                           class="blog-post-meta no-underline text-muted fst-italic"><?= $article['cat_name'] ?></a>
                    </div>
                </div>
                <p class="mb-0"><?= $article['intro'] ?></p>
                <div class="d-flex justify-content-end gap-3">
                    <a class="no-underline" href="../Detail.php?id=<?= $article['id'] ?>">Náhled</a>
                    <a class="no-underline" href="Articles/Update.php?id=<?= $article['id'] ?>">Upravit</a>
                    <a class="no-underline" href="Articles/Delete.php?id=<?= $article['id'] ?>">Smazat</a>
                </div>
                <hr class="mb-5">
            </article>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>