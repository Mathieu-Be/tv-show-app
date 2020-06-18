<?php 
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');

// Critères selectionnées ? 
if(empty($_GET['keyword']) && empty($_GET['network']) && empty($_GET['seasons'])) {
    addAlert('Pas de critère selectionnés', 'search.php', 'danger');
} else {
    // Test de la longueur chaine recherchée
    if(strlen($_GET['keyword'])<=3 && strlen($_GET['keyword'])>0){
        addAlert('Le mot clé recherché est trop court...', 'search.php?keyword=&network=' . urlencode($_GET['network']) . '&seasons=' .urlencode($_GET['seasons']), 'danger');
    } else {
        // Résultats ? 
        if(empty(searchSeries(urldecode($_GET['keyword']), urldecode($_GET['network']), urldecode($_GET['seasons'])))){
            addAlert('Pas de résultats pour votre recherche...', 'search.php', 'danger');
        } else {
            addAlert('Selon votre mot clé les séries trouvées sont les suivantes', 'search.php?keyword='. urlencode($_GET['keyword']) . '&network=' . urlencode($_GET['network']) . '&seasons=' .urlencode($_GET['seasons']), 'success');
        }
    }
}
