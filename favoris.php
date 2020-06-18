<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');
include('templates/header.php');

if (!isLogged()) {
    return addAlert('Connexion requise !', 'login.php', 'warning');
}
?>

<div class="container mt-4">
    <section id="favoris" class="jumbotron text-center">
        <h1>Séries Favorites</h1>
    </section>
    <!-- Si aucun favoris -->
    <?php if(!getFavoris()): ?>
        <p class="text-center text-muted">Aucune série disponible dans vos favoris.</p>
    <?php endif; ?>

    <div class="row">
        <?php foreach (getFavoris() as $serie) : ?>
            <div class="col-4 d-flex align-items-stretch">
                <div class="card mb-4">
                    <div class="card-header">
                        <?= $serie['title'] ?>
                    </div>
                    <div class="card-body">
                        <?= $serie['description'] ?>
                        <ul class="list-inline m-0 mt-4">
                            <li class="list-inline-item"><small>Saison(s) : <?= $serie['seasons'] ?></small></li>
                            <li class="list-inline-item"><small>Note : <?= round($serie['note'], 2) ?>/5</small></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="voir_serie.php?id=<?= $serie['id'] ?>" class="btn btn-primary btn-block btn-sm mt-2"><i class="fa fa-eye"></i> Voir la fiche</a>
                        <a href="retrait_favoris.php?id=<?= $serie['id'] ?>" class="btn btn-danger btn-block btn-sm mt-2">Retirer des favoris</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>