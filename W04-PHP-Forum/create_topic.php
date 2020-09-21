<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include 'connect.php';
include 'header.php';
include 'connect.php';
echo '<h2>Create Discussion</h2>';
if($_SESSION['signed_in'] == false)
{
    //Users are not signed in
    echo 'Sorry, you have to be <a href="signin.php">signed in</a> to create a topic.';
}
else
{
    //Users signed in
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {   
        //the form hasn't been posted yet, display it
        //SQL Queries
        $sql = "SELECT id FROM message1";
        
        $result = mysqli_query($list,$sql);
        
         
        if(!$result)
        {
            // Query error
            echo 'Error while selecting from database. Please try again later.';
        }
        else
        {
                echo '
                <form method="post" action="">
                        <label for="comment">New Discussion:</label>
                    <textarea class="form-control m-5" rows="5" name="discussion" ></textarea>
                    <input type="submit" value="Submit Discussion" />
                    </div>
                </form>
                '; 
        }
    }
    else
    {
        $query  = "BEGIN WORK;";
        $result = mysqli_query($list, $query);
         
        if(!$result)
        {
            // Query failed
            echo 'An error occured while creating your topic. Please try again later.';
        }
        else
        {
     
            //the form has been posted, so save it
            //insert the topic into the topics table first, then we'll save the post into the posts table

            //id doesn't need to input, because auto-incremented
            //timestamp doesn't need to input, because current_timestamp()
            $username1 = $_SESSION['user_name'];
            $messages1 = $_POST['discussion'];
            
            $sql = "INSERT INTO 
                        message1(
                            username,
                            messages
                        )
                   VALUES(
                       '$username1',
                       '$messages1'
                   );";
            
                      
            $result = mysqli_query($list, $sql);
            
                 
                if(!$result)
                {
                    //something went wrong, display the error
                    echo 'An error occured while inserting your post. Please try again later.  ' . mysqli_error($list);
                    
                }
                else
                {
                    $sql = "COMMIT;";
                    $result = mysqli_query($list, $sql);
                     
                    //Query successfully added
                    echo 'You have successfully created your new topic. Check it <a href="index.php">here</a>.';
                }
           
        }
    }
}
 

?>