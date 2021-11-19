<?php
  session_start();  
?>

<?php 

include '../db/db.php';
error_reporting(0);


if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password =($_POST['password']);

	$sql = "SELECT * FROM employee WHERE email='$email'";
	$result = mysqli_query($connect, $sql);
	$email_count=mysqli_num_rows($result);

	if($email_count){
		$email_pass=mysqli_fetch_array($result);
		$db_pass=$email_pass['password'];
    $role = $email_pass['role'];
		$pass_decode=password_verify($password,$db_pass);
    
		if($pass_decode){
      $_SESSION['login'] =$email_pass['id'];
      $_SESSION['email'] =$email;
      $_SESSION['role'] =$role;
      header('Location: home.php');
      

		}else{
      $error ="Password not correct";
			$_SESSION["error"] = $error;
    header("location: login.php");
		}
	}else{
    $error ="Email  not correct";
		$_SESSION["error"] = $error;
    header("location: login.php");
	}

}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="/baitap3/css/index.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"
    />
  </head>
  <script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"
  ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"
  ></script>
  <body>
    <section class="container-fluid bg">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
          <form class="form-container" method="post" action="">

            <div class="divider d-flex align-items-center my-4">
              <h3 class="text-center fw-bold mx-3 mb-0">Sign in</h3>
            </div>
            <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span><br><br>";
                    }
            ?>  
            <div class="form-group text-field form-outline" >
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required minlength="8" maxlength="128"
              id="exampleInputEmail1" name="email" placeholder="Enter your email" />
            </div>

            <div class="form-group text-field">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" 
              />
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              	<button class="btn btn-primary btn-lg" name="submit">
                Sign in
              </button>
            </div>
          </form>
        </section>
      </section>
    </section>
  </body>
</html>
