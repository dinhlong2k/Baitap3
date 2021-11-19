<?php 

    include('db.php');

    if(!empty($_POST["email"])){
        $query="SELECT * FROM employee WHERE email='" .$_POST["email"]. "'";

        $result=mysqli_query($connect,$query);

        $count=mysqli_num_rows($result);

        if($count >0){
            echo "<span style='color:red'> Sorry Email already exists .</span>";
            echo "<script>$('#btn_save').prop('disabled',true);</script>";
        }else{
            echo "<span style='color:green'> Email available for Registration .</span>";
            echo "<script>$('#btn_save').prop('disabled',false);</script>";
        }
    }
?>