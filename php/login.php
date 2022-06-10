 <?php
 session_start();
$username = $password = "";
if(isset($_POST['submit']))
{
               $username = $_POST["email"];
                  //finish this line
                 $password = $_POST["password"];
                //finish this

                loginUser($username, $password);
 }
 function loginUser($username, $password)
 {
     /*
         Finish this function to check if username and password 
     from file match that which is passed from the form
     */
    if(!strlen($username) || !strlen($password))
    {
        die("enter username and password");
    }
    $success = false;

    $filename = fopen("../storage/users.csv","r");
    
    while(($data = fgetcsv($filename)) !== false)
    {
        if($data[1] == $username && $data[2] == $password)
        {
            $success = true;
            break;
        }
    }
    fclose($filename);

    if($success)
    {
        $_SESSION["user_log"] = array(
            "username"=>"$email","userpassword"=>"$password"
        );
        header("location:/userAuth/dashboard.php");
    }
    else
    {
        die("error occurred");
    }
     
 } 

 //echo "HANDLE THIS PAGE";

?>

