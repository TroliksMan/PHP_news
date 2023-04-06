<?php
session_start();
if(!isset($_SESSION['user'])) {
    Header('Location: ../../Index.php');
    die();
}
require_once '../../models/HeadingAdminSub.php';
require_once '../../models/Database.php';
require_once '../../models/BaseRepository.php';
require_once '../../models/ArticlesRepository.php';
require_once '../../models/AdminsRepository.php';
require_once '../../models/CategoriesRepository.php';
require_once '../../models/AuthorizationService.php';

$db = new Database();
$auRep = new AdminsRepository($db);
$caRep = new CategoriesRepository($db);
$arRep = new ArticlesRepository($db);


if (isset($_GET['id'],$_POST['author_id'], $_POST['cat_id'], $_POST['heading'], $_POST['intro'], $_POST['content'])) {
    var_dump($_GET['id'], $_POST['cat_id'], $_POST['author_id'], $_POST['heading'], $_POST['intro'], $_POST['content']);
    $arRep->UpdateArticle($_GET['id'], $_POST['cat_id'], $_POST['author_id'], $_POST['heading'], $_POST['intro'], $_POST['content']);
    Header('Location: ../Articles.php');
    die();
} elseif (isset($_GET['id'])) {


    $authService = new AuthorizationService($db);
    if (!$authService->IsAuthorized($_SESSION['user']['id'], $_GET['id'])) {
        Header('Location: ../Articles.php');
        die();
    }

    $authors = $auRep->GetAuthors();
    $categories = $caRep->GetCategories();
    $article = $arRep->GetArticleByID($_GET['id']);
    if (!$article) {
        Header('Location: ../Articles.php');
        die();
    }
} else {
    Header('Location: ../Articles.php');
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

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>
<body>
<?php $hd = new HeadingAdminSub();
$hd->Draw('articles');
?>
<main class="container d-flex justify-content-center">
    <div class="col-md-8 mb-5">
        <h3 class="py-4 mb-4 border-bottom fst-italic">
            Upravit článek
        </h3>
        <form action="" method="post">
            <div class="d-flex gap-5">
                <label class="form-label col">
                    Název
                    <input value="<?= $article['heading'] ?>" required name="heading" class="form-control" type="text">
                </label>
                <label class="form-label col">
                    Kategorie
                    <select required class="form-control" name="cat_id">
                        <option selected value="" disabled>Vyberte kategorii</option>
                        <?php foreach ($categories as $category): ?>
                            <option <?= $article['cat_id'] == $category['id'] ? 'selected' : '' ?>
                                    value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="form-label col">
                    Autor
                    <select required class="form-control" name="author_id">
                        <option selected value="" disabled>Vyberte autora</option>
                        <?php foreach ($authors as $author): ?>
                            <option <?= $article['author_id'] == $author['id'] ? 'selected' : '' ?>
                                    value="<?= $author['id'] ?>"><?= $author['name'] . ' ' . $author['surname'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <div class="d-flex">
                <label class="form-label col">
                    Ukázka
                    <textarea required name="intro" class="form-control"><?= $article['intro'] ?></textarea>
                </label>
            </div>
            <div class="d-flex">
                <label class="form-label col">
                    Obsah
                    <textarea required name="content" id="mytextarea"><?= $article['content'] ?></textarea>
                </label>
            </div>
            <div class="buttons d-flex justify-content-between mt-3">
                <a class="btn btn-danger" href="../Articles.php">Zrušit</a>
                <button class="btn btn-primary" type="submit">Uložit</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>