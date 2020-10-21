/**
 * Author: Mountither 102486181
 * Target: result.html
 * Purpose: for quiz output storage and functionality, located at result.html 
 * Created: 27/09
 * Last update: 30/09
 * Credits: class/tute/internet
 */

"use strict";

function validate(){
    var errMsg = "";
    var result = true;

    return result; 
}

function getOutput(){
    var attempts = sessionStorage.attempts;
    if (sessionStorage.firstname != undefined){
       document.getElementById("confirm_name").textContent = sessionStorage.firstname + " " + sessionStorage.lastname;
       document.getElementById("confirm_id").textContent = sessionStorage.studentID;
       document.getElementById("confirm_score").textContent = sessionStorage.score + "/10";
       document.getElementById("confirm_attempt").textContent = attempts;

       if (attempts >= 2){
           document.getElementById("quizform").getElementsByTagName('p')[4].style.display = "none";
       }else {
            var a = backToQuiz();
            document.getElementById("confirm_retry").appendChild(a);
        }
       
    }
   
}

function backToQuiz(){

    var anchor = document.createElement('a');
    anchor.setAttribute('href', "./quiz.html");
    anchor.innerHTML = "Click here";
    return anchor;
}

function init(){
    getOutput();
    var quizResult = document.getElementById("quizform");
    quizResult.onsubmit = validate;
}

window.onload = init;