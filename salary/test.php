<?php

    require_once "db.php";

    $query="SELECT email FROM employee WHERE id='1'";
    $result =mysqli_query($connect,$query);
    $email;

    if(mysqli_num_rows($result) > 0){
        $email_pass=mysqli_fetch_array($result);
        $email=$email_pass['email'];
    }
?>