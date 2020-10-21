<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="CWA assign3 Quiz Marking" />
    <meta name="keywords" content="php, mySQL, quiz, marks" />
    <meta name="author" content="Mountither Al Rashid"  />
    <title>Quiz Results</title>
    <link href="styles/style.css" rel="stylesheet"/>
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)"/>
    <link href="https://fonts.googleapis.com/css?family=Gafata&display=swap" rel="stylesheet"/>
</head>
<body>

<?php
  include_once ("header.inc");
  include_once("menu.inc");
?>

<h1>Quiz Results</h1>
<?php

    require_once ("settings.php");

    function sanitise_input($data) {
        $data = trim($data); 
        $data = stripslashes($data);
        $data = htmlspecialchars($data);  
        return $data;
    }

    if (isset ($_POST["First_Name"])){
        $errMsg = "";
        $firstname = $_POST["First_Name"];
        $lastname = $_POST["Last_Name"];
        $studentID = $_POST["Student_ID"];
        
        if ($firstname == "")
        $errMsg .= "<p>First Name cannot be empty.</p>";
        else {
		    if (!preg_match("/^[a-zA-Z- ]*$/",$firstname)){
			    $errMsg .= "<p>First Name can only contain alpha characters, hyphen and space.</p>";
            } else
                if (strlen($firstname) > 31){
                    $errMsg .= "<p>First Name cannot be above 30 characters.</p>";
                }
        }

        if ($lastname == "")
        $errMsg .= "<p>Last Name cannot be empty.</p>";
        else {
		    if (!preg_match("/^[a-zA-Z- ]*$/",$lastname)){
			    $errMsg .= "<p>Last Name can only contain alpha characters, hyphen and space.</p>";
            } else
                if (strlen($lastname) > 31){
                    $errMsg .= "<p>Last Name cannot be above 30 characters.</p>";
                }
            }

        if ($studentID == "") 
        $errMsg .= "<p>Please enter your Student ID.</p>";
        else{ 
            if (!is_numeric($studentID)){
                $errMsg .= "<p>StudentID must be numeric only.</p>";
            } else
                if (!preg_match('/^(\d{7}|\d{10})$/', $studentID)){
                    $errMsg .= "<p>Student ID must be either 7 or 10 digits.</p>";
                }
        } 
        if (!isset ($_POST["Q1"]))
            $errMsg .= "<p>Question 1 must be answered.</p>";
        else {
            $q_one = $_POST["Q1"];
        }
        if (!isset ($_POST["Q2"]))
            $errMsg .= "<p>Question 2 must be answered.</p>";
        else {
            $q_two = $_POST["Q2"];
        }
        if (!isset ($_POST["Q3"]))
            $errMsg .= "<p>Question 3 must be answered.</p>";
        else {
            $q_three = $_POST["Q3"];
        }
        if (($_POST["Q4"]) == "")
            $errMsg .= "<p>Question 4 must be answered.</p>";
        else {
            $q_four = $_POST["Q4"];
        }

        $checked = [];
        for($i=0; $i<5; $i++){
            if (isset($_POST["Q5"][$i])){
                $checked[] = $_POST["Q5"][$i];
            }
        }
        if (count($checked)==0){
            $errMsg .= "<p>Question 5 must be answered.</p>";
            
        }
        if($_POST["Comments"] == "")
            $errMsg .= "<p>Question 6 must be answered.</p>";
        else {
            $q_six = $_POST["Comments"];
        }
    } else {
        header ("location:quiz.php");
        }
    if ($errMsg != ""){
        echo "<center><div style=\"color: red;\">$errMsg</div></center>";
        echo "<center><p><a href=\"quiz.php\">Back</a></p></center>";
    }else {
        $firstname=sanitise_input($firstname);
        $lastname=sanitise_input($lastname);
        $q_six = sanitise_input($q_six);
        $checked = implode(", ", $checked);
        $total_mark = 0;
            
        if ($q_one == "magnesium") {$total_mark += 1;}
        if ($q_two == "room") {$total_mark += 1;}
        if ($q_three == "400BCE") {$total_mark += 1;}
        if ($q_four == "hassablad") {$total_mark += 2;}
        if ($checked == "Canon, Panasonic, Nikon") {$total_mark += 3;}
        if (strtolower($q_six) == strtolower("Joseph Niepce")) {$total_mark += 2;}
            
        $total_mark;

        if ($total_mark == 0){
            echo "<center><div style=\"color: red;\">You must attain a score higher than zero, recheck your answers</div></center>";
            echo "<center><p><a href=\"quiz.php\">Back</a></p></center>";
        } else {
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

            if (!$conn) {
                echo "<center><div style=\"color: red;\">Database Connection Failure</div></center>";
                echo "<center><p><a href=\"quiz.php\">Back</a></p></center>";
            } else {
                    $query_1 = file_get_contents('student_table.sql');

                    $student_table = mysqli_query($conn, $query_1);
                    
                    $query_2 = file_get_contents('attempt_table.sql'); 

                    $attempt_table = mysqli_query($conn, $query_2);

                    $date = date("Y-m-d, H:i:s");
                    
                        
                    $search_dup = "SELECT * FROM attempts WHERE student_id = '".$studentID."'";
                    $check = mysqli_query($conn, $search_dup);
                    $rows = mysqli_num_rows($check);
                    $row_attempt =  $rows + 1;

                    if($rows > 1){
                        echo "<center><div style=\"color: red;\">You have attempted this quiz more than the threshold of 2</div></center>";
                        echo "<center><p><a href=\"quiz.php\">Back</a></p></center>";
                        } else {
                            
                            $quer = "INSERT INTO students (student_id, first_name, last_name) VALUES 
                            ('$studentID', '$firstname', '$lastname')";  
                            
                            $query = "INSERT INTO attempts (date_time, student_id, number_of_attempt, score) VALUES
                            ('$date', '$studentID', '$row_attempt', '$total_mark')";
                            
                            mysqli_query($conn, $quer); 
                            mysqli_query($conn, $query); 

                            if($row_attempt == 2){
                                    $link_str = "";
                            } else {
                                $link_str = "Link to retry the quiz: <a href=".'quiz.php'.">Click here</a> </p>";
                            }

                            echo "<center><p>User Name: $firstname $lastname <br/>
                                    ID: $studentID </br>
                                    Score: $total_mark <br/>
                                    Number of attempts: $row_attempt <br/>
                                    $link_str</p></center>";

                            
                            mysqli_close($conn);
                            }
                }

            }
        }

?>
</body>
<?php include ("footer.inc"); ?>
</html>