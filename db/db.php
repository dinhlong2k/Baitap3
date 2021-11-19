<?php
    $connect= new mysqli("localhost","root","","employee");

    if($connect -> connect_error){
        echo "connect error";
    }
?>