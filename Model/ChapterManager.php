<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

include_once('Chapter.php');
require_once('Manager.php');

/**
 * La class chapterManager permet d'appliquer les méthodes de la class Chapter
 */
class ChapterManager extends Manager
{
    const MAX_POST_IN_HOMEPAGE = 2;
    const MAX_POST_IN_CHAPTERSPAGE = 3;

    /**
     * La methode getHomeChapters permet de récupérer les 6 premiers chapitres du roman
     * @return Chapter[]
     */
    public function getHomeChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM novel ORDER BY RAND() LIMIT 0,'.self::MAX_POST_IN_HOMEPAGE);
        $data = $req->fetchAll();
        foreach ($data as $elements) {
            $post = new Chapter();
//            $post->setId($elements['id']);
//            $post->setPicture($elements['picture']);
//            $post->setChapterNumber($elements['chapter_number']);
//            $post->setTitle($elements['title']);
//            $post->setContents($elements['contents']);
            $post->hydrate($elements);
//            $posts[] = $post;

        }

    }


    /**
     * La méthode getChapter permet de récupérer le chapitre selon l'id
     * @param  integer $id correspond à l'id du chapitre selectionné
     * @return string   un tableau associatif du chapitre selectionné
     * @throws Exception
     */
    public function getChapter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, picture, chapter_number, title, contents FROM novel WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $chapter = $req->fetch();

        if (!$chapter) {
            throw new Exception("Ce chapitre n'existe pas");
        }

        return $chapter;
    }

    /**
     * La méthode getAllChapters permet de récupérer tous les chapitres existants
     * @return string un tableau associatif des chapitres existants
     */
    public function getAllChapters()
    {
        $db = $this->dbConnect(); // connexion à la bdd
        $req = $db->query('SELECT * FROM novel ORDER BY CAST(chapter_number AS UNSIGNED) ASC'); // récupérer tous les articles
        $data = $req->fetchAll();
        foreach ($data as $elements) {
            $lastArticle = new Chapter();
            $lastArticle->setId($elements['id']);
            $lastArticle->setTitle($elements['title']);
            $lastArticle->setChapterNumber($elements['chapter_number']);
            $lastArticle->setContents($elements['contents']);
            $lastArticle->setPicture($elements['picture']);
            $lastArticles[] = $lastArticle;
        }

        return $lastArticles;
    }

    /**
     * la méthode addChapter permet d'ajouter un nouveau chapitre
     * @param string $title correspond au titre du nouveau chapitre
     * @param integer $chapter_number correpond au numéro du nouveau chapitre
     * @param string $contents correspond au contenu du nouveau chapitre
     * @param file $picture correspond à la photo du nouveau chapitre
     */
    public function addChapter($chapter_number, $title, $contents, $picture)
    {
        $db = $this->dbConnect();
        $query = "INSERT INTO novel SET chapter_number ='" . $chapter_number . "', title ='" . $title . "', contents ='" . $contents . "', picture ='" . $picture . "'";
        $req = $db->prepare($query);
        $req->execute();
    }

    /**
     * La fonction updateChapter permet de mettre à jour un chapitre existant
     * @param  integer $id correspond à l'id du chapitre à mettre à jour
     * @param  string $title correspond au titre du chapitre à mettre à jour
     * @param  integer $chapter_number correspond au numéro du chapitre à mettre à jour
     * @param  string $contents correspond au contenu du chapitre à mettre à jour
     * @return string    un tableau associatif des éléments à mettre à jour
     */
    public function updateChapter($id, $title, $chapter_number, $contents)
    {
        $db = $this->dbConnect();
        $query = "UPDATE novel SET chapter_number = :chapter_number, title = :title, contents = :contents WHERE id = :id";
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':chapter_number', $chapter_number, PDO::PARAM_STR);
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':contents', $contents, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * La méthode delete permet d'effacer un chapitre selon son $id
     * @param  integer $id correspond à l'id du chapitre à effacer
     * @return void   supprime le chapitre selectionné
     *
     */
    public function delete($id)
    {
        $db = $this->dbConnect();
        $query = "DELETE FROM novel WHERE id = :id";
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        return $req;
    }

    /**
     * Compte le nombre de chapitres dans la base
     */
    public function countAll()
    {
        $db = $this->dbConnect();
        $query = "SELECT count(*) as compteur FROM novel";
        $req = $db->prepare($query);
        $req->execute();
        return ($req->fetch())[0];
    }


    /**
     * @param $page
     */
    public function paging($page)
    {
        $limit = self::MAX_POST_IN_CHAPTERSPAGE;
        $offset = ($page - 1) * self::MAX_POST_IN_CHAPTERSPAGE;

        $db = $this->dbConnect(); // connexion à la bdd
        $req = $db->prepare('SELECT * FROM novel LIMIT :limit OFFSET :offset'); // récupérer tous les articles
        $req->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $req->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $elements) {
            $chapter = new Chapter();
            $chapter->setId($elements['id']);
            $chapter->setTitle($elements['title']);
            $chapter->setChapterNumber($elements['chapter_number']);
            $chapter->setContents($elements['contents']);
            $chapter->setPicture($elements['picture']);
            $chapters[] = $chapter;
        }

        return $chapters;

    }

}

