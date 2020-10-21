<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/> 
  <meta name="description" content="A quiz with fields of questions"/>
  <meta name="keywords" content="HTML5, quiz, questions, answers"/>
  <meta name="author" content="Mountither Al Rashid"/>
  <title>Quiz</title> 
  <link href="styles/style.css" rel="stylesheet"/>
  <link href="styles/quiz_style.css" rel="stylesheet"/>
  <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)"/>
  <link href="https://fonts.googleapis.com/css?family=Gafata&display=swap" rel="stylesheet"/>
  <script src="scripts/quiz.js"></script>
</head>
<body>
<?php
  include_once ("header.inc");
  include_once("menu.inc");
?>
  <main>
    <p id="quiz_timer"></p>
    <section class="quiz_intro">
    <h2>The Photography Quiz</h2>
    <p>This is a quiz tailored to the people who want to test their photography knowledge accumalated throughout the site.</p>
    </section>
    <form action = "markquiz.php" method="POST" novalidate="novalidate">
      <fieldset class="details">
        <legend>Your Details</legend>
        <p><label for="f_name">First Name</label> 
          <input type="text" name="First_Name" id="f_name" required="required" pattern="^[a-zA-Z- ]+$" maxlength="30"/></p>
        <p><label for="l_name">Last Name</label>
          <input type="text" name="Last_Name" id="l_name" required="required" pattern="^[a-zA-Z- ]+$" maxlength="30"/></p>  
        <p><label for="stud_id">Student ID</label>
          <input type="text" name="Student_ID" id="stud_id" required="required" pattern="\d{7}|\d{10}"/></p>
      </fieldset>
      <fieldset id="Q1">
          <h4>1. Lenses are laminated with? </h4>
          <p><input type="radio" id="magnesium" name="Q1" value="magnesium" required="required"/>
             <label for="magnesium">A) Magnesium fluoride</label></p>
          <p><input type="radio" id="sodium" name="Q1" value="sodium"/>
            <label for="sodium">B) Sodium fluoride</label></p>
          <p><input type="radio" id="zinc" name="Q1" value="zinc"/>
            <label for="zinc">C) Zinc fluoride</label></p>
      </fieldset>
      <fieldset id="Q2">
          <h4>2. The Latin word for 'Camera' is </h4>
          <p><input type="radio" id="room" name="Q2" value="room" required="required"/>
             <label for="room">A) Room</label></p>
          <p><input type="radio" id="pic_box" name="Q2" value="pic_box"/>
           <label for="pic_box">B) Picture box</label></p>
          <p><input type="radio" id="light_room" name="Q2" value="light_room"/>
            <label for="light_room">C) Light room</label></p>
      </fieldset>
      <fieldset id="Q3">
          <h4>3. The Camera Obscura was first established in </h4>
          <p><input type="radio" id="1800CE" name="Q3" value="1800CE" required="required"/>
             <label for="1800CE">A) 1800 CE</label></p>
          <p><input type="radio" id="1600CE" name="Q3" value="1600CE"/>
            <label for="1600CE">B) 1600 CE</label></p>
          <p><input type="radio" id="400BCE" name="Q3" value="400BCE"/>
            <label for="400BCE">C) 400 BCE</label></p>
      </fieldset>
      <fieldset>
          <h4><label for="Q4">4. The first camera to be used on the moon?</label></h4> 
            <p><select name="Q4" id="Q4">
                  <option value="">Please Select</option>
                  <option value="liecaflex">Liecaflex SL MOT</option>			
                  <option value="hassablad">Hassablad 500EL HEC</option>
                  <option value="mamiya">Mamiya RB67</option>         
              </select>
            </p>
          <section id = "Q5_checkbox">
          <h4>5. Which of the following are camera brands that exist today</h4>
          <p><input type="checkbox" id="konica" name="Q5[0]" value="Konica" checked="checked"/>
             <label for="konica">Konica</label></p>
            <p><input type="checkbox" id="kodak" name="Q5[1]" value="Kodak" />
               <label for="kodak">Kodak</label></p>
            <p><input type="checkbox" id="canon" name="Q5[2]" value="Canon" />
                <label for="canon">Canon</label></p>
            <p><input type="checkbox" id="panasonic" name="Q5[3]" value="Panasonic"/>
                <label for="panasonic">Panasonic</label></p>
            <p><input type="checkbox" id="nikon" name="Q5[4]" value="Nikon"/>
                <label for="nikon">Nikon</label></p>
          </section>
          <h4><label for="Q6">6. Who was the first man to capture a Photo? </label></h4>
            <textarea id="Q6" name="Comments" rows="5" cols="40" placeholder="Hint: check the Topics section of this site..."></textarea>
      </fieldset>
      <p id="output_error"></p>
      <p id="sec_attempt"></p>
      <div class="button">
          <input id="submit" type="submit" value="Submit Quiz"/>
           <input id="reset" type="reset" value="Reset Quiz"/>
      </div>
    </form>
  </main>
<?php include ("footer.inc"); ?>
<script src="scripts/jquery/jquery-3.4.1.min.js"></script>
<link href="scripts/jquery/icheck-1.x/skins/square/green.css" rel="stylesheet">
<script src="scripts/jquery/icheck-1.x/icheck.js"></script>
<script src="scripts/enhancements.js"></script>
</body>
</html>