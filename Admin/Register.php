<?php
session_start();
if (isset($_POST['username'], $_POST['password'], $_POST['name'], $_POST['surname'])) {
    require_once '../models/Database.php';
    require_once '../models/BaseRepository.php';
    require_once '../models/AuthorizationService.php';
    require_once '../models/AdminsRepository.php';
    $db = new Database();
    $auth = new AuthorizationService($db);
    $res = $auth->Register($_POST['username'], $_POST['password'], $_POST['name'], $_POST['surname']);


    if ($res !== false) {
        $adminRepo = new AdminsRepository($db);

        $_SESSION['user'] = $adminRepo->GetAuthor($res);
        unset($_SESSION['wrong']);
        unset($_SESSION['user']['password']);
        unset($_SESSION['user'][5]);
        Header('Location: Articles.php');
        die();
    } else {
        $_SESSION['wrong'] = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
        ];
    }
} else {
    unset($_SESSION['wrong']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP News - REGISTER</title>

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
<main class="container d-flex justify-content-center">
    <div class="col-md-8 mb-5">
        <h1 class="py-4 mb-5 text-center">
            Přihlásit
        </h1>
        <form action="" method="post">
            <div class="mx-auto text-center">
                <label class="form-label w-50">
                    Přihlašovací jméno
                    <input value="<?= isset($_SESSION['wrong']) ? $_SESSION['wrong']['username'] : '' ?>" required
                           name="username" class="form-control" type="text">
                </label> <br>
                <label class="form-label w-50">
                    Heslo
                    <input value="<?= isset($_SESSION['wrong']) ? $_SESSION['wrong']['password'] : '' ?>" required
                           name="password" class="form-control" type="password">
                </label> <br>
                <label class="form-label w-50">
                    Jméno
                    <input value="<?= isset($_SESSION['wrong']) ? $_SESSION['wrong']['name'] : '' ?>" required
                           name="name" class="form-control" type="text">
                </label> <br>
                <label class="form-label w-50">
                    Příjmení
                    <input value="<?= isset($_SESSION['wrong']) ? $_SESSION['wrong']['username'] : '' ?>" required
                           name="surname" class="form-control" type="text">
                </label> <br>
            </div>
            <div class="text-center mt-5">
                <?php
                if (isset($_SESSION['wrong']))
                    echo '<p class="text-danger">Uživatel s tímto přihlašovacím jménem už existuje!</p>'
                ?>
                <button class="btn btn-primary mx-auto" type="submit">Zaregistrovat</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
