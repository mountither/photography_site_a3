<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/> 
  <meta name="description" content="A quiz with fields of questions"/>
  <meta name="keywords" content="HTML5, quiz, questions, answers"/>
  <meta name="author" content="Mountither Al Rashid"/>
  <title>Supervisor</title> 
  <link href="styles/style.css" rel="stylesheet"/>
  <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)"/>
  <link href="https://fonts.googleapis.com/css?family=Gafata&display=swap" rel="stylesheet"/>
</head>
<body>
<?php
  include_once ("header.inc");
  include_once("menu.inc");
?>
<form action = "manage.php" method="POST">
      <fieldset class="details">
        <legend>Search all attempts (Student ID)</legend>
        <p>List all attempts <input id="submit" name = "list_all" type="submit" value="Search"/></p>
        <p><label for="studid">Student ID</label>
          <input type="text" name="studid" id="studid"/>
          <input id="submit" name="search_id" type="submit" value="Search"/></p>
      </fieldset>
      <fieldset class="details">
        <legend>Search Queries</legend>
        <p>Students attained 100% </p>
        <input id="submit" name = "full_mark" type="submit" value="Search"/>
        <p>Students attained 50% on 2nd attempt </p>
        <input id="submit" name = "half_mark" type="submit" value="Search"/>
       </fieldset>
       <fieldset class="details">
        <legend>Delete Attempts for Student</legend>
        <p><label for="delstudid">Student ID</label>
          <input type="text" name="delstudid" id="delstudid"/>
          <input id="submit" name="del_id" type="submit" value="Delete"/></p>
      </fieldset>
      <fieldset class="details">
        <legend>Change score for quiz attempt</legend>
        <p><label for="change_id">Student ID</label>
          <input type="text" name="change_id" id="change_id"/></p>
        <p><label for="attempt">Attempt number</label>
          <input type="text" name="attempt" id="attempt"/></p>
        <p><label for="score">Change score to</label>
          <input type="text" name="score" id="score"/></p>
          <input id="submit" name = "change_score" type="submit" value="Change"/>
      </fieldset>

      <?php include ("footer.inc"); ?>
</body>
</html>