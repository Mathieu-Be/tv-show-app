<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');

// Supression utilisateur connecté en $_SESSION
unset($_SESSION['user']);
if(isset($_COOKIE['rememberme'])){
    deleteRememberMe();
}

return addAlert('Vous êtes correctement déconnecté', 'index.php');