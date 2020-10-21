<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" /> 
  <meta name="description" content="Demonstrates some basic HTML form creation"/>
  <meta name="keywords" content="HTML5, index, assign1"/>
  <meta name="author" content="Mountither Al Rashid"/>
  <title>Index</title>
  <!-- <meta name="viewport" content="width=device-width, intital-scale=1.0"/>  -->
  <link href="styles/style.css" rel="stylesheet"/>
  <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)"/>
  <link href="https://fonts.googleapis.com/css?family=Gafata&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"/>  
</head>
<body>
<?php
  include_once ("header.inc");
  include_once("menu.inc");
?>
  <section class="section_row">
    <div class="main_col">
      <div class="blocks">
          <h3>Welcome to the website of Photography.</h3>
      </div>
      <div class="blocks">
          <h2>Useful resources to scope out</h2>
          <p><a href="https://www.golden-hour.com">A website that tells you the best time to take a shot based on area + weather</a></p>
          <p><a href="https://www.watermark.ws/">If you're worried about stolen work, watermarking is the way to go</a></p>
          <p><a href="https://www.lightstalking.com/">Essential tips for novice photographers</a></p>
          <p><a href="https://www.youtube.com/channel/UCfhW84xfA6gEc4hDK90rR1Q">When social media interacts with Photography</a></p>
          <p><a href="http://www.divephotoguide.com/">For the photographers who are interested in underwater photography</a></p>
      </div>
    </div>
    <aside class="sidebar">
      <div class="blocks">
          <h4>The Goals of this site</h4>
          <p>The content on this website is introductry level. Helping you acquire inforamtion about a variety of topics 
            that are contained with the subject of Photography. A selection of resources are linked for the people who want to
            delve deeper. The intended goals of the website is expressed through the theoratical and interactive content.
          </p>
      </div>
      <div class="blocks">
        <h4>A list of things to do on this site</h4>
        <ol>
          <li>Learn about
            <ul>
              <li>The career prospects of photography</li>
              <li>The history behind the camera</li>
              <li>The development of the industry</li>
              <li>How it has developed in this era</li>
            </ul>
          </li>
          <li>Take a quiz to test your knowledge</li>
          <li>Discover useful links related to phtography</li>
        </ol>
      </div>
    </aside>
  </section>
  <?php include ("footer.inc"); ?>
</body>
</html>