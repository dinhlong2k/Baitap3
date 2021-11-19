<?php 
     require_once "db.php";

     if(isset($_POST['id'])){
        $id= $_POST['id'];
        $sql="DELETE FROM employee WHERE id='$id'";
        mysqli_query($connect,$sql);
        mysqli_close($connect);
     }
?>