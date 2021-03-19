<?php
//this page is just to set the difficulty and choose the words accordingly, DO NOT TOUCH
	session_save_path("./");
	session_start();
	$word_list = file($_POST["section"]);
	$_SESSION["chosen_word"] = $word_list[array_rand($word_list)];
	header('location:hangman.php');
?>