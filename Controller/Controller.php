<?php
namespace App\Controller;

use App\Model\ChapterManager;
use App\Model\Comment;
use App\Model\CommentManager;
use App\Model\UserManager;


/**
 * Class Controller
 */
class Controller
{
    /**
     * Permet de vérifier que l'administrateur n'est pas connecté et de ne pas permettre l'accès au backend
     * @return void redirige sur la page de connexion
     */
    private function checkAdmin(){
         if (!isset($_SESSION['admin'])) {
            header('location:index.php?action=connexion');
        }
    }

    /**
     * Permet d'afficher aléatoirement deux chapitres
     * @return void affiche sur la page d'accueil deux chapitres
     */
    public function home()
    {
        $manager = new ChapterManager();
        $listPosts = $manager->getHomeChapters();
        require('View/home.php');
    }

    /**
     * Permet d'afficher le chapitre selectionné selon son $id et les commentaires associés
     * @param  int $id [description]
     *
     * @return void Affichage de la page avec le chapitre demandé
     */
    public function chapter ()
    {
        $id = intval($_GET['id']);

        $manager = new ChapterManager();
        $chapter = $manager->getChapter($id);

        $managerCm = new CommentManager();
        $comments = $managerCm->getComments($id);

        require('View/chapters.php');
    }

    /**
     * Permet d'afficher tous les chapitres existants selon le maximum par page voulu
     * @return void Affiche l'ensemble des pages affichant tous les chapitres
     */
    public function allChapters()
    {
        $manager = new ChapterManager();
        $nbOfChapters = $manager->countAll();
        $nbOfPages = ceil($nbOfChapters/ChapterManager::MAX_POST_IN_CHAPTERSPAGE);

        if (!isset($_GET['page'])) {
            $page = 1;
        } else{
            $page = $_GET['page'];
        }

        $chapters = $manager->paging($page);

       require('View/allChapters.php');
    }


    /**
     * Permet d'ajouter un commentaire ayant pour auteur $author et contenu $comment au chapitre d'id $id
     * Une fois le traitement effectué, la fonction redirige l'utilisateur vers la page du chapitre
     *
     * @internal integer $post_id [correspond à l'id du commentaire]
     * @internal [string] $author  [correspond au nom de l'auteur]
     * @internal [string] $comment [correspond au commentaire laissé]
     *
     * @return  void Redirection vers la page du chapitre
     */
    public function addCom()
    {
        $post_id = intval($_GET['id']);

        if (!isset($_POST['author']) || empty($_POST['author'])) throw new \Exception("Vous devez saisir un pseudo");
        if (!isset($_POST['comment']) || strlen($_POST['comment']) < Comment::MIN_LENGHT) throw new \Exception("Vous devez saisir un commentaire");


        $author = $_POST['author'];
        $comment = $_POST['comment'];

        if (isset($_POST['author'])) {
            $managerCm = new CommentManager();
            $author = htmlspecialchars($author);
            $comment = htmlspecialchars($comment);
            $newCom = $managerCm->addComment($post_id, $author, $comment);

            header('location:index.php?action=chapter&id=' . $post_id . '#comment');
        } else {
            throw  new \Exception('Vous n\'avez pas rempli les champs obligatoires');
        }
    }

    /**
     * Permet à l'administrateur de supprimer un commentaire
     *
     * @return void supprime le commentaire selectionné
     */
    public function delCom()
    {
        $this->checkAdmin();
        if (isset($_GET['id'])) {
            $del = $_GET['id'];
            $managerCm = new CommentManager();
            $managerCm->delete($del);
        }else{
            throw  new Exception('Id du commentaire manquant');
        }
        header('location:index.php?action=comments');
    }

    /**
     * Permet d'afficher la page de connexion pour le coté admin du blog
     *
     * @return void Affiche la page de connexion
     */
    public function connexionAdmin()
    {
        require('View/connexionAdmin.php');
    }

    /**
     * Affiche la page 404
     *
     * @return void Affiche la page 404
     */
    public function get404()
    {
        require('View/404.php');
    }

    /**
     * Permet à l'administrateur du blog de se connecter
     * @internal param string $pseudo
     * @internal param string $mdp
     * @internal param string $pseudo identifiant de l'administrateur
     * @internal param string $mdp mot de passe associé
     * @return void Redirige vers la page admin
     */
    public function login()
    {
        $error = false;
        if (isset($_POST['name']) && isset($_POST['mdp'])) {
            $name = htmlspecialchars($_POST['name']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $userManager = new UserManager();

            if ($userManager->checkLoginAndPassword($name, $mdp)) {

                // instancie la session
                $_SESSION['admin'] = $name;
                //$_SESSION['role']  = "admin";
                header('location:index.php?action=admin');
            } else {
                $error = true;
            }

        }

        require('View/connexionAdmin.php');
    }

    /**
     * Permet la deconnexion de l'administrateur
     *
     * @return void Redirige vers la page d'accueil
     */
    public function logout()
    {
        session_unset();
        header('location:index.php?action=homePage');
    }

    /**
     * Permet d'afficher la liste des chapitres existants
     *
     * @return void Affiche la page admin du blog
     */
    public function adminEnter()
    {
        $this->checkAdmin();

        $manager = new ChapterManager();
        $lastArticles = $manager->getAllChapters();

        require('View/backend/admin.php');
    }

    /**
     * Permet d'afficher la page pour écrire un nouveau chapitre
     *
     * @return void Affiche la page d'écriture d'un nouveau chapitre
     */
    public function newChapter()
    {
        $this->checkAdmin();
        require('View/backend/newChapter.php');
    }

    /**
     * Permet d'ajouter le nouveau chapitre à la base de données
     *
     * @return void Redirige vers la page d'accueil de l'admin du blog
     */
    public function addChapter()
    {
        $this->checkAdmin();
        $chapter_number = $_POST['chapter_number'];
        $title = $_POST['title'];
        $contents = $_POST['contents'];
        $picture = $_POST['picture'];


        $manager = new ChapterManager();
        $manager->addChapter($chapter_number, $title, $contents, $picture);

        header('location:index.php?action=admin');

    }
    /**
     * Permet d'afficher le chapitre d'id $id qui est à modifier
     *
     * @param  integer $id [correspond à l'id du chapitre]
     * @return [type]   Redirige vers la page de modification
     */
    public function edit()
    {
        $this->checkAdmin();
        $id = ($_GET['id']);
        if (isset($_GET['id'])) {
            $manager = new ChapterManager();
            $chapter = $manager->getChapter($id);
            require('View/backend/edit.php');
        } else {
            header('location:index.php?action=404');
        }

    }

    /**
     * Permet de récupérer le chapitre d'id $id demandé
     * @param integer $id [correspond à l'id du chapitre demandé]
     * @param string $title [correspond au titre du chapitre demandé]
     * @param integer $chapter_number [correspond au numéro du chapitre demandé]
     * @param string $contents [correspond au contenu du chapitre demandé]
     *
     * @return void Redirige vers la page d'accueil de la partie admin du blog
     */
    public function update()
    {
        $this->checkAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $chapter_number = $_POST['chapter_number'];
            $title = $_POST['title'];
            $contents = $_POST['contents'];
            $picture = $_POST['picture'];

            $manager = new ChapterManager();
            $manager->updateChapter($id, $chapter_number, $title, $contents, $picture);
        }
        header('location:index.php?action=admin');
    }

    /**
     * Permet de supprimer le chapitre selon l'id $id selectionné
     * @param integer $id [correspond à l'id du chapitre selectionné]
     *
     * @return void Redirige vers la page d'accueil de la partie admin du blog
     */
    public function delChapter()
    {
        if (isset($_GET['id'])) {
            $del = $_GET['id'];
            $manager = new ChapterManager();
            $manager->delete($del);
        }
        header('location:index.php?action=admin');
    }

    /**
     * Permet de signaler à l'administrateur du blog les commentaires signalés
     *
     * @param integer $post_id [correspond à l'id $post_id du commentaire selectionné
     * @return void Redirige vers la page du chapitre dont le commentaire est issu
     */
    public function alertDone()
    {
        // 1. Il faut récupérer via l'url l'identifiant du commentaire à signaler
        // 2. On récupère le commentaire associé à l'identifiant (manager : getComFromId($id))
        // 3. On met à jour le nombre de signalement du commentaire (manager : updateComAlert($val))
        // 4. Rediriger l'utilisateur vers la page du chapitre lié au commentaire


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $managerCm = new CommentManager();
            $commentaire = $managerCm->getComFromId($id);


            if ($commentaire) {
                $managerCm->updateComAlert($id);

                header('location:index.php?action=chapter&id=' . $commentaire['post_id'] . '#comment');
                return;
            }
        }

        header('location:index.php?action=homePage');
    }

    /**
     * Permet de supprimer le(s) signalement(s) du commentaire selectionné
     *
     * @param integer $id [correspond à l'id du commentaire selectionné]
     * @return void Redirige vers la page listant l'ensemble des commentaires
     */
    public function delAlert()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $managerCm = new CommentManager();
            $delAlert = $managerCm->editComAlert($id);
        }

        header('location:index.php?action=comments');
    }

    /**
     * Permet de modifier le mot de passe de l'administrateur
     *
     * @param string $currentMdp [correspond au mot de passe actuel)
     * @param string $newMdp [correspond au nouveau mot de passe]
     * @param string $confirmedNewPassword [correspond à la confirmation du nouveau mot de passe]
     *
     * @return void enregistre le nouveau mot de passe
     */
    public function updatePassword()
    {
        if (isset($_SESSION['admin'])) {
            // vérifier si l'ancien mdp et le nouveau mdp sont saisis
            if (isset($_POST['currentPassword']) &&
                isset($_POST['newPassword']) &&
                isset($_POST['confirmedNewPassword'])
            ) {
                $userManager = new UserManager();
                $newMdp = $_POST['newPassword'];
                $currentMdp = $_POST['currentPassword'];
                $confirmedNewPassword = $_POST['confirmedNewPassword'];

                //   ---verifier currentMpd est correct
                if ($newMdp === $confirmedNewPassword &&
                    $userManager->checkLoginAndPassword( $_SESSION['admin'],$currentMdp)
                ) {
                    //        ---- mettre à jour mdp
                    $userManager->updateUserPassword($_SESSION['admin'], $newMdp);

                    $msg = "Le changement de votre mot de passe est validé";

                }else{

                    $error = "Actuel mot de passe ou confirmation de mot de passe incorrect";
                }

            }


        } else {
            header('location:index.php?action=connexion');
            return;
        }
        require('View/backend/updatePassword.php');
    }

    /**
     * Permet d'afficher la page contact
     * @return void Redirige vers la page contact
     */
    public function getContact()
    {
        require('View/contact.php');
    }

    /**
     * Permet d'afficher la liste des commentaires
     * @return void affiche les commentaires en backend
     */
    public function comments()
    {
        $this->checkAdmin();
        $managerCm = new CommentManager();
        $comments = $managerCm->getAllComments();

        require('View/backend/comments.php');
    }

    /**
     * Permet d'afficher un message d'erreur
     * @param  string $message [correspond au message d'erreur]
     * @return void Affiche la page avec le message
     */
    public function getError($message)
    {

        require('View/error.php');

    }
}
