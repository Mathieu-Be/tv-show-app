<?php

// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');

// Champs bien remplis ? 
if (empty($_POST['username']) OR empty($_POST['password'])) {
    return addAlert('Identification impossible !', 'login.php', 'danger');
}

// Caomparaison identifiants reçus et tableau d'utilisateurs 
foreach (getUsers() as $user) {
	
	if ($user['password'] == $_POST['password'] || $user['username'] == $_POST['username']) {
		
		// On Stock le nom de l'utilisateur en session
		$_SESSION['user'] = [
			'username' => $user['username'],
			'favoris' => [] 
		];

		 // Rememberme
		 if(!empty($_POST['rememberme'])){
			setRememberMe($_POST['username'], $_POST['rememberme']);
		 }
		return addAlert('Connexion réussie !', 'favoris.php', 'success');

	}
	
}
return addAlert('Identifiant ou mot de passe incorrect.', 'login.php', 'danger');
