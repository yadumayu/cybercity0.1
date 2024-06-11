<?php
require_once "config.php";
if(isset($_POST["id"]))
{
    $userid = mysqli_real_escape_string($DataBase, $_POST["id"]);

    $sql = "DELETE FROM users WHERE id = '$userid'";

    if(mysqli_query($DataBase, $sql)){
         
        header("Location: AdminInfo.php");
    } else{
        echo "Error: " . mysqli_error($DataBase);
    }
    mysqli_close($DataBase);    
}
?>