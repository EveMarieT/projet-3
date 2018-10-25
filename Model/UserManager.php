<?php
/**
 * Created by PhpStorm.
 * User: EveMarieThomasse
 * Date: 09/10/2018
 * Time: 15:04
 */

require_once('User.php');
require_once('Manager.php');

class UserManager extends  Manager
{

    public function checkLoginAndPassword($name, $mdp)
    {
        // Récuperer l'utilisateur ayant pour nom $name
        // Vérifier que $mdp est ok par rapport à $user['mdp'] (tip voir
        // Retourner password_verify(.......)
        $user = $this->getUser($name);
        return password_verify($mdp, $user['password']);

    }

    public function updateUserPassword($name,$mdp)
    {
        // Récupérer l'utilisateur ayant pour nom $name
        // Vérifier que $old est correct
        // Récupérer le $new
        // Associer le $new à $name
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE users SET password = :password WHERE name= :name');
        $req->bindValue(':password',password_hash($mdp,PASSWORD_BCRYPT), PDO::PARAM_STR);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->execute();

    }

    public function getUser($name)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM users WHERE name = :name');
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch();

        if(!$user){
            throw new Exception("Cet utilisateur n'existe pas");
        }

        return $user;
    }
}