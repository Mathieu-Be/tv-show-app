<?php

/**
 * Création d'un cookie remember me
 * 
 * @param $username Identifiant à stoker dans le cookie remember me
 * @param $time durée du cookie remember me choisi par l'utilisateur
 * @return boolean
 */
function setRememberMe($username, $time)
{
	$time = time()+(3600*$time);
	return setcookie("rememberme", $username, $time, '/'); 
}

/**
 * Supression du cookie rememberme à la deconnexion
 *
 * @return boolean
 */
function deleteRememberMe()
{
    setcookie("rememberme", false, time()-100, '/'); 
}

/**
 * Check si un cookie rememberme existe
 *
 * @return boolean
 */
function checkIfRememberMe()
{
	if(!empty($_COOKIE['rememberme'])){
		return true;
	}
	return false;
}

/**
 * Création d'un cookie rgpd 
 *
 * @return void
 */
function acceptRgpd()
{
	return setcookie("rgpd", 1, time()+(3600*24*90), '/'); 
}

/**
 * Check si user a accepté les conditions RGPD (utilisée dans templates/rgpd_banner.php)
 *
 * @return boolean
 */
function rgpdStatus()
{
	if(!empty($_COOKIE['rgpd'])){
		return true;
	}
	return false;
}

/**
 * Getter des users stockées dans datas/users.json
 *
 * @return void
 */
function getUsers()
{
	$users_json = file_get_contents('datas/users.json');
	$users_decode = json_decode($users_json, true);
	return $users_decode;
}

/**
 * Fonction qui permet de créer un utilisateur
 * Prend en paramètre un tableau devant contenir, identifiant et mot de passe
 *
 * @param [type] $datas
 * @return void
 */
function newUser($datas)
{

	// 1. Stocker les utilisateurs déjà existants dans une variable à l'aide de getUsers()
	// 2. Ajouter votre utilisateur dans le tableau 
	// 3. Transformer le tableau d'utilisateurs en json avec la fonction PHP json_encode (https://www.php.net/manual/fr/function.json-encode.php)
	// 4. Stocker le JSON dans le fichier datas/users.json à l'aide de la fonction PHP file_put_contents (https://www.php.net/manual/fr/function.file-put-contents)

	$utilisateurs = getUsers();
	$utilisateurs[] = $datas;
	$utilisateurs = json_encode($utilisateurs);
	file_put_contents('datas/users.json', $utilisateurs);
	
}


/**
 * Fonction qui permet de rechercher une série par mot clé
 *
 * @param [type] $keyword
 * @return array
 */
function searchSeries($keyword, $network, $seasons)
{
	global $series;
	// 1. Stocker les séries dans une variable avec la fonction getSeries()
	// 2. Créer une variable contenant un tableau vide, dans laquelle on stockera les séries trouvées grâce au mot clé
	// 3. Parcourir les séries dans une boucle, et tester si le mot clé est présent dans le titre ou la description à l'aide de la fonction PHP stripos (php.net/manual/fr/function.stripos.php).
	// 4. Retourner les series identifiés en fin de fonction

	$series_trouvees = [];
	foreach($series as $serie){
		
		if(stripos($serie['title'], $keyword) != false || 
		stripos($serie['description'], $keyword) != false ||
		$serie['seasons'] == $seasons || 
		$serie['network'] == $network
		){
			$series_trouvees[] = $serie;
		}
	} 
	return $series_trouvees;
}

function getAllNetworks($series)
{
    $networks = [];
    foreach($series as $serie){
        if(isset($networks[$serie['network']])){
            $networks[$serie['network']]++;
        } else {
            $networks[$serie['network']] = 1;
        }
    }
    ksort($networks); //tri tableau selon clés (ici ordre alphabétique)
    return $networks;

}


function generateNetwork($series)
{
    $html = '';
    foreach(getAllNetworks($series) as $network => $counter){ 
        $html .= '<option value= "'. $network .'">' . $network . ' (' . $counter . ')' . '</option>';
    }
    $html .='</div>
    </div>';
    return $html;

}

function getAllsaison($series)
{
    $saison = [];
    foreach($series as $serie){
        if(!in_array($serie['seasons'], $saison)){
            $saison[] = $serie['seasons'];
        }
    }
    sort($saison); //oragnise sur les clés
    return $saison;

}

function generatesaison($series)
{
    $html = '';
    foreach(getAllsaison($series) as $saison){ 
        $html .= '<option value= "'. $saison .'">' . $saison . '</a></option>';
    }
    return $html;

}

/**
 * Cette fonction doit retourner "true" si l'utilisateur
 * est connecté, "false" si il ne l'est pas.
 *
 * @return boolean
 */
function isLogged()
{
	if (!empty($_SESSION['user']) && !empty($_SESSION['user']['username'])) {

		return true;
	} else {
		return false;
	}
}

/**
 * Cette fonction doit retourner un tableau des séries qui sont en favoris
 *
 * @return void
 */
function getFavoris()
{
	// Le mot clé global permet d'accèder à la variable stockée dans datas/series.php
	global $series;

	$favoris = [];

	// On boucle sur $series
	foreach ($series as $serie) {

		// On check si la série fait partie de nos favoris
		if (in_array($serie['id'], $_SESSION['user']['favoris'])) {
			// Si oui, on la stock dans le tableau $favoris
			$favoris[] = $serie;
		}
	}

	// On retourne les favoris identifiés
	return $favoris;
}

/**
 * Cette fonction permet de récupérer une seule série
 * grâce à son identifiant
 *
 * @return void
 */
function getSerie($id)
{
	// Le mot clé global permet d'accèder à la variable stockée dans datas/series.php
	global $series;

	foreach ($series as $key => $serie) {
		if ($serie['id'] == $id) {
			return $serie;
		}
	}

	// On retourne false dans le cas on trouve pas la serie
	return false;
}

/**
 * Fonction qui permet de "débuger" une
 *
 * @param [type] $data
 * @return void
 */
function dd($data)
{
	if (!empty($data)) {
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}

	die;
}

/**
 * Fonction qui permet d'afficher une alerte
 *
 * @return void
 */
function displayAlert()
{
	// On test si on a une alerte à afficher
	if (!empty($_SESSION['alert'])) {

		// On stock l'alert dans une var temporaire
		$alert = $_SESSION['alert'];

		// Une fois affichée, supprimer l'alerte du tableau $_SESSION['alert']
		unset($_SESSION['alert']);

		// Gestion du type de l'alerte si renseigné
		$type = 'info';
		if (!empty($alert['type'])) {
			$type = $alert['type'];
		}

		// On retourne le code HTML de l'alerte
		return '<div class="container"><div class="mt-2 alert alert-' . $type . '">' . $alert['msg'] . '</div></div>';
	}

	return '';
}

/**
 * Fonction qui permet d'ajouter en sesssion une alerte
 * $msg = message de l'alerte
 * $cible = page vers laquelle on veut rediriger
 * $type (facultatif) = type de l'alerte (danger, success, warning,...)
 * @return boolean
 */
function addAlert($msg, $cible, $type = 'success')
{

	// On stock l'alerte et son type en session
	$_SESSION['alert'] = [
		'msg' => $msg,
		'type' => $type
	];

	// On redirige vers la page $cible
	return Header('Location: ' . $cible);
}
