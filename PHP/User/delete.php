<?php
//lab task delete the user from database and destroy session
    session_start();
    include_once "includes/dbh.inc.php";

    $sql="delete  from users where ID =".$_SESSION['ID'];
    $result = mysqli_query($conn,$sql);
    
    if($result)
    {
    session_destroy();
    header("Location:homepage.php");
    }
    else 
    {
        echo $sql;
    }
?>
