<?php

// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');

// Appel à la fonction acceptRgpd() dans cette page
acceptRgpd();

if(!empty($_SERVER['HTTP_REFERER'])){
    $redirection = $_SERVER['HTTP_REFERER'];
} else {
    $redirection = 'index.php';
}



// Redirrection vers la page index.php ou page précédante
return Header('Location: ' . $redirection);