<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">	
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/baitap3/css/employeeform.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Home</title>
</head>
<body>

<div class="container">
		<div class="col-md-3"></div>

		<div class="col-md-6" id="form">
			<form>
				<h1><strong>Sửa thông tin</strong></h1>
				<br>
                  
				<div class="center">
				<div class="form-input">
					<img id="file-ip-1-preview"><br>
					<label for="file-ip-1">Upload Image</label>
					<input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
					<div class="preview">
					</div>
				</div>
				</div>

                  <div class="row">
                  	<div class="col-md-1"></div>
					<div class="col-md-5">
						<label for="firstName">Họ</label>
						<input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control" required=""><br>
					</div>
					<div class="col-md-5">
						<label for="lastName">Tên</label>
						<input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control" required="">
					</div>

                  	<div class="col-md-1"></div>
                  </div>
				<br>
				<div class="row">
                  	<div class="col-md-1"></div>
        			<div class="col-md-10">
						<label for="email">Email</label>
						<input type="text" name="email" id="edit_email" placeholder="Enter Email" class="form-control" required=""><br>

						<label for="password">Mật khẩu</label>
						<input type="Password" name="password" id="password" placeholder="Password" class="form-control" required="">
        			</div>
                  	<div class="col-md-1"></div>
                </div>
				<br><br>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-5">
						<label for="date">Ngày tham gia</label>
						<input type="date" name="date_join">	
					</div>

					<div class="col-md-2">
						<label>Male</label>&nbsp;&nbsp;
						<input type="radio" name="gender">
					</div>
					<div class="col-md-3">
						<label>Female</label>&nbsp;&nbsp;
						<input type="radio" name="gender">
					</div>


					<div class="col-md-1"></div>
				</div>

				<br><br>


				<div class="row">
					<div class="col-md-1"></div>
						<div class="col-md-10">
							<label for="phone">Số điện thoại</label>
							<input type="number" id="phone" placeholder="03XX-XXXXXXX" class="form-control" required="">
						</div>

						<div class="col-md-1"></div>
				</div>
				<br>


				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
					<label for="active">Hoạt động</label>
					<select id="select" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
						<option selected>Chose</option>
						<option value="1">Active</option>
						<option value="2">No Active</option>
					</select>
					</div>
					<div class="col-md-1"></div>
				</div>

				<br>
				<div class="row">
					<div class="col-md-6 center">
						<button type="Submit" class="btn btn-info form-control" style="background-color: red;">Trở về</button>
					</div>
					<div class="col-md-6 center">
						<button type="Submit" class="btn btn-info form-control" style="background-color: green;">Thêm nhân viên</button>
					</div>
				</div>


<br><br>

			</form>
		</div>
		<div class="col-md-3"></div>	
	</div>
	<script>
		$(document).ready(function(){
			getDataById();
		});
		function showPreview(event){
			if(event.target.files.length > 0){
				var src = URL.createObjectURL(event.target.files[0]);
				var preview = document.getElementById("file-ip-1-preview");
				preview.src = src;
				preview.style.display = "block";
			}
		}

		function getDataById(){
			var userId = '<?php echo $_GET['id'] ?>';
            $.ajax({
                url:'/baitap3/db/get.php' +userId,
				type:'get',
				dataType:'json',
				contentType: "application/json; charset=UTF-8",
				success:function(data){
					data=JSON.parse(JSON.stringify(data));
					$("#firstname").val(data[0].name);	
					$('#edit_email').val(data[0].email);

            }
        })
	}
	</script>
</body>
</html>