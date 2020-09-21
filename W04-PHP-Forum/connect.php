<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$server = 'localhost';
$username   = 'root';
$password   = 'inkink';
$database   = 'wbd2';

$list=mysqli_connect($server, $username, $password);
 
if(!$list)
{
    exit('Error: could not establish database connection');
}
else{
    
}
if(!mysqli_select_db($list,$database))
{
    exit('Error: could not select the database');
}
else{
    
}

?>