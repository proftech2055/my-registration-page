<?php
$filename = $file = "";
if(isset($_POST['submit']))
{
    if(isset($_POST["fullname"],$_POST["email"],$_POST["password"]))
    {
        $username = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        registerUser($username, $email, $password,$filename,$file);
    }
    

}

function registerUser($username, $email, $password,$filename,$file){
    //save data into the file
    $filename = "../storage/users.csv";
    $file = fopen($filename,"a");
    if(fwrite($file,"$username,$email,$password\n"))
    {
        echo "USER SUCCESSFULLY REGISTERED";
    }
    else
    {
        die("error occured");
    }
    
    // echo "OKAY";
}
//echo "HANDLE THIS PAGE";

?>

