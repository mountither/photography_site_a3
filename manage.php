<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="CWA assign3 Quiz Managing"/>
    <meta name="keywords" content="php, mySQL, quiz, marks" />
    <meta name="author" content="Mountither Al Rashid" />
    <title>Quiz Query</title>
    <link href="styles/style.css" rel="stylesheet"/>
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)"/>
    <link href="https://fonts.googleapis.com/css?family=Gafata&display=swap" rel="stylesheet"/>
</head>
<body>

<?php
  include_once ("header.inc");
  include_once("menu.inc");
?>



<h1>Search Database</h1>

<?php
    require_once ("settings.php");
    $conn = @mysqli_connect($host,
                            $user,
                            $pwd,
                            $sql_db
                        );
    
    if (!$conn) {
        echo "<p>Database Connection Failure</p>";
    } else {
                    
        if (isset($_POST["list_all"])){
            

            $query_1 = "select * from attempts";
            $query_2 = "select * from students";

            $result_1 = mysqli_query($conn, $query_1);
            $result_2 = mysqli_query($conn, $query_2);

            if (!$result_1){
                echo "<center><p>Attempts table does not exist</p></center>";
            } else {
                echo "<table border = \"1\" align = \"center\">\n";
                echo "<tr>\n "
                ."<th scope=\"col\">Attempt ID</th>\n "
                ."<th scope=\"col\">Date/Time</th>\n "
                ."<th scope=\"col\">Student ID</th>\n "
                ."<th scope=\"col\">Attempt Number</th>\n "
                ."<th scope=\"col\">Score</th>\n "
                ."</tr>\n ";
    
                while ($row = mysqli_fetch_assoc($result_1)){
                    echo "<tr><td>{$row['attempt_id']}</td>";
                    echo "<td>{$row['date_time']}</td>";
                    echo "<td>{$row['student_id']}</td>";
                    echo "<td>{$row['number_of_attempt']}</td>";
                    echo "<td>{$row['score']}</td>";
                }
                echo "</table>\n ";
                mysqli_free_result($result_1);

            }
            
            if (!$result_2){
                echo "<center><p>Students table does not exist</p></center>";
            } else {
                echo "\n<table border = \"1\" align = \"center\">\n";
                echo "<tr>\n "
                ."<th scope=\"col\">Student ID</th>\n "
                ."<th scope=\"col\">First Name</th>\n "
                ."<th scope=\"col\">Last Name</th>\n "
                ."</tr>\n ";
                
                while ($row = mysqli_fetch_assoc($result_2)){
                    echo "<tr><td>{$row['student_id']}</td>";
                    echo "<td>{$row['first_name']}</td>";
                    echo "<td>{$row['last_name']}</td>";
                }
                echo "</table>\n ";
    
                mysqli_free_result($result_2);
            }

            echo "<center><div style=\"color: red;\"><a href=\"supervisor.php\">Back</a></div></center>";
            mysqli_close($conn);
        } 

        if (isset($_POST["search_id"])){
            $search_id = $_POST["studid"];

            $query_1 = "select * from students where student_id = '".$search_id."'";
            $query_2 = "select * from attempts where student_id = '".$search_id."'";
            
            $result_1 = mysqli_query($conn, $query_1);
            $result_2 = mysqli_query($conn, $query_2);

            if (!$result_2) {
                echo "<center><p>Table doesnt exist</p></center>";
                echo "<center><div style=\"color: red;\"><a href=\"supervisor.php\">Back</a></div></center>";
            }else
                if(mysqli_num_rows($result_2) == 0){
                    echo "<center><p>Student ID does not exist in students table</p></center>";
                } else {
                    echo "<table border = \"1\" align = \"center\">\n";
                    echo "<tr>\n "
                    ."<th scope=\"col\">Attempt ID</th>\n "
                    ."<th scope=\"col\">Date/Time</th>\n "
                    ."<th scope=\"col\">Student ID</th>\n "
                    ."<th scope=\"col\">Attempt Number</th>\n "
                    ."<th scope=\"col\">Score</th>\n "
                    ."</tr>\n ";
        
                    while ($row = mysqli_fetch_assoc($result_2)){
                        echo "<tr><td>{$row['attempt_id']}</td>";
                        echo "<td>{$row['date_time']}</td>";
                        echo "<td>{$row['student_id']}</td>";
                        echo "<td>{$row['number_of_attempt']}</td>";
                        echo "<td>{$row['score']}</td>";
                    }
                    echo "</table>\n ";
                    mysqli_free_result($result_2);

                }
                
            if (!$result_1){
                echo "<center><p>Attempts table does not exist</p></center>";
                echo "<center><div style=\"color: red;\"><a href=\"supervisor.php\">Back</a></div></center>";
            } else 
            if(mysqli_num_rows($result_1) == 0){
                echo "<center><p>Student ID does not exist in attempts table</p></center>";
            } else {
                    echo "\n<table border = \"1\" align = \"center\">\n";
                    echo "<tr>\n "
                    ."<th scope=\"col\">Student ID</th>\n "
                    ."<th scope=\"col\">First Name</th>\n "
                    ."<th scope=\"col\">Last Name</th>\n "
                    ."</tr>\n ";
                    
                    while ($row = mysqli_fetch_assoc($result_1)){
                        echo "<tr><td>{$row['student_id']}</td>";
                        echo "<td>{$row['first_name']}</td>";
                        echo "<td>{$row['last_name']}</td>";
                    }
                    echo "</table>\n ";
        
                    mysqli_free_result($result_1);
            }

            echo "<center><div style=\"color: red;\"><a href=\"supervisor.php\">Back</a></div></center>";
            mysqli_close($conn);
        } 


        if (isset($_POST["full_mark"])){
        
            $query = "SELECT * FROM students INNER JOIN attempts ON students.student_id = attempts.student_id WHERE attempts.score = '10'";
            
            $result = mysqli_query($conn, $query);
            
            if (!$result){
                echo "<center><p>Table doesnt exist</p></center>";
            } else 
            if (mysqli_num_rows($result) == 0){
                echo "<center><p>No student attained a full mark</p></center>";
            } else {
                echo "\n<table border = \"1\" align = \"center\">\n";
                echo "<tr>\n "
                ."<th scope=\"col\">Student ID</th>\n "
                ."<th scope=\"col\">First Name</th>\n "
                ."<th scope=\"col\">Last Name</th>\n "
                ."</tr>\n ";
                
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>{$row['student_id']}</td>";
                    echo "<td>{$row['first_name']}</td>";
                    echo "<td>{$row['last_name']}</td>";
                }
                echo "</table>\n ";
    
                mysqli_free_result($result);
            }

            echo "<center><div style=\"color: red;\"><a href=\"supervisor.php\">Back</a></div></center>";
            mysqli_close($conn);
        } 
        
            if (isset($_POST["half_mark"])){
                $query = "SELECT * FROM students INNER JOIN attempts ON students.student_id = attempts.student_id WHERE attempts.score < '5' AND attempts.number_of_attempt = '2'";
            
                $result = mysqli_query($conn, $query);
                
                if (!$result){
                    echo "<center><p>Table doesnt exist</p></center>";
                } else 
                if (mysqli_num_rows($result) == 0){
                    echo "<center><p>No student attained a mark less than 50% on their 2nd attempt</p></center>";
                } else {
                    echo "\n<table border = \"1\" align = \"center\">\n";
                    echo "<tr>\n "
                    ."<th scope=\"col\">Student ID</th>\n "
                    ."<th scope=\"col\">First Name</th>\n "
                    ."<th scope=\"col\">Last Name</th>\n "
                    ."</tr>\n ";
                    
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>{$row['student_id']}</td>";
                        echo "<td>{$row['first_name']}</td>";
                        echo "<td>{$row['last_name']}</td>";
                    }
                    echo "</table>\n ";
        
                    mysqli_free_result($result);
                }
    
                echo "<center><div style=\"color: red;\"><a href=\"supervisor.php\">Back</a></div></center>";
                mysqli_close($conn);
        } 


        if (isset($_POST["del_id"])){
            $del_record = $_POST["delstudid"];

            $pre_query1 = "select * from attempts where student_id = '".$del_record."'";
            $exist1 = mysqli_query($conn, $pre_query1);
            $pre_query2 = "select * from students where student_id = '".$del_record."'";
            $exist2 = mysqli_query($conn, $pre_query2);

            $query1 = "delete from attempts where student_id = '".$del_record."'";
            $result1 = mysqli_query($conn, $query1);
            $query2 = "delete from students where student_id = '".$del_record."'";
            $result2 = mysqli_query($conn, $query2);

            if (!$result1 && !$result2) {
                echo "<center><p>Table doesnt exist</p></center>";
                echo "<center><div style=\"color: red;\"><a href=\"supervisor.php\">Back</a></div></center>";
            } else
                if(mysqli_num_rows($exist1) == 0 || mysqli_num_rows($exist2) == 0){
                    echo "<center><p>Delete operation unsuccessful</p></center>";
                    echo "<center><p><a href=\"supervisor.php\">Back</a></p></center>"; 
                } else {
                    echo "<center><p>Deleted student (ID: $del_record) successfully</p></center>";
                    echo "<center><p><a href=\"supervisor.php\">Back</a></p></center>";
                }
            mysqli_close($conn);  
        }

        if (isset($_POST["change_score"])){
            $id_score = $_POST["change_id"];
            $attempt = $_POST["attempt"];
            $score = $_POST["score"];

            $pre_query = "select * from attempts where student_id = '".$id_score."' AND number_of_attempt = '".$attempt."'";
            $exist = mysqli_query($conn, $pre_query);

            $query = "update attempts set score = '".$score."' where student_id = '".$id_score."' AND number_of_attempt = '".$attempt."'";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<center><p>Table doesnt exist</p></center>";
                echo "<center><div style=\"color: red;\"><a href=\"supervisor.php\">Back</a></div></center>";
            }else
                if(mysqli_num_rows($exist) == 0){
                    echo "<center><p>Student may not exist in database or attempt number is invalid</p></center>";
                    echo "<center><p><a href=\"supervisor.php\">Back</a></p></center>";
                } else {
                    echo "<center><p>Changed student (ID:$id_score and attempt: $attempt) quiz score to $score</p></center>";
                    echo "<center><p><a href=\"supervisor.php\">Back</a></p></center>";
                }
            mysqli_close($conn);  


        }
    }


?> 

</body>
<?php include ("footer.inc"); ?>
</html>
