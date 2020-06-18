<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');
include('templates/header.php');

// Si on ne trouve pas le paramètre id ou la série
if (empty($_GET['id']) || !$serie = getSerie($_GET['id'])) {
    return addAlert('Série introuvable !', 'series.php', 'danger');
}

// Série déjà dans mes favoris ?
if (in_array($_GET['id'], $_SESSION['user']['favoris'])) {
    return addAlert('Série déjà présente dans vos favoris !', 'voir_serie.php?id=' . $_GET['id'], 'warning');
}

// Ajout du favori en sessions
$_SESSION['user']['favoris'][] = $_GET['id'];

return addAlert('Série ajoutée avec succès !', 'voir_serie.php?id=' . $_GET['id'], 'success');