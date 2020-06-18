<?php

// Permet de démarrer une session, pour y stocker des données + tard
session_start();

// Constantes de base de mon programme
define('DIR_DATA', 'datas/');
define('DIR_ASSETS', 'assets/');
define('DIR_INCLUDE', 'includes/');
define('NAME_APP', 'Tv Show App');

// Récupération des données
include(DIR_DATA . 'series.php');

// Récupération des fonctions diverses
include(DIR_INCLUDE . 'fonctions.php');


// Gestion du cookie "rememberme"

if (checkIfRememberMe() == true AND empty($_SESSION['user'])) {

    $_SESSION['user'] = [
        'username' => $_COOKIE['rememberme'],
        'favoris' => [] 
    ];

    return addAlert('Vous êtes bien connecté', 'index.php', 'success');
}
