<?
session_start();
ini_set('display_errors','on');
error_reporting(E_ALL);

include_once('Controller/controller.php');

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
		if (isset($_GET['id']) && $_GET['id'] >0)  {
			$controller->chapter(intval($_GET['id']));
		} else {
			$error = 1;
		}
		break;

	case 'addCom':
		if(isset($_POST['author'])) {
			$controller->addCom((int)$_GET['id'], $_POST['author'], $_POST['comment']);
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
		$controller->addChapter();
		break;

	case 'edit':
		if (isset($_GET['id'])) {
			$controller->edit($_GET['id']);
		} else {
			$error = 1;
		}
		break;

	case 'update':
		if(isset($_GET['id'])) {
				$controller->update();
		} else {
			$error = 1;
		}
		break;

case 'delete':
		$controller->delChapter();
		break;

	case 'contact':
		$controller->getContact();
		break;

	case 'alert':
		$controller->alertDone();
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


