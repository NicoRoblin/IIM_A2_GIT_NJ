<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email'])&& isset($_POST['email2']) && isset($_POST['password']) && isset($_POST['password2'])  &&
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['email2']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

	$username = htmlspecialchars($_POST["username"]);
	$email = htmlspecialchars($_POST["email"]);
    $email2 = htmlspecialchars($_POST["email2"]);
	$password = htmlspecialchars($_POST["password"]);
    $password2 = htmlspecialchars($_POST["password2"]);

	$req=$db->prepare("SELECT id FROM users WHERE username LIKE :username OR email LIKE :email");
	$req->execute(array("username"=>$username, "email"=>$email));

	$members=$req->fetchAll();

	if(sizeof($members) == 0){

	    if ($password == $password2){
            if ($email == $email2){

                $password = md5($password);
	            $req=$db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                $req->execute(array("username"=>$username, "email"=>$email, "password"=>$password));
                header('Location: login.php');

	        }else{

                $_SESSION['message'] = 'Erreur : Vos emails ne sont pas identiques !';
                header('Location: register.php');
            }

	    }else{
            $_SESSION['message'] = 'Erreur : Vos mots de passe ne sont pas identiques !';
            header('Location: register.php');
        }

    }else{
        $_SESSION['message'] = 'Erreur : Votre username ou votre email existe déjà !';
        header('Location: register.php');
    }

}else{
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}