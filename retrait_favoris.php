<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');

// Série inconnue ?
if (empty($_GET['id']) || !$serie = getSerie($_GET['id'])) {
    return addAlert('Série introuvable !', 'series.php', 'danger');
}

// Recherche id série 
$key = array_search($_GET['id'], $_SESSION['user']['favoris']);

// Suppression série en favoris 
unset($_SESSION['user']['favoris'][$key]);

return addAlert('Série correctement retirée des favoris !', 'favoris.php', 'success');
