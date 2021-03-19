<!DOCTYPE html>
<html>
<head>
	<title>Hangman</title>
</head>
<body>
	<?php
	include 'draw.php';
	session_save_path("./");
	session_start();
	//trim to remove any special chars
	$attribute = explode(":", $_SESSION["chosen_word"]);
	$word = trim($attribute[0]);
	$_SESSION["correct"] = $word;
	$word_length = strlen($word);
	if (!empty($_SESSION["status"])) {
		$word_status = $_SESSION["status"];
	}
	else {
		$word_status = str_repeat('*', $word_length);
	}
	//if a guess was made then check the letters
	if (isset($_POST["guess"])) {
		//if the letter has already been used skip attempt
		if (strpos($_SESSION["letters"], $_POST["guess"]) !== false and !empty($_SESSION["letters"])) {
			echo "letter already used. Try again.<br>";
		}
		//wrong guess
		elseif (strpos($word, $_POST["guess"]) === false) {
			--$_SESSION["attempts"];
			echo "wrong letter try again.<br>";
			$_SESSION["letters"] .= $_POST["guess"];
		}
		//checks if the letter is there and update variables
		else {
			for ($i=0; $i < $word_length; $i++) { 
				if ($word[$i] == $_POST["guess"]) {
					$word_status[$i] = $_POST["guess"];
					$_SESSION["status"] = $word_status;
				}
			}
			$_SESSION["letters"] .= $_POST["guess"];
		}
	}
	//draw the hangman
	if ($_SESSION["attempts"] == 6) {
		print_hang0();
	}
	elseif ($_SESSION["attempts"] == 5) {
		print_hang1();
	}
	elseif ($_SESSION["attempts"] == 4) {
		print_hang2();
	}
	elseif ($_SESSION["attempts"] == 3) {
		print_hang3();
	}
	elseif ($_SESSION["attempts"] == 2) {
		print_hang4();
	}
	elseif ($_SESSION["attempts"] == 1) {
		print_hang5();
	}
	echo 'Attempts Remaining: '.$_SESSION["attempts"].'<br>';
	echo $word_status;
	//lose
	if ($_SESSION["attempts"] == 0) {
		header('location:gameover.php');
	}
	//win
	elseif (strpos($word_status, '*') === false) {
		++$_SESSION["score"];
		header('location:win.php');
	}
	echo "<br>Hint: ".$word_length." letters, ".$attribute[1];
	?>
	<form action="hangman.php" method="post">
		<input type="text" pattern="[a-z]" name="guess" title="single alpha characters only" maxlength="1">
		<input type="submit" value="Submit">
	</form>
	<?php
	echo 'Attempts Remaining: '.$_SESSION["attempts"].'<br>';
	echo 'Letters Guessed: '.$_SESSION["letters"].'<br>';
	echo "Score: ".$_SESSION["score"];
	?>
</body>
</html>