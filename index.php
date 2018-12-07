<?php

namespace App;

use App\Controller\Controller;

session_start();
ini_set('display_errors','on');
error_reporting(E_ALL);

function debug($var, $with_die = true){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    if($with_die) die();
}

spl_autoload_register(function($class){
    $file = str_replace('App\\', '', $class);
    $file = str_replace('\\', '/', $file);
    $file .= ".php";
    if(file_exists($file))
    {
        require_once $file;
    }
});



// 3 roles pour le routeur:
// - associer la request à un controlleur existant
// - vérifier les autorisations
// - cleaner les données


// instancier toutes les variables
$controller = new Controller();


(isset($_GET['action'])) ? $action = $_GET['action'] : $action = "homePage";

try{
    switch ($action) {
        case 'homePage':
            $controller->home();
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

        case 'delCom':
            $controller->delCom();
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
            $controller->update();
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

        case 'updatePassword':
            $controller->updatePassword();
            break;

        case 'comments':
            $controller->comments();
            break;

        case 'delAlert':
            $controller->delAlert();
            break;

        default:
            $controller->get404();
            break;
    }
}catch(\Exception $e){
    $controller->getError($e->getMessage());
}




