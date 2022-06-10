<?php
if(isset($_POST['submit']))
{
    $email = $_POST["email"];
    //complete this;
    $password = $_POST["password"];
    //complete this;

    echo resetPassword($email, $password);
}
else
  {
    header("Location:../forms/resetpassword.html");
  }

function resetPassword($email, $password){
    //open file and check if the username exist inside
    //if it does, replace the password
    $email = strtolower($email);
    $password = $password;
    if(($f_open = fopen("../storage/users.csv", "r")) !== FALSE && ($fopen = fopen("../storage/users.temp.csv", "w")) !== FALSE)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            while(($details = fgetcsv($f_open)) !== FALSE)
             {
                if($details[1] == $email) {
                    fputcsv($fopen, [$details[0], $details[1], $password]);
                    $msg = header("location:../forms/login.html");
                }
                else
                {
                    fputcsv($fopen, [$details[0], $details[1], $details[2]]);
                }
            }
            if(!isset($msg)) 
            {
                $msg = "User does not exist";
            }
        }
        else
        {
            $msg = "Invalid email address";
        
        }
        fclose($f_open);
        fclose($fopen);
        @rename("../storage/users.temp.csv", "../storage/users.csv");
    } 
    else 
    {
        $msg = "Internal error";
    }
    return $msg;
}

// echo "HANDLE THIS PAGE";


