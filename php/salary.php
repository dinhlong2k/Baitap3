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
                              echo '<a href="" class="btn btn-secondary"><i class="far fa-money-bill-alt" style="color: green"></i> <span>Salary</span></a>';
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
        <form action="" id="edit-form" method="post">
        <input  type="hidden" id="id_edit">

          <div class="form-group">
            <label for="salarynormal">Lương cơ bản</label>
            <input type="text" class="form-control " id="salarynormal"  aria-describedby="emailHelp" placeholder="Nhập lương cơ bản">
          </div>
          <div class="form-group">
            <label for="hour">Số giờ làm</label>
            <input type="number" class="form-control" id="hourwork" aria-describedby="emailHelp" placeholder="Nhập số giờ làm" value="0">
          </div>
          <div class="form-group">
            <label for="bonus">% Thưởng thêm</label>
            <input type="number" class="form-control" id="bonus" placeholder="Nhập lương thưởng thêm">
          </div>
          <div class="form-group">
            <label for="totalsalary">Lương tổng</label>
            <input type="text" class="form-control" id="totalsalary" readonly value="0.00">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary salary_update" >Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>




<script>
  $(document).ready(function(){
    getSalary();
    updateEmployee();
    search();
    getAllDataByPage();
    caculateSalary();
});


function getAllDataByPage(page){
  $.ajax({
    url: "/baitap3/salary/salary.php",
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

function getSalary(){
  $(document).on("click",".edit-btn",function(){
    var edit_id=$(this).attr('data-idedit');

  $.ajax({
    type: "post",
    url: "/baitap3/salary/getsalary.php",
    data: {
        checking_view:true,
        id: edit_id
    },
    success:function(data){
      $.each(data, function(key, salview){
        $('#id_edit').val(salview['id']);
        $('#salarynormal').val(salview['luongcoban']);
        $('#bonus').val(salview['bonus']);
        })
    }
  })

  })
}

function updateEmployee(){
  $('.salary_update').click(function(e){
    e.preventDefault();

    var id=$('#id_edit').val();
    var salarynormal=$('#salarynormal').val();
    var hour=$('#hourwork').val();
    var bonus=$('#bonus').val();
    var totalsalary=$('#totalsalary').val();

    if(salarynormal != '' && hour != '' && bonus != ''){
        $.ajax({
        url: "/baitap3/salary/updatesalary.php",
        type: "post",
        data:{
            id: id,
            salarynormal: salarynormal,
            hour: hour,
            bonus: bonus,
            totalsalary: totalsalary,
        },
        success:function(data){
            console.log(data);
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
    });
  };

function caculateSalary(){
    $("#salarynormal").keyup(function(){
        calSalary();
    })

    $("#hourwork").keyup(function(){
        calSalary();
    })

    $("#bonus").keyup(function(){
        calSalary();
    })

    function calSalary(){
        if($("#salarynormal").val() ==""){
            return false;
        }else if($("#hourwork").val() == ""){
            return false;
        }else if($("#bonus").val() == ""){
            return false;
        }else{
            var totalSalary=0;
            totalSalary=(Number($("#salarynormal").val()) * Number($("#hourwork").val()) );
            bonussalary=totalSalary *  (Number($("#bonus").val())/100)  ;
            totalSalary =totalSalary +bonussalary;

            $("#totalsalary").val(totalSalary.toFixed(2));
        }
    }
}

function search(){
  $("#search").keyup(function(){
    var result_search=$("#search").val();
    if(result_search==""){
      getAllDataByPage(1);
    }else{
      $.ajax({
      type:'post',
      url: "/baitap3/salary/searchsalary.php",
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