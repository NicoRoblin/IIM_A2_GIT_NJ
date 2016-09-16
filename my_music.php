<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');

/*===============================
	Dashboard
===============================*/

if(!isset($_SESSION) OR empty($_SESSION)){
    header('Location: login.php');
    exit();
}
$id = $_SESSION["id"];
$musics = listMyMusics($db, $id);

include 'view/_header.php';
include 'view/my_music.php';
include 'view/_footer.php';