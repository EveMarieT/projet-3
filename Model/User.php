<?php
namespace App\Model;
/**
 * Created by PhpStorm.
 * User: EveMarieThomasse
 * Date: 04/10/2018
 * Time: 10:42
 */

class User
{
    /**
     * Données utiles pour la création d'un utilisateur
     *
     */

    /**
     * @var string correspond à l'email de l'utilisateur
     */
    private $email;

    /**
     * @var string correspond au nom de l'utilisateur
     */
    private $name;

    /**
     * @var string correspond au mot de passe de l'utilisateur
     */
    private $password;

    /**
     * La fonction renvoie la valeur de l'attribut $email
     * @return string retourne l'email de l'utilisateur
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * La fonction permet de modifier la valeur de l'attribut $email
     * @param string $email correspond à l'email de l'utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * La fonction renvoie la valeur de l'attribut $name
     * @return string retourne le nom de l'utilisateur
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * la fonction permet de modifier la valeur de l'attribut $name
     * @return string $name correspondant au nom de l'utilisateur
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * la fonction renvoie la valeur de l'attribut $password
     * @return string $password correspond au mot de passe de l'utilisateur
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * La fonction permet de modifier la valeur de l'attribut $password
     * @param string $password correspondant au  mot de passe de l'utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}