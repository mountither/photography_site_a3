<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/> 
  <meta name="description" content="html for quiz submission output"/>
  <meta name="keywords" content="HTML5, results, attempts, quiz, output, assign2"/>
  <meta name="author" content="Mountither Al Rashid"/>
  <title>Quiz</title> 
  <link href="styles/style.css" rel="stylesheet"/>
  <link href="styles/quiz_style.css" rel="stylesheet"/>
  <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)"/>
  <link href="https://fonts.googleapis.com/css?family=Gafata&display=swap" rel="stylesheet"/> 
  <script src="scripts/result.js"></script>
</head>
<body>
<?php
  include_once ("header.inc");
  include_once("menu.inc");
?>
<form id="quizform">
	<fieldset>
		<h1>Quiz Confirmation</h1>
		<p>Name: <span id="confirm_name"></span></p>
		<p>ID: <span id="confirm_id"></span></p>
		<p>Quiz score: <span id="confirm_score"></span></p>
		<p>Number of attempts: <span id="confirm_attempt"></span></p>
		<p>Link to retry quiz: <span id="confirm_retry"></span></p>

		<input type="hidden" name="firstname" id="f_name" />
		<input type="hidden" name="lastname" id="l_name" />
		<input type="hidden" name="stud_id" id="stud_id" />
	</fieldset>
</form>
<?php include ("footer.inc"); ?>
</body>
</html>