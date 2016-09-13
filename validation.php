<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

	$username = htmlspecialchars($_POST["username"]);
	$email = htmlspecialchars($_POST["email"]);
	$password = htmlspecialchars($_POST["password"]);

	$req=$db->prepare("SELECT id FROM users WHERE username LIKE :username OR email LIKE :email");
	$req->execute(array("username"=>$username, "email"=>$email));

	$members=$req->fetchAll();

	if(sizeof($members) == 0){
		$req=$db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
		$req->execute(array("username"=>$username, "email"=>$email, "password"=>$password));
        header('Location: login.php');
	}else{
		$_SESSION['message'] = 'Erreur : Votre username ou votre email existe déjà !';
        header('Location: register.php');
	}


}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}