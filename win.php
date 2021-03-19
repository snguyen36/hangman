<!DOCTYPE html>
<html>
<head>
	<title>Winner!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Congratulations!</h1>
	<p>You were able to guess the correct word.</p>
	<?php 
	session_save_path("./");
	session_start();
	echo "The word was ".$_SESSION["correct"];
	?>
	<div id="container">
		<div class="choice">
			<h2>Continue</h2>
			<p>Continue playing the game to increase your score and climb the leaderboards.</p>
			<form action="difficulty.php" method="post">
				<select name="section">
					<option value="easy.txt">Easy</option>
					<option value="medium.txt">Medium</option>
					<option value="hard.txt">Hard</option>
					<option value="extreme.txt">Extreme</option>
				</select>
				<input type="submit" class="button" value="submit">
			</form>
		</div>
		<div class="choice">
			<h2>End</h2>
			<p>End the game and save your current score to the leaderboard.</p>
			<a href="#" class="button">Link Button</a>
		</div>
	</div>
	<a href="start.php">home(temp link)</a>
	<?php
	//resets everthing but the score to continue
	$_SESSION["status"] = '';
	$_SESSION["attempts"] = 6;
	$_SESSION["letters"] = '';
	echo "Current Score is: ".$_SESSION["score"];
	?>
</body>
</html>