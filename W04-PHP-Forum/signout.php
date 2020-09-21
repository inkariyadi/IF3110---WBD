<?php

//Start Session
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

//Session Ends
$_SESSION['signed_in'] = false;

    
include 'signin.php';

?>