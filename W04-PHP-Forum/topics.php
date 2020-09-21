<?php

//Session Start
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'header.php';
include 'connect.php';

//Title of the page       
echo '<div class="p-5"><h2>'.  $_GET['messages']. '</h2></div>';    

//SQL Query
$sql = "SELECT  
            messages, timestamps,username
        FROM
            message1
        WHERE
            id = '" . mysqli_real_escape_string($list, $_GET['id']) . "' or id_parent = '" . mysqli_real_escape_string($list, $_GET['id']) . "';
        
        ";
        
        
    
$result = mysqli_query($list, $sql);
    
if(!$result)
{
    echo 'The forum discussion could not be displayed, please try again later.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'There are no discussion yet.';
    }
    else
    {
        //Make the table;
        echo '</br>';
        echo '<div class="p-5"><table class="table table-hover "';
        echo '
                <tr>
                <th>Messages</th>
                <th>Created At</th>
                <th>User </th>
                </tr></div>'; 
        
                
        
        //If there is result, show the result
        while($row = mysqli_fetch_assoc($result))
        {   
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo $row['messages'];
                echo '</td>';
                echo '<td class="middlepart">';
                    echo $row['timestamps'];
                echo '</td>';
                echo '<td class="rightpart">';
                    echo $row['username'];
                echo '</td>';
            echo '</tr>';
        }
        
        //Reply Section
        echo '
        <form method="post" action="reply.php?idparent='
        . $_GET['id'] . '&username=' . $_SESSION['user_name'] . '&messages='. $_GET['messages'] . '">' . 
            '<div class="form-group ">
                <label for="comment">Comment:</label>
            <textarea class="form-control m-5" rows="5" name = "reply-content" id="comment" ></textarea>
            <input type="submit" value="Submit Comment" />
            </div>
        </form>
        '; 

    }

}

?>