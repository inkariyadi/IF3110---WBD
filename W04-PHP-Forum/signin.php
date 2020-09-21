<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//signin.php
include 'connect.php';
include 'header.php';
 
echo '<h2>Sign In</h2>';
$array = array(
    "inka" => "inkink",
    "inka222" => "ink",
);
 
//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
//     echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
// }
    echo 'udah masuk';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        /*the form hasn't been posted yet, display it
          note that the action="" will cause the form to post to the same page it is on */
        echo '<form method="post" action=>
            Username: <input type="text" name="user_name" />
            Password: <input type="password" name="user_pass">
            <input type="submit" value="Sign in" />
         </form>';
        
   
    }
    else
    {
        
            if($array[$_POST['user_name']]==$_POST['user_pass']){
                $result = true;
            }
            else{
                $result = false;
            }
            
                if($result==false)
                {
                    echo 'Wrong username/password ' . '. <a href ="signin.php">Please try again.</a>';
                }
                else
                {
                    
                    $_SESSION['signed_in'] = true;
                

                    $_SESSION['user_name']  = $_POST['user_name'];

                     
                    echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">See Forum Discussions</a>.';
                }
}
    }

 
?>