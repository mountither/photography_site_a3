<!DOCTYPE php>
<html lang="en">
<head>
  <meta charset="utf-8" /> 
  <meta name="description" content="A collection of html creating a phtography website" />
  <meta name="keywords" content="html5, index, assign1" />
  <meta name="author" content="Mountither Al Rashid" />
  <title>Index</title> 
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
    <h2>HTML/CSS enhancements implemented on this website</h2>
    <ul>
      <li><a target="_blank" href="./topic.php#image_map">Image map element</a>
          <ul>
          <li>Polygons, rectangles and circles were used to map the coordinates</li>
          <li>mapped on an image of a collection of camera equipment with unique hover names and wikipedia links. This enhances interactivity and a compressed area to visually understand with relevence to the topic</li>
          </ul> 
      </li>  
      <li><a target="_blank" href="./topic.php#antiquity">Mark element with the ui-tooltip class</a>
          <ul>
            <li>Used to highlight and express the meaning of a potential unknown word, used in Photography industry.</li>
            <li>This element was used to immediately give the definition to the user. If the user is curious, a definition list exists at the end of that page</li>
          </ul>
      </li>
      <li><a target="_blank" href="./topic.php">The hover psuedo class used for the navbar and the content bar</a>
          <ul>
            <li>This is done through style.css (navbar) and the topic.css (content_bar)</li>
            <li>Allows the user to highlight the specific page intended to navigate to.</li>
            <li>Aesthetically pleasing and engaging</li>
          </ul>
      </li>
      <li><a target="_blank" href="./index.php">The ::after psuedo class used in the main main title on the main page</a>
          <ul>
          <li>used to distiguish between sentences, with a specific action attached to it, represented throught the two colours</li>
          <li>instead of creating new classes in php and css files for each sentence, this element was used for efficiency.</li>
          </ul>
      </li>
      <li><a target="_blank" href="./topic.php#basics">The child combinators used numerically and odd/even targets</a>
          <ul>
            <li>selection is effecient, making css less messy.</li>
          </ul>
      </li>
      <li><a target="_blank" href="./topic.php#foreword">The grouping method used for the heading 2 and heading 3 in topics section</a>
          <ul>
            <li>Grouped due to commonality in coloring, laterr spacing and text-shadowing. </li>
          </ul>
      </li>
      <li><a target="_blank" href="./styles/responsive.css">This site is responsive for common devices (iPhone 6/7/8) and the iPad</a>
          <ul>
          <li>a universal compatibility versions of this site is vital in exposing on a multitude of devices and catering to different individuals, especially in society's heavy dependence on smartphones.</li>
          <li>Some topics on the content bar are unavailable for iPhones and Ipads due to the impracticality of hovering with a mouse.</li>
          </ul>
      </li>
    </ul> 
    
  </article>
  <?php include ("footer.inc"); ?>
</body>
</html>