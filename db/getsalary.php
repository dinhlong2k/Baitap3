<?php

    require_once "db.php";
    
    if(isset($_POST['checking_view'])){
        $id=$_POST['id'];

        $result_array =[];

        $query="SELECT * FROM employee WHERE id='$id'";
        $result =mysqli_query($connect,$query);


        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                array_push($result_array,$row);
            }

            header('Content-type: application/json');

            echo json_encode($result_array);
        }
    }
?>