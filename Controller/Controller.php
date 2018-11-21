<?php


require_once('Model/ChapterManager.php');
require_once('Model/CommentManager.php');
require_once('Model/UserManager.php');

/**
 * Class Controller
 */
class Controller
{
    /**
     * Permet d'afficher tous les chapitres existants
     * @return void affiche sur la page concernée l'ensemble des chapitres
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
    public function chapter(int $id)
    {
        $manager = new ChapterManager();
        $chapter = $manager->getChapter($id);

        $managerCm = new CommentManager();
        $comments = $managerCm->getComments($id);

        require('View/chapters.php');
    }
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

        if (!isset($_POST['author']) || empty($_POST['author'])) throw new Exception("Vous devez saisir un pseudo");
        if (!isset($_POST['comment']) || strlen($_POST['comment']) < Comment::MIN_LENGHT) throw new Exception("Vous devez saisir un commentaire");


        $author = $_POST['author'];
        $comment = $_POST['comment'];

        if (isset($_POST['author'])) {
            $managerCm = new CommentManager();
            $author = htmlspecialchars($author);
            $comment = htmlspecialchars($comment);
            $newCom = $managerCm->addComment($post_id, $author, $comment);

            header('location:index.php?action=chapter&id=' . $post_id . '#comment');
        } else {
            echo "Vous n'avez pas rempli les champs obligatoires";
        }
    }

    public function delCom()
    {
        if (isset($_GET['id'])) {
            $del = $_GET['id'];
            $managerCm = new CommentManager();
            $managerCm->delete($del);
        }
        header('location:index.php?action=admin');
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
     * @return void Redirige vers la page admin
     * @internal param string $pseudo
     * @internal param string $mdp
     * @internal param string $pseudo identifiant de l'administrateur
     * @internal param string $mdp mot de passe associé
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
     * Permet d'afficher les titres de la totalité des chapitres
     *
     * @return void Affiche la page admin du blog
     */
    public function adminEnter()
    {
        if (isset($_SESSION['admin'])) {
            // affiche toutes les entrées
            // faire une requete dans la bdd pour récupérer les articles
            // j'appelle la methode qui me permet de récupérer les articles voulus
            $manager = new ChapterManager();
            $lastArticles = $manager->getAllChapters();
            // permet l'ajout d'un nouvel article
        } else {
            throw new Exception("Vous n'avez pas les droits pour acceder à cette page");
        }

        require('View/backend/admin.php');
    }

    /**
     * Permet d'afficher la page pour écrire un nouveau chapitre
     *
     * @return void Affiche la page d'écriture d'un nouveau chapitre
     */
    public function newChapter()
    {
        require('View/backend/newChapter.php');
    }

    /**
     * Permet d'ajouter le nouveau chapitre à la base de données
     *
     * @return void Redirige vers la page d'accueil de l'admin du blog
     */
    public function addChapter()
    {
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
    public function edit($id)
    {
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
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $title = $_POST['title'];
            $chapter_number = $_POST['chapter_number'];
            $contents = $_POST['contents'];

            $manager = new ChapterManager();
            $manager->updateChapter($id, $title, $chapter_number, $contents);
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

                    $msg = "Le changement de votre mot de passe est validé ";

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

    public function getContact()
    {
        require('View/contact.php');
    }

    public function comments()
    {
            $managerCm = new CommentManager();
            $allComments = $managerCm->getAllComments();

        require('View/backend/comments.php');
    }
}
