CREATE TABLE IF NOT EXISTS attempts (
                            attempt_id INT(10) AUTO_INCREMENT PRIMARY KEY ,
                            date_time DATETIME ,
                            student_id INT(20) , 
                            number_of_attempt INT(1) ,
                            score INT(2),
                            CONSTRAINT FOREIGN KEY (student_id) REFERENCES students(student_id) 
                            );