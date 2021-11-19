<?php 

    include 'db.php';
    extract($_POST);

    $nameimage;
/* Getting file name */
	if(($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['file']))){

		$nameimage = uploadImage($_POST['file']);

	}

	// Upload image  
	function uploadImage($file){
		$image_parts = explode(";base64,", $file);
		$image_type_aux = explode("../upload/", $image_parts[0]);
		$image_type = $image_type_aux[1];
		$image_base64 = base64_decode($image_parts[1]);
		$name = uniqid() . '.png';
		$file = '../upload/' . $name;
		file_put_contents($file, $image_base64);
		return $name;
	}

    $id=$_POST['id'];
    $name =$_POST['name'];
	$email =$_POST['email'];
	$password =$_POST['password'];
	$phone =$_POST['phone'];
	$role =$_POST['role'];
	$location=$_POST['location'];


    if($password != ''){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query="UPDATE employee SET image='$nameimage', name='$name',email='$email' ,password='$hashed_password', phone='$phone', role='$role', location='$location' WHERE id='$id'";

        mysqli_query($connect,$query);
    }else{
        $query="UPDATE employee SET image='$nameimage', name='$name',email='$email' , phone='$phone', role='$role', location='$location' WHERE id='$id'";

        mysqli_query($connect,$query);
    }

?>