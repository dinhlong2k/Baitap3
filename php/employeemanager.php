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
    <script type="text/javascript" src="../css/employee.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand text-white" href="#"><i class="fa fa-graduation-cap fa-lg mr-2"></i>BLOG</a>
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
                          <h2>QUẢN LÝ NHÂN VIÊN</h2>
                      </div>
                      <div class="col-sm-7">
                        <?php
                          if(isset($_SESSION['email'])){
                            if($_SESSION['role'] == "admin"){
                              echo '<a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#ModalCenterAdd"><i class="fas fa-plus-square" style="color: #03A9F4"></i> <span>Add New User</span></a>';
                              echo '<a href="/baitap3/db/exportCSV.php" class="btn btn-secondary"><i class="far fa-file-excel" style="color: green"></i> <span>Export to Excel</span></a>';
                              echo '<a href="/baitap3/php/salary.php" class="btn btn-secondary"><i class="far fa-money-bill-alt" style="color: green"></i> <span>Salary</span></a>';
                            }
  
                          }

                        ?>				
                      </div>
                  </div>
              </div>
              
              <br><br>

              <div class="row center">
                  <div class="col-lg-4 col-lg-offset-4">
                      <input type="search" id="search" value="" class="form-control" placeholder="Search anything">
                  </div>
              </div>
              <br><br>

              <div class="message-success" id="success_div">

              </div>

              <div id="load_data">

              </div>
          </div>
      </div>
  </div> 
  

  <!--Modal add User -->
  <div class="modal fade" id="ModalCenterAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm nhân viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="error-message">

      </div>
      <form action="" method="post" id="add-form" enctype="multipart/form-data">

          <div class="center">
            <div class="form-group">
              <img src="" id="selectedImage"  style="height: 150px;width: 150px;">
              <br>
              <label for="image">Select Image</label>
              <input type="file" onchange="changeImage(this)" name="file" id="file" class="form-control">
					</div>
          </div>
          <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" id="nameInput" aria-describedby="emailHelp" placeholder="Nhập tên">
          </div>
          <div class="form-group">
            <span id="check-username"></span>
            <label for="email">Email</label>
            <input type="text" class="form-control" id="emailinput" aria-describedby="emailHelp" placeholder="Enter email" onInput="checkEmail()">
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="passwordinput" placeholder="Nhập mật khẩu">
          </div>
          <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control" id="phoneinput" placeholder="Nhập số điện thoại">
          </div>
          <div class="form-group">
            <label for="location">Địa chỉ</label>
            <input type="text" class="form-control" id="locationinput" placeholder="Nhập địa chỉ">
          </div>
          
          <div class="form-group">
          <label for="active">Vai trò</label>
          <div class="form-check">
            <label class="form-check-label" for="exampleRadios1">
            <input class="form-check-input message_pri" type="radio" name="role" id="exampleRadios1" value="admin" checked>admin
            <br>
            <input class="form-check-input message_pri" type="radio" name="role" id="exampleRadios2" value="user">user
            </label>
          </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_save">Save</button>
      </div>
    </div>
  </div>
</div>


  <!--THe Modal update-->
  <?php if($_SESSION['role'] == 'admin'){ ?>
  <div class="modal fade" id="ModalCenterUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top :50px;">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:1000px">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="edit-form" method="post" enctype="multipart/form-data">
        <input  type="hidden" id="id_edit">

          <div class="center">
            <div class="form-group">
              <img src="" id="selectedImage1"  style="height: 150px;width: 150px;">
              <br>
              <label for="image">Select Image</label>
              <input type="file" onchange="changeImage1(this)" name="file" id="file" class="form-control">
					</div>
          </div>
          <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control " id="nameupdate"  aria-describedby="emailHelp" placeholder="Nhập tên">
          </div>
          <div class="form-group">
          <span id="check-username1"></span>
            <label for="email">Email</label>
            <input type="text" class="form-control" id="emailupdate" aria-describedby="emailHelp" placeholder="Enter email" onInput="checkEmail1()">
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="passwordupdate" placeholder="Nhập mật khẩu">
          </div>
          <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control" id="phoneupdate" placeholder="Nhập số điện thoại">
          </div>
          <div class="form-group">
            <label for="location">Địa chỉ</label>
            <input type="text" class="form-control" id="locationupdate" placeholder="Nhập địa chỉ">
          </div>
          <div id="editrole">
            <div class="form-group">
            <label for="active">Vai trò</label>
            <div class="form-check">
              <label class="form-check-label" for="exampleRadios1">
              <input class="form-check-input message_update" type="radio" name="roleupdate" id="roleupdate1" value="admin" checked>admin
              <br>
              <input class="form-check-input message_update" type="radio" name="roleupdate" id="roleupdate2" value="user">user
              </label>
            </div>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary employee_update" >Save changes</button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc chắn muốn xoá tài khoản này?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete_record">Delete</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>




<script>
  $(document).ready(function(){
    deleteEmployee();
    getEmployee();
    updateEmployee();
    search();
    getAllDataByPage();
    addUser();
});

function changeImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#selectedImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function changeImage1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#selectedImage1').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function getAllDataByPage(page){
  $.ajax({
    url: "/baitap3/db/pagination.php",
    method: "post",
    data:{
      page:page
    },
    success:function(data){
      $("#load_data").html(data);
    }
  })
}

getAllDataByPage();

$(document).on("click",".page-item",function(){
  var page=$(this).attr("id");
  getAllDataByPage(page);
})

function checkEmail(){
  var email=$('#emailinput').val();
  $.ajax({
    url: "/baitap3/db/checkEmail.php",
    data: {
      email :email
    },
    type: "post",
    success:function(data){
      $("#check-username").html(data);
    }
  })
}

function checkEmail1(){
  var email=$('#emailupdate').val();
  $.ajax({
    url: "/baitap3/db/checkEmail.php",
    data: {
      email :email
    },
    type: "post",
    success:function(data){
      $("#check-username1").html(data);
    }
  })
}

function addUser(){
  $("#btn_save").on('click',(function(e){

    e.preventDefault();
    var name=$('#nameInput').val();
    var email=$('#emailinput').val();
    var password=$('#passwordinput').val();
    var phone=$('#phoneinput').val();
    var location=$('#locationinput').val();
    var selectRole = $(".message_pri:checked").val();

    var image_file=$('#selectedImage').attr('src');

    if(name != '' && email != '' && password != '' && phone !='' && location != '' && selectRole != ''){
      if(image_file == ''){
        $.ajax({
        url: "/baitap3/db/create.php",
        method: "post",
        data:{
            name: name,
            email: email,
            password: password,
            phone: phone,
            location: location,
            role: selectRole
        },

        success:function(data){
          $('#ModalCenterAdd').modal('hide');
          $('.message-success').append('\
          <div class="alert alert-success alert-dismissible fade show" role="alert">\
            <h4 class="alert-heading">Chúc mừng!</h4>\
            <p>Bạn đã thêm nhân viên thành công</p>\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
          <span aria-hidden="true">&times;</span>\
        </button>\
          </div>\
          ');
          getAllDataByPage(1);
        }
      })
      }else{
        $.ajax({
        url: "/baitap3/db/create.php",
        type: "POST",
        data:{
            file: image_file,
            name: name,
            email: email,
            password: password,
            phone: phone,
            location: location,
            role: selectRole
        },

        success:function(data){
          $('#ModalCenterAdd').modal('hide');
          $('.message-success').append('\
          <div class="alert alert-success alert-dismissible fade show" role="alert">\
            <h4 class="alert-heading">Chúc mừng!</h4>\
            <p>Bạn đã thêm nhân viên thành công</p>\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
          <span aria-hidden="true">&times;</span>\
        </button>\
          </div>\
          ');
          getAllDataByPage(1);
        }
      })
      }
    }else{
      $('.error-message').append('\
      <div class="alert alert-warning alert-dismissible fade show" role="alert">\
        <strong>Bạn chưa điển đẩy đủ thông tin!</strong> \
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
          <span aria-hidden="true">&times;</span>\
        </button>\
      </div>\
      ');
    }

  }));

}

function deleteEmployee(){
  $(document).on('click','#btn_delete',function(){
    var delete_id=$(this).attr('data-id');
    console.log(delete_id);

    $(document).on('click','#delete_record',function()
    {
      $.ajax({
        url: "/baitap3/db/delete.php",
        type: "post",
        data:{
          id: delete_id
        },
        success:function(data){
          $('#exampleModalCenterDelete').modal('hide');
          getAllDataByPage(1);
        }
      })
    })
  })
}

function getEmployee(){
  $(document).on("click",".edit-btn",function(){
    var edit_id=$(this).attr('data-idedit');

  $.ajax({
    type: "post",
    url: "/baitap3/db/get.php",
    data: {
        checking_view:true,
        id: edit_id
    },
    success:function(data){
      $.each(data, function(key, empview){
        $('#id_edit').val(empview['id']);
        $('#nameupdate').val(empview['name']);
        $('#emailupdate').val(empview['email']);
        $('#phoneupdate').val(empview['phone']);
        $('#locationupdate').val(empview['location']);
        console.log(empview.role);
        if (empview.role == 'admin')
          $('#editrole').find(':radio[name=roleupdate][value="admin"]').prop('checked', true);
        else
          $('#editrole').find(':radio[name=roleupdate][value="user"]').prop('checked', true);
            })
          }
  })

  })
}

function updateEmployee(){
  $('.employee_update').click(function(e){
    e.preventDefault();

    var id=$('#id_edit').val();
    var name=$('#nameupdate').val();
    var email=$('#emailupdate').val();
    var password=$('#passwordupdate').val();
    var phone=$('#phoneupdate').val();
    var location=$('#locationupdate').val();
    var selectRole = $(".message_update:checked").val();
    var image_file=$('#selectedImage1').attr('src');

    if(image_file ==''){
      $.ajax({
        url: "/baitap3/db/update.php",
        type: "post",
        data:{
            id: id,
            name: name,
            email: email,
            password: password,
            phone: phone,
            location: location,
            role: selectRole
        },
        success:function(data){
          $('#ModalCenterUpdate').modal('hide');
          $('.message-success').append('\
          <div class="alert alert-success alert-dismissible fade show" role="alert">\
            <h4 class="alert-heading">Chúc mừng!</h4>\
            <p>Bạn đã cập nhật thành công</p>\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
          <span aria-hidden="true">&times;</span>\
        </button>\
          </div>\
          ');
          getAllDataByPage(1);
        }
    })
    }else{
      $.ajax({
        url: "/baitap3/db/update.php",
        type: "post",
        data:{
            file: image_file,
            id: id,
            name: name,
            email: email,
            password: password,
            phone: phone,
            location: location,
            role: selectRole
        },
        success:function(data){
          $('#ModalCenterUpdate').modal('hide');
          $('.message-success').append('\
          <div class="alert alert-success alert-dismissible fade show" role="alert">\
            <h4 class="alert-heading">Chúc mừng!</h4>\
            <p>Bạn đã cập nhật thành công</p>\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
          <span aria-hidden="true">&times;</span>\
        </button>\
          </div>\
          ');
          getAllDataByPage(1);
        }
    })
    }
  })
}

function search(){
  $("#search").keyup(function(){
    var result_search=$("#search").val();
    if(result_search==""){
      getAllDataByPage(1);
    }else{
      $.ajax({
      type:'post',
      url: "/baitap3/db/search.php",
      data:{
        name: result_search,
      },
      success:function(data){
        $("#load_data").html(data);
      }
    })
    }
  })
}

</script>

</body>
</html>