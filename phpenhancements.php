<!DOCTYPE php>
<html lang="en">
<head>
  <meta charset="utf-8"/> 
  <meta name="description" content="enhancements relevant to PHP"/>
  <meta name="keywords" content="SQL, PHP, assign2"/>
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
    <h2>PHP enhancement implemented on this website</h2>
    <ul>
      <li><a target="_blank" href="supervisor.php">Seperate Tables</a>
          <ul>
          <li>Normalised and structured data tables</li>
          <li>2 tables automatically created: <a target="_blank" href="student_table.sql">Students</a> and <a target="_blank" href="attempt_table.sql">Attempts</a> table</li>
          <li>One to many relationship with a foreign key located in attempts table (student_id)</li>
          </ul> 
      </li>  
    </ul>
    
  </article>
  <?php include ("footer.inc"); ?>
  </body>
</html>