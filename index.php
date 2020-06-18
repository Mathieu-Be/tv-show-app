<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');
include('templates/header.php');
?>
<section class="text-center">
  <div class="container">
    <h1>Tv Show App</h1>
    <p class="lead text-muted">Consultez les dernières séries du moment, notez les séries vues et celles à voir !</p>
    <p>
      <a href="series.php" class="btn btn-success my-2">Parcourir les séries</a>

      <?php if (isLogged()) : ?>
        <a href="favoris.php" class="btn btn-warning my-2">Mes séries</a>
      <?php endif; ?>
    </p>
    <br />
    <img src="assets/img/tv.jpg" class="img-fluid img-thumbnail" />
  </div>
</section>

<?php include('templates/footer.php'); ?>