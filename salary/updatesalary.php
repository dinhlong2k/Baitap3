<?php 

    include 'db.php';
    extract($_POST);

    $id=$_POST['id'];
    $salarynormal =$_POST['salarynormal'];
	$hourwork =$_POST['hour'];
	$bonus =$_POST['bonus'];
	$totalsalary =$_POST['totalsalary'];

    $query="UPDATE employee SET luongcoban='$salarynormal',sogiolam='$hourwork',bonus='$bonus',tongluong='$totalsalary' WHERE id='$id'";

    mysqli_query($connect,$query);

    $query="SELECT email FROM employee WHERE id='1'";
    $result =mysqli_query($connect,$query);
    $email;
    if(mysqli_num_rows($result) > 0){
        $email_pass=mysqli_fetch_array($result);
        $email=$email_pass['email'];
    }

    $to_email = $email;
    $subject = "Thông báo lương tháng";
    $body = "Xin chào, lương tháng của bạn là " . $totalsalary . " với " . $hourwork ." giờ làm";
    $headers = "From: TIKI";

    if (mail($to_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }
?>