<?php
include "login.php";
logout();

function logout(){
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
    if(isset($_SESSION["user_log"]))
    {
        $username = $_SESSION["username"];
        $userpassword = $_SESSION["userpassword"];
        unset($_SESSION["user_log"]);
    }
    header("location:/userAuth/forms/login.html");
}

//echo "HANDLE THIS PAGE";
?>