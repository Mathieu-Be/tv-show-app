<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');

// Tous les champs sont présents ?
if(!empty($_POST['username']) AND !empty($_POST['password'])){
    // 2 mots de passe coordonnent ? (+ajout en session)
    if($_POST['password'] == $_POST['confirm_password']){
        $newUser = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];
        $_SESSION['user'] = [
			'username' =>  $_POST['username'],
			'favoris' => []
		];
        newUser($newUser);
        addAlert('Vous êtes bien inscrit !', 'index.php', $type = 'success');
    } else {
        addAlert('Les deux mots de passe entrée ne sont pas identique', 'signup.php', $type = 'danger');
    }
} else {
    addAlert('Vous n\'avez pas définis d\'identifiant ni de password ', 'signup.php', $type = 'danger');
}