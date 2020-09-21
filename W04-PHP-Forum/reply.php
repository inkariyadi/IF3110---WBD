<?php
//create_cat.php
include 'connect.php';
include 'header.php';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //someone is calling the file directly, which we don't want
    echo 'This file cannot be called directly.';
}
else
{
    //check for sign in status
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
       
        $topic = 0;
        $username = $_SESSION['user_name'];
        $message = $_POST['reply-content'];
        $idparents = $_GET['idparent'];
        $messageparent = $_GET['messages'];
        $sql = "INSERT INTO 
                message1(
                    topics,
                    username,
                    messages,
                    id_parent) 
                VALUES (
                    '$topic',
                    '$username',
                    '$message',
                    '$idparents');
                ";
        
        $result = mysqli_query($list, $sql);
        
        
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="topics.php?id='
            . $_GET['idparent'] . '&messages=' . $_GET['messages'] . '">the topic</a>.';
        }
    }
}

?>