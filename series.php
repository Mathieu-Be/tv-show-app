<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');
include('templates/header.php');
?>

<div class="container mt-4">
    <section id="series" class="jumbotron text-center">
        <h1>Séries TV</h1>
    </section>
    <!-- Affichage des séries -->
    <div class="row mt-5">
        <?php foreach ($series as $serie) : ?>
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
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>