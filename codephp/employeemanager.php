<?php
  session_start();
  include('permission.php');

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="/baitap3/css/employeemanager.css" />
    <link rel="stylesheet" href="../css/image.css" type="text/css">
    <script type="text/javascript" src="../css/employeemanager.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="height: 70px;">
		<div class="container">
			<a class="navbar-brand text-white" href="#"><i class="fa fa-graduation-cap fa-lg mr-2"></i>BLOG</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="nvbCollapse">
				<ul class="navbar-nav ml-auto" style="letter-spacing: normal;">
					<li class="nav-item active pl-1">
						<a class="nav-link" href="home.php"><i class="fa fa-th-list fa-fw mr-1"></i>Manager</a>
					</li>
          <li class="nav-item pl-1">
						<a class="nav-link" href="logout.php"><i class="fa fa-home fa-fw mr-1"></i>Logout</a>
					</li>
					</li>
				</ul>
			</div>
		</div>
	</nav>

    <div class="container-fluid">
      <div class="table-responsive">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-5">
                          <h2>QU???N L?? NH??N VI??N</h2>
                      </div>
                      <div class="col-sm-7">
                        <?php
                          if(isset($_SESSION['email'])){
                            if($_SESSION['role'] == "admin"){
                              echo '<a href="employeeform.php" class="btn btn-secondary"><i class="fas fa-plus-square" style="color: #03A9F4"></i> <span>Add New User</span></a>';
                              echo '<a href="#" class="btn btn-secondary"><i class="far fa-file-excel" style="color: green"></i> <span>Export to Excel</span></a>';
                            }
  
                          }

                        ?>				
                      </div>
                  </div>
              </div>
              <table id="table_employee" class="table table-striped table-hover" >
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>???nh</th>
                          <th>T??n</th>
                          <th>Email</th>				
                          <th>Ng??y tham gia</th>
                          <th>Doanh thu</th>
                          <th>Tr???ng th??i</th>
                          <th>Vai tr?? </th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="load_data">
                    
                  </tbody>
              </table>
              <div class="clearfix">
                  <div class="hint-text">Showing <b>8</b> out of <b>25</b> entries</div>
                  <ul class="pagination">
                      <li class="page-item disabled"><a href="#">Previous</a></li>
                      <li class="page-item"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item active"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link">4</a></li>
                      <li class="page-item"><a href="#" class="page-link">5</a></li>
                      <li class="page-item"><a href="#" class="page-link">Next</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div> 


  <!--THe Modal-->
  <?php if($_SESSION['role'] == 'admin'){ ?>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top :50px;">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:1000px">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ch???nh s???a th??ng tin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/baitap3/db/get.php" id="edit-form">
        <input class="form-control" type="hidden" name="id">

          <div class="center">
          <div class="form-input">
            <img id="file-ip-1-preview" class="center"><br>
            <label for="file-ip-1">Upload Image</label>
            <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
          </div>
          </div>
          <div class="form-group">
            <label for="name">T??n</label>
            <input type="text" class="form-control" id="nameInput" aria-describedby="emailHelp" placeholder="Nh???p t??n">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="emailinput" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="password">M???t kh???u</label>
            <input type="password" class="form-control" id="passwordinput" placeholder="Nh???p m???t kh???u">
          </div>
          <div class="form-group">
            <label for="phone">S??? ??i???n tho???i</label>
            <input type="number" class="form-control" id="phoneinput" placeholder="Nh???p s??? ??i???n tho???i">
          </div>
          <div class="form-group">
            <label for="location">?????a ch???</label>
            <input type="text" class="form-control" id="locationinput" placeholder="Nh???p ?????a ch???">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

  <!--Modal delete-->
  <?php if($_SESSION['role'] == 'admin'){ ?>
  <div class="modal fade" id="exampleModalCenterDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <input class="form-control" type="hidden" name="id">
        <h5 class="modal-title" id="exampleModalLongTitle">B???n c?? ch???c ch???n mu???n xo?? t??i kho???n n??y?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteEmp(id)">Delete</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</body>
</html>