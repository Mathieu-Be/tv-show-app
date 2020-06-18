<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= NAME_APP ?></title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= DIR_ASSETS ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?= DIR_ASSETS ?>css/style.css" rel="stylesheet">
    <link rel="icon" href="assets/img/tv.ico" />

</head>

<body>
    <header class="">
        <nav class="navbar bg-dark navbar-dark navbar-expand-sm">
            <div class="container d-flex justify-content-between">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <strong><?= NAME_APP ?> <?= isset($title) ? '/' . $title : '' ?></strong>
                </a>
                <ul class="nav navbar-nav contain" style="visibility: visible;">
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="search.php">Rechercher</a>
                    </li>
                    <?php if (!isLogged()) : ?>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="signup.php">S'inscrire</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="login.php">Se connecter</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="favoris.php">Mes séries</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="logout.php">Se déconnecter</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main role="main">

        <!-- Affichage des alertes -->
        <?= displayAlert() ?>