<?php
if (isset($_GET['id'])) {
    require_once 'models/Database.php';
    require_once 'models/BaseRepository.php';
    require_once 'models/ArticlesRepository.php';
    require_once 'models/HeadingNormal.php';
    $db = new Database();
    $ar = new ArticlesRepository($db);
    $article = $ar->GetArticleByID($_GET['id']);
    if (!$article) {
        header('Location: index.php');
        die();
    }
} else {
    header('Location: index.php');
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP News</title>

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
<?php $hd = new HeadingNormal();
$hd->Draw('XXX');
?>
<main class="container d-flex justify-content-center pb-5">
    <div class="col-md-8 mb-5">
        <article class="blog-post">
            <h3 class="py-4 mb-0 fst-italic">
                <?= $article['heading'] ?>
            </h3>
            <p class="mb-0 fst-italic text-muted"><?= $article['intro'] ?></p>
            <div class="row mt-2 mb-5">
                <p class="col blog-post-meta mb-0">
                    <?= date_format(new DateTime($article['create_date']), 'd.m.Y H.i.s'); ?>
                    od
                    <a href="AuthorArticles.php?id=<?= $article['author_id'] ?>"><?= $article['name'] . ' ' . $article['surname'] ?></a>
                </p>
                <div class="col text-end">
                    <a href="CategoryArticles.php?id=<?= $article['cat_id'] ?>"
                       class="blog-post-meta no-underline text-muted fst-italic"><?= $article['cat_name'] ?></a>
                </div>
            </div>
            <div class="content">
                <?= $article['content'] ?>
            </div>
        </article>
    </div>
</main>
</body>
</html>