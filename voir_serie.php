<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');
include('templates/header.php');

// Série connue ?
if (empty($_GET['id']) || !$serie = getSerie($_GET['id'])) {
    return addAlert('Série introuvable !', 'series.php', 'danger');
}
?>

<!-- Fiche de la série -->
<div class="container mt-4">
    <section id="see" class="jumbotron text-center">
        <h1><?= $serie['title'] ?></h1>
    </section>
    <a href="series.php" class="btn btn-sm btn-primary"><i class="fa fa-angle-left"></i> Retour aux séries</a>
    <?php if(isLogged() == true): ?>
        <a href="ajouter_favoris.php?id=<?= $serie['id'] ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Ajouter à mes favoris</a>
        <a href="favoris.php" class="btn btn-sm btn-warning">Mes séries</a>
    <?php endif; ?>
    <blockquote class="mt-2"><?= $serie['description'] ?></blockquote>
</div>

<?php include('templates/footer.php'); ?>
