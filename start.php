<!DOCTYPE html>
<html>
<head>
	<title>Start</title>
</head>
<body>
	<form action="difficulty.php" method="post">
		<select name="section">
			<option value="easy.txt">Easy</option>
			<option value="medium.txt">Medium</option>
			<option value="hard.txt">Hard</option>
			<option value="extreme.txt">Extreme</option>
		</select>
		<input type="submit" value="submit">
	</form>
	<?php
	//sets the session variables and chooses a word
	session_save_path("./");
	session_start();
	$_SESSION["status"] = '';
	$_SESSION["attempts"] = 6;
	$_SESSION["letters"] = '';
	$_SESSION["score"] = 0;
	?>
</body>
</html>