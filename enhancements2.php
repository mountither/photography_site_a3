<!DOCTYPE php>
<html lang="en">
<head>
  <meta charset="utf-8"/> 
  <meta name="description" content="enhancements relevant to JS"/>
  <meta name="keywords" content="JS, jQuery, assign2"/>
  <meta name="author" content="Mountither Al Rashid"/>
  <title>EnhancementsJS</title> 
  <link href="styles/style.css" rel="stylesheet"/>
  <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)"/>
  <link href="https://fonts.googleapis.com/css?family=Gafata&display=swap" rel="stylesheet"/>
</head>
<body>
<?php
  include_once ("header.inc");
  include_once("menu.inc");
?>
  <article>
    <h2>Javascript enhancements implemented on this website</h2>
    <ul>
      <li><a target="_blank" href="quiz.php#quiz_timer">Quiz countdown timer</a>
          <ul>
          <li>Implemented with jQuery features</li>
          <li>Countdown event is triggered once the user has entered the quiz page</li>
          <li>The function takes a set time in milliseconds and dissects into minutes and seconds, with adjustments to single digit numbers</li>
          <li>Once countdown completes, the Submit button disables with a message "Quiz is over". The user cannot submit the quiz</li>
          <li>The programmer can easily change the set time (in milliseconds) in the countDown function's argument in line 29</li>
          <li>3rd party contribution: <a target="_blank" href="https://stackoverflow.com/questions/50041474/javascript-countdown-timer-for-hour-minutes-and-seconds-when-a-start-button-cli"> Link</a></li>
          </ul> 
      </li>  
      <li><a target="_blank" href="quiz.php">JS enhancements via jQuery</a>
          <ul>
            <li>In jQuery to trigger an event, window.onload is not required. Instead implementing a '$' infront a function indicates a jQuery function that selects and performs an action within the function. Details below.</li>
            <li>The first jQuery function: </li>
            <ul>
              <li>The intro (including the user details fields) will slide up and down, making way for the timer to assert sigificance on the page.</li>
              <li>The iCheck library is used to decorate inputs, specifically radio and checkbox types, API is located in jQuery folder. The jQuery selector is the input tag name and the action in iCheck, which applies the shape, effect, colour and area size to the checkboxClass and radioClass </li>
              <li>3rd party contribution: <a href="https://github.com/fronteed/iCheck/">Link</a></li>
            </ul>
            <li>The second function:</li>
            <ul>
              <li>This jQuery function selects the submit button via its ID and as the click event is triggered a function toggles a fade effect on entire section via its ID, with an interval of half a second</li>
              <li>3rd party contribution: jQuery library official site</li>
            </ul>
          </ul>
      </li>
    </ul> 
    
  </article>
  <?php include ("footer.inc"); ?>
  </body>
</html>