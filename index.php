<?
session_start();
ini_set('display_errors','on');
error_reporting(E_ALL);

require_once('Controller/controller.php');

// 3 roles pour le routeur:
// - associer la request à un controlleur existant
// - vérifier les autorisations
// - cleaner les données


// instancier toutes les variables
$controller = new Controller();
$error      = 0;

(isset($_GET['action'])) ? $action = $_GET['action'] : $action = "listPosts";

switch ($action) {
	case 'listPosts':
		$controller->listPosts();
		break;

	case 'chapter':
		if (isset($_GET['id']) && $_GET['id'] >0) {
			$controller->chapterAction();
		} else {
			$error = 1;
		}
		break;

	case 'connexion':
	  $controller->connexionAdmin();
		break;

	case 'login':
		$controller->login();
		break;

	case 'admin':
		if(isset($_SESSION['admin'])) {
			$controller->adminEnter();
		} else {
			echo 'c mort';
			$error = 2;
		}
		break;

	case 'logout':
		$controller->logout();
		break;

	case 'newChapter':
		$controller->newChapter();
		break;

	case 'addChapter':
		$controller->addChapters();
		break;

	case 'allChapters':
		$controller->listPosts();
		break;

	case 'edit':
		if (isset($_GET['id'])) {
			$controller->edit($_GET['id']);
		} else {
			$error = 1;
		}
		break;

	case 'contact':
		$controller->getContact();
		break;

	default:
		$controller->get404();
		break;
}

switch ($error) {
	case 1:
		echo 'Erreur : aucun identifiant de billet envoyé';
		break;

	default:
		break;
}


