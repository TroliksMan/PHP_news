<?php
require_once 'models/Database.php';
require_once 'models/BaseRepository.php';
require_once 'models/AuthorsRepository.php';
require_once 'models/HeadingNormal.php';
$db = new Database();

$ar = new AuthorsRepository($db);
$authors = $ar->GetAuthors();

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
$hd->Draw('authors');
?>
<main class="container d-flex justify-content-center">
    <div class="col-md-8 mb-5">
        <h3 class="py-4 mb-4 fst-italic border-bottom">
            Autoři
        </h3>
        <ul>
            <?php foreach ($authors as $author): ?>
                <li class="fs-4"><a class="no-underline" href="AuthorArticles.php?id=<?= $author['id'] ?>"><?= $author['name'] . ' ' . $author['surname'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>
</body>
</html>
