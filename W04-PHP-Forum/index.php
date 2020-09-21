<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include 'connect.php';
include 'header.php';



//first select the category based on $_GET['cat_id']
$sql = "SELECT
            id, username,messages
        FROM
            message1
            ";
        
$result = mysqli_query($list, $sql);
 
if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error();
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        
        echo '<h2>Forum Discussions</h2>';
     
        //do a query for the topics
        $sql = "SELECT  
                    id, timestamps,messages
                FROM
                    message1
                WHERE
                    id_parent is NULL;
                ";

        $result = mysqli_query($list, $sql);
         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                //prepare the table
                echo '<table class="table table-hover">
                      <tr>
                        <th>Topic</th>
                        <th>Created at</th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h4><a href="topics.php?id=' . $row['id'] .'&messages=' .$row['messages'] . '">' . $row['messages'] . '</a><h4>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo $row['timestamps'];
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}
 
?>


