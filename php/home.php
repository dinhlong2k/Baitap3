<?php
  session_start();
  echo $_SESSION['role'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <link rel="stylesheet" href="/baitap3/css/home.css" />
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


  <!--navbar scroll static-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#myPage">Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right" style="letter-spacing: 1px;">
          <li><a href="#about">GIỚI THIỆU</a></li>
          <li><a href="#sales">DOANH THU</a></li>
          <li><a href="#news">TIN TỨC</a></li>
          <li><a href="#topEmployee">NHÂN VIÊN</a></li>
            <?php 
                if(isset($_SESSION['email'])){
                  if($_SESSION['role'] == "admin" || $_SESSION['role'] == "user")
                  echo '<li><a href="employeemanager.php">QUẢN LÝ</a></li>';
                }

            ?>

           <?php 
                if(isset($_SESSION["email"])){
                  
                    echo '<button type="button" class="btn btn-default" style="margin-left: 30px; margin-top: 10px;">
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </button>';
                    
                }else{
                    echo '<button type="button" class="btn btn-default" style="margin-left: 30px; margin-top: 10px;">
                            <a href="login.php">Sign in</a>
                        </button>
                        <button type="button" class="btn btn-default" style="margin-left: 10px; margin-top: 10px;">
                            <a href="register.html">Sign up</a>
                        </button>';
                }

            ?>     
    
        </ul>
      </div>

    </div>
  </nav>

  <!-- section for document and text welcom-->
  <section class="content-banner">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12">
          <div class="banner-con text-center">
            <p class="first-title">
              CHÀO MỪNG BẠN ĐẾN VỚI TIKI
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--About Tiki and image-->
  <div id="about" class="container-fluid text-center bg-grey">
    <h2 >TIKI</h2>
    <img src="../image/tiki.png" style="display:inline" alt="Bird" width="350" height="350">
    <h4>
      <p><strong>Tiki là một hệ sinh thái thương mại tất cả trong một, gồm các công ty thành viên như</strong></p>
    </h4><br>

      <div class="container">
        <div class="row text-center">
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="/image/tiki.png" alt="Paris" width="400" height="300">
              <p><strong>Tiki</strong></p>
              <p>Là đơn vị thiết lập sàn <br>thương mại điện tử Tiki</p><br>
              <button class="btn" data-toggle="modal" data-target="#myModal">
                  <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="/image/tikilogistic.jpg" alt="New York" width="400" height="300">
              <p><strong>Tiki Logistic</strong></p>
              <p>Đơn vị cung cấp dịch vụ <br> Logistic & vận chuyển</p><br>
              <button class="btn" data-toggle="modal" data-target="#myModal">
                <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="/image/tikitrading.PNG" alt="San Francisco" width="400" height="300">
              <p><strong>Tiki Trading</strong></p>
              <p>Là đơn vị bán hàng hóa,<br> dịch vụ trên sàn thương mại điện tử </p><br>
              <button class="btn" data-toggle="modal" data-target="#myModal">
                <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
              </button>
            </div>
          </div>
      </div>
    </div>
  </div>

  <!--about-->
  <div class="container-fluid text-center" style="background-color:  rgb(26, 148, 255);">
    <div class="row text-center">
      <div class="col-md-3">
        <h1 style="color: white;">1M</h1>
        <h4 style="color: white;">Employee</h4>
      </div>
      
      <div class="col-md-3">
        <h1 style="color: white;">$1.000.000 </h1>
        <h4 style="color: white;">Per Year</h4>
      </div>

      <div class="col-md-3">
        <h1 style="color: white;">64+ </h1>
        <h4 style="color: white;">Localities in VietNam </h4>
      </div>

      <div class="col-md-3">
        <h1 style="color: white;">64+ </h1>
        <h4 style="color: white;">Localities in VietNam </h4>
      </div>
    </div>
  </div>


  <!--Chart div-->
  <div id="sales" class="container-fluid text-center">
    <h1 class="margin">SALES IN 2021</h1><br>
    <div class="centerdiv">
      <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>
  </div>


  <!--News of Company-->
  <div id="news" class="container-fluid text-center bg-grey">
    <h1 class="margin">Tin tức</h1><br>
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <img src="/image/building.jpg" alt="Paris" width="400" height="300">
            <p><strong>Tiki</strong></p>
            <p>Là đơn vị thiết lập sàn <br>thương mại điện tử Tiki</p><br>
            <button class="btn" data-toggle="modal" data-target="#myModal">
                <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
            </button>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <img src="/image/seminar.jpg" alt="New York" width="400" height="300">
            <p><strong>Tiki Logistic</strong></p>
            <p>Đơn vị cung cấp dịch vụ <br> Logistic & vận chuyển</p><br>
            <button class="btn" data-toggle="modal" data-target="#myModal">
              <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
            </button>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <img src="/image/contracts.jpg" alt="San Francisco" width="400" height="300">
            <p><strong>Tiki Trading</strong></p>
            <p>Là đơn vị bán hàng hóa,<br> dịch vụ trên sàn thương mại điện tử </p><br>
            <button class="btn" data-toggle="modal" data-target="#myModal">
              <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
            </button>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="thumbnail">
            <img src="/image/business-contracts.jpeg" alt="San Francisco" width="400" height="300">
            <p><strong>Tiki Trading</strong></p>
            <p>Là đơn vị bán hàng hóa,<br> dịch vụ trên sàn thương mại điện tử </p><br>
            <button class="btn" data-toggle="modal" data-target="#myModal">
              <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
            </button>
          </div>
        </div>
      </div>
    </div>

    <br><br>

    <div class="container">
      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <img src="/image/building.jpg" alt="Paris" width="400" height="300">
            <p><strong>Tiki</strong></p>
            <p>Là đơn vị thiết lập sàn <br>thương mại điện tử Tiki</p><br>
            <button class="btn" data-toggle="modal" data-target="#myModal">
                <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
            </button>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <img src="/image/seminar.jpg" alt="New York" width="400" height="300">
            <p><strong>Tiki Logistic</strong></p>
            <p>Đơn vị cung cấp dịch vụ <br> Logistic & vận chuyển</p><br>
            <button class="btn" data-toggle="modal" data-target="#myModal">
              <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
            </button>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <img src="/image/contracts.jpg" alt="San Francisco" width="400" height="300">
            <p><strong>Tiki Trading</strong></p>
            <p>Là đơn vị bán hàng hóa,<br> dịch vụ trên sàn thương mại điện tử </p><br>
            <button class="btn" data-toggle="modal" data-target="#myModal">
              <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
            </button>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="thumbnail">
            <img src="/image/business-contracts.jpeg" alt="San Francisco" width="400" height="300">
            <p><strong>Tiki Trading</strong></p>
            <p>Là đơn vị bán hàng hóa,<br> dịch vụ trên sàn thương mại điện tử </p><br>
            <button class="btn" data-toggle="modal" data-target="#myModal">
              <a href="https://tiki.vn/?src=header_tiki">Xem thêm</a>
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>


  <!--Employee-->

  <div id="topEmployee" class="container-fluid text-center">
    <h1 class="margin">TOP EMPLOYEE PERFORMANCE JULY 2021</h1><br>
    <br>
    

    <div class="row text-center">

      <!--Grid column-->
      <div class="container">
        <div class="row text-center">

          <div class="col-sm-4">

            <div class="thumbnail" style="margin-top: 150px;">
              <img alt="100x100" src="/image/jefff.jpg"
          data-holder-rendered="true" style="border-radius: 50%" width="200" height="200">
              <p><strong>Jeff Bezos #2</strong></p>
              <p>Là đơn vị bán hàng hóa,<br> dịch vụ trên sàn thương mại điện tử </p><br>
            </div>
          </div>

          <div class="col-sm-4">
            
            <div class="thumbnail">
              <img src="/image/elonmush.jpg"
          data-holder-rendered="true" style="border-radius: 50%" width="200" height="200">
              <p><strong>Elon Musk #1</strong></p>
              <p>Đơn vị cung cấp dịch vụ <br> Logistic & vận chuyển</p><br>
            </div>
          </div>

          <div class="col-sm-4">

            <div class="thumbnail" style="margin-top: 150px;">
              <img src="/image/mark.jpg"
          data-holder-rendered="true" style="border-radius: 50%" width="200" height="200">
              <p><strong>Mark Zuckerberg #3</strong></p>
              <p>Là đơn vị thiết lập sàn <br>thương mại điện tử Tiki</p><br>
            </div>
          </div>

      </div>
      <!--Grid column-->
    </div>

    <br><br><br>
  </div>



  <!--footer-->
  <footer class="footer-distributed container-fluid">

    <div class="footer-left">

      <h3>Company<span>logo</span></h3>

      <p class="footer-links">
        <a href="#" class="link-1">Home</a>
        
        <a href="#">Blog</a>
      
        <a href="#">Pricing</a>
      
        <a href="#">About</a>
        
        <a href="#">Faq</a>
        
        <a href="#">Contact</a>
      </p>

      <p class="footer-company-name">Company Name © 2015</p>
    </div>

    <div class="footer-center">

      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>444 S. Cedros Ave</span> Solana Beach, California</p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>+1.555.555.5555</p>
      </div>

      <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:support@company.com">support@company.com</a></p>
      </div>

    </div>

    <div class="footer-right">

      <p class="footer-company-about">
        <span>About the company</span>
        Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
      </p>

      <div class="footer-icons">

        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
        <a href="#"><i class="fab fa-instagram-square fa-2x"></i></a>
        <a href="#"><i class="fab fa-twitter-square fa-2x"></i></i></a>
        <a href="#"><i class="fab fa-github-square fa-2x"></i></a>

      </div>

    </div>

  </footer>

<script src="/css/script.js"></script>
</body>
</html>