<?php
namespace App\Model;
/**
 * Created by PhpStorm.
 * User: EveMarieThomasse
 * Date: 09/10/2018
 * Time: 15:04
 */


class UserManager extends  Manager
{

    /**
     * La fonction permet de vérifier que l'utilisateur a le bon nom et mot de passe
     * @param $name [correspond au nom de l'utilisateur]
     * @param $mdp [correspond au mot de passe associé au nom de l'utilisateur]
     * @return bool vrai si la combinaison est bonne sinon faux
     */
    public function checkLoginAndPassword($name, $mdp)
    {
        $user = $this->getUser($name);
        return password_verify($mdp, $user['password']);

    }

    /**
     * La fonction permet de changer de mot de passe
     * @param $name [correspond au nom de l'utilisateur]
     * @param $mdp [correspond au nouveau mot de passe de l'utilisateur]
     * @return string enregistre le changement de mot de passe de l'utilisateur
     */
    public function updateUserPassword($name,$mdp)
    {
        // Récupérer l'utilisateur ayant pour nom $name
        // Vérifier que $old est correct
        // Récupérer le $new
        // Associer le $new à $name
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE users SET password = :password WHERE name= :name');
        $req->bindValue(':password',password_hash($mdp,PASSWORD_BCRYPT), \PDO::PARAM_STR);
        $req->bindValue(':name', $name, \PDO::PARAM_STR);
        $req->execute();

    }

    /**
     * Permet de récupérer les données de l'utilisateur
     * @param $name [correspond au nom de l'utilisateur]
     * @return $user correspond aux données de l'utilisateur
     * @throws \Exception
     */
    public function getUser($name)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM users WHERE name = :name');
        $req->bindValue(':name', $name, \PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch();

        if(!$user){
            throw new \Exception("Cet utilisateur n'existe pas");
        }

        return $user;

    }
}