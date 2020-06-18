<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');
include('templates/header.php');
?>

<div class="container mt-4">

    <section id="search" class="jumbotron text-center">
        <?php if(!empty($_GET['keyword']) || !empty($_GET['network']) ||  !empty($_GET['seasons'])) { ?>
            <h1><?= count(searchSeries(urldecode($_GET['keyword']), urldecode($_GET['network']), urldecode($_GET['seasons']))) ?> Series trouvées</h1>
        <?php } else {?>
            <h1> Moteur de recherche</h1>
        <?php }?>    
    </section>

    <!-- Moteur de recherche -->
    <div class="row mt-5">
        <div class="col-8 col-offset-2">
            <form method="GET" action="search_process.php">
                <div class="form-group">
                    <label>Mot-clé :</label>
                    <input type="text" class="form-control" name="keyword" value="<?= !empty($_GET['keyword']) ? $_GET['keyword'] : '' ;?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Network</label>
                    <select name= "network" class="form-control" id="exampleFormControlSelect1">
                        <?php if(!(empty($_GET['network']))) : ?>
                            <option value= "<?= $_GET['network'] ?>"><?= $_GET['network'] ?></option>
                        <?php endif ?>

                        <option value= "">--- Choisissez votre Network</option>
                        <?= generateNetwork($series) ?>
                    </select>
                    <label>Number of saisons</label>
                    <select name= "seasons" class="form-control" id="exampleFormControlSelect1">
                        <?php if(!(empty($_GET['seasons']))) : ?>
                            <option value= "<?= $_GET['seasons'] ?>"><?= $_GET['seasons'] ?></option>
                        <?php endif ?>
                        <option value= "">--- Choisissez le nombre de saisons</option>
                        <?= generateSaison($series) ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Rechercher</button><br /><br />
                
            </form>
        </div>
    </div>

    <!-- Résultat de la recherche -->
    <?php if (!empty($_GET)) : ?>
        <div class="row">
            <?php 
            foreach (searchSeries(urldecode($_GET['keyword']), urldecode($_GET['network']), urldecode($_GET['seasons'])) as $serie) : ?>
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
    <?php endif; ?>

</div>

<?php include('templates/footer.php'); ?>