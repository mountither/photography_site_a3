/**
 * Author: Mountither 102486181
 * Target: quiz.html
 * Purpose: for quiz functionality 
 * Created: 27/09
 * Last update: 30/09
 * Credits: class/tute/internet
 */

"use strict";
var debug = true;

function validate() {
    var result = true;
    var errMsg = "";

    var theValues = getRequiredValues();
    var firstname = theValues[0];
    var lastname = theValues[1];
    var studentID = theValues[2];
    var question1 = theValues[3];
    var question2 = theValues[4];
    var question3 = theValues[5];
    var question4 = theValues[6];
    var question5 = theValues[7];
    var question6 = theValues[8];
    if (firstname.length == 0 || firstname.length > 30){
        errMsg += "First Name cannot be empty or above 30 characters.\n";
        result = false;
    }else 
        if (!firstname.match(/^[a-zA-Z- ]+$/)){
            errMsg += "First Name can only contain alpha characters, hyphen and space.\n";
            result = false;
        }

    if (lastname.length == 0 || lastname.length > 30){
        errMsg += "Last Name cannot be empty or above 30 characters.\n";
        result = false;
    }else 
        if (!lastname.match(/^[a-zA-Z- ]+$/)){
            errMsg += "Last Name can only contain alpha characters, hyphen and space.\n";
            result = false;
        }

    if (isNaN(studentID)){
        errMsg += "StudentID must be numeric only.\n";
    }else
        if (!(studentID.length == 7 || studentID.length == 10)){
            errMsg += "Student ID must be either 7 or 10 digits.\n";
            result = false;
        }
    
    if (question1 == undefined){
        errMsg += "Question 1 must be answered.\n";
        result = false;
    }

    if (question2 == undefined){
        errMsg += "Question 2 must be answered.\n";
        result = false;
    }

    if (question3 == undefined){
        errMsg += "Question 3 must be answered.\n";
        result = false;
    }
    
    if (question4 == ""){
        errMsg += "Question 4 must be answered.\n";
        result = false;
    } 
    
    if (question5.length == 0){
        errMsg += "Question 5 must have at least one answer.\n";
        result = false;
    }

    if (question6 == ""){
        errMsg += "Question 6 must be answered.\n";
        result = false;
    }
    
    var errorArea = document.getElementById("output_error");
    errorArea.style.color = 'red';
    errorArea.style.fontSize = '12px';
    errorArea.style.textAlign = 'center';
    var score = calcScore();

    if (errMsg != ""){
        errorArea.innerText = errMsg;
    } else 
        if (score == 0){
            errorArea.textContent = "You must attain a score higher than zero, recheck your answers";
            result = false;
        } else
            var attempts = quizCount(result);
            if (studentID == sessionStorage.studentID && attempts > 2){
                errorArea.textContent = "You have attempted this quiz more than the threshold of 2";
                result = false;
            }

    if (result && score > 0){
        storeQuizDetails();
    }
    
    return result; 
    
}

function quizCount(result) {
    if (result == true){
        var attempts = sessionStorage.clicks = +(sessionStorage.clicks || 0) + 1;
        sessionStorage.attempts = attempts;
    } else {
        attempts = 0;
    }
    

    return attempts;
}

function getRequiredValues(){
    
    var firstname = document.getElementById("f_name").value;
    var lastname = document.getElementById("l_name").value;
    var studentID = document.getElementById("stud_id").value;

    var q1Input = document.getElementById("Q1").getElementsByTagName('input');
    var q2Input = document.getElementById("Q2").getElementsByTagName('input');
    var q3Input = document.getElementById("Q3").getElementsByTagName('input');

    var q4Input = document.getElementById("Q4");
    var question4 = q4Input.options[q4Input.selectedIndex].value;
   
    var q5Input = document.getElementById("Q5_checkbox").getElementsByTagName('input');

    var q6Input = document.getElementById("Q6");
    var question6 = q6Input.value;

    
    for(var i=0;i<q1Input.length; i++){
        if (q1Input[i].checked){
            var question1 = q1Input[i].value;
        }
    }
    for(var i2=0;i2<q2Input.length; i2++){
        if (q2Input[i2].checked){
            var question2 = q2Input[i2].value;
        }
    }
    for(var i3=0;i3<q3Input.length; i3++){
        if (q3Input[i3].checked){
            var question3 = q3Input[i3].value;
        }
    }

    var question5 = "";
    for(var i5=0;i5<q5Input.length;i5++){
        if (q5Input[i5].checked){
            question5 += q5Input[i5].value + " ";
        }
    }
    question5 = question5.split(" ").filter(function(array) {return array.trim() != "";});
    
    return [firstname, lastname, studentID, question1, question2, question3, question4, question5, question6];
}

function storeQuizDetails() {
    
    var theValues = getRequiredValues();
    var firstname = theValues[0];
    var lastname = theValues[1];
    var studentID = theValues[2];
    var question1 = theValues[3];
    var question2 = theValues[4];
    var question3 = theValues[5];
    var question4 = theValues[6];
    var question5 = theValues[7];
    var question6 = theValues[8];
    

    sessionStorage.firstname = firstname;
    sessionStorage.lastname = lastname;
    sessionStorage.studentID = studentID;
    sessionStorage.question1 = question1;
    sessionStorage.question2 = question2;
    sessionStorage.question3 = question3;
    sessionStorage.question4 = question4;
    sessionStorage.question5 = question5;
    sessionStorage.question6 = question6;

}

function calcScore(){
    var score = 0;
    var valuesForCalc = getRequiredValues();
    var question1 = valuesForCalc[3];
    var question2 = valuesForCalc[4];
    var question3 = valuesForCalc[5];
    var question4 = valuesForCalc[6];
    var question5 = valuesForCalc[7];
    var question6 = valuesForCalc[8];

    if (question1 == "magnesium"){
        score += 1;
    }
    if (question2 == "room"){
        score += 1;
    }
    if (question3 == "400BCE"){
        score += 1;
    }
    if (question4 == "hassablad"){
        score += 2;
    }
    if (question5 == "Canon,Panasonic,Nikon"){
        score += 3;
    }
    if (question6.toLowerCase() == "Joseph Niepce".toLowerCase()){
        score += 2;
    }

    sessionStorage.score = score;
    return score;

}

function init(){
    var quizForm = document.getElementById("the_quiz");

    if (!debug){
        quizForm.onsubmit = validate;
    }
}

window.onload = init;