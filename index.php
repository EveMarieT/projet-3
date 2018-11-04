<?php
session_start();
ini_set('display_errors','on');
error_reporting(E_ALL);

function debug($var, $with_die = true){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    if($with_die) die();
}

include_once('Controller/Controller.php');

// 3 roles pour le routeur:
// - associer la request à un controlleur existant
// - vérifier les autorisations
// - cleaner les données


// instancier toutes les variables
$controller = new Controller();


(isset($_GET['action'])) ? $action = $_GET['action'] : $action = "listPosts";

try{
    switch ($action) {
        case 'listPosts':
            $controller->listPosts();
            break;

        case 'chapter':
            $controller->chapter(intval($_GET['id']));
            break;

        case 'allChapters':
            $controller->allChapters();
            break;

        case 'addCom':
            $controller->addCom();
            break;

        case 'connexion':
            $controller->connexionAdmin();
            break;

        case 'login':
            $controller->login();
            break;

        case 'admin':
            $controller->adminEnter();
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
            $controller->edit($_GET['id']);
            break;

        case 'update':
            $controller->update($_GET['id']);
            break;

        case 'delete':
            $controller->delChapter($_GET['id']);
            break;

        case 'contact':
            $controller->getContact();
            break;

        case 'alert':
            $controller->alertDone();
            break;

        case 'updatePassword':
            $controller->updatePassword();
            break;

        default:
            $controller->get404();
            break;
    }
}catch(Exception $e){
    echo $e->getMessage();
}




