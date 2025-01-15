<?php 
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Landing Page</title>
	<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@50;100;200;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
           
            .carousel-item {
	height: 100vh;
	min-height: 280px;
}
.carousel-caption {
	bottom: 220px;
        display: inline;
}
.carousel-caption h5 {
	font-size: 45px;
	text-transform: uppercase;
	letter-spacing: 2px;
	margin-top: 25px;
	font-family: merienda;
}
.carousel-caption p {
	width: 60%;
	margin: auto;
	font-size: 18px;
	line-height: 1.9;
	font-family: poppins;
        
}
.carousel-caption a {
	text-transform: uppercase;
	background: #262626;
	padding: 10px 30px;
	display: inline-block;
	color: black;
        background-color: #1D7732;
	margin-top: 15px;
        border-radius: 10px;
}
.navbar-nav {
	font-family: poppins;
	font-size: 18px;
	
	font-weight: bold;
        color: white;
}
.navbar-light .navbar-brand {
	color: white;
	font-size: 25px;
	
	font-weight: bold;
	letter-spacing: 2px;
}
.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
	color: #fff;
}
.navbar-light .navbar-nav .nav-link {
	color: white;
}
.navbar-nav {
	text-align: center;
}
.nav-link {
	padding: .2rem 1rem;
}
.nav-link.active, .nav-link:focus {
	color: #fff;
}
.navbar-toggler {
	padding: 1px 5px;
	font-size: 18px;
	line-height: 0.3;
	background: #fff;
}
.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
	color: white;
}
.w-100 {
	height: 100vh;
}
@media only screen and (max-width: 767px) {
	.navbar-nav.ml-auto {
		background: rgba(0, 0, 0, 0.5);
	}
	.navbar-nav a {
		
		font-weight: normal;
	}
}
.container{
    background-color: #A92E3E;
    border-radius: 15px;
}
.carousel-caption.land_view{
    background-color: white;
    width: 180px;
    height: 130px;
    position: absolute;
    top: 60%;
    border-radius: 10px;
    right: 250px;
    opacity: 50%;
    
}
.carousel-caption.land_view p{
    color: black;
    
}
#logoimg{
    width: 40px;
    height: 40px;
    margin-right: 15px;
    color: #A92E3E; 
}
#logoimg2{
    width: 80px;
    height: 80px;
    margin-right: 15px;
    color: #A92E3E; 
    margin-bottom: 15px;
}

.navbar-nav a{
    color: white;
 }
 .navbar-nav a:hover{
     color: black;
 }
 #footer{
     background-color:#A92E3E ;
     color: white;
 }
 #footer .h4{
     color: white;
     position: absolute;
     top: 0px;
     left: 102px;
     margin-bottom: 10px;
 }
 #footer .p{
     color: white;
      
     
 }
 
 
 .carousel-inner{
     height: 580px;
 }
 ul{
     
    list-style: none;
   margin-bottom: 40px;
   margin-top: 20px;
   color: white;   
 }
 .address{
       color: white;
       margin-top: 20px;
 }
 .address a{
       color: white;
  
 }
 .address2{
       color: white;
       margin-top: 20px;
       
 }
 .address2 a{
       color: white;
       position: absolute;
       left: 56px;
  
 }
 .media-icon{
        width: 120px;
	height: 120px;
	border-radius: 50%;
	
        background-color: white;
        margin-right: 5px;
 }
 #facebook{
     margin-left: 5px;
     color: #5E65C7;
 }
 #twitter{
     margin-left: 5px;
     color: #59B2D8;
 }
 a{
     color: white;
 }
</style>
</head>
<body>
    <!-- nav bar -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top">
		<div class="container">
                    <img src="../img/cucglogo.jpeg" alt="cucg logo"  id="logoimg"/>
                    <label class="navbar-brand">HR</label>
				<ul class="navbar-nav ml-auto">
                                    <label> You are not logged in<a href="login.php">(log_in)</a></label>	
				</ul>
		</div>
	</nav>
    
    <!--Sliders -->
	<div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
		<ol class="carousel-indicators">
			<li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
			<li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
			<li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
                            <img alt="First slide" class="d-block w-100" src="../img/cucg2.jpg">
				<div class="carousel-caption d-none d-md-block">                                 
					<h5 class="animated bounceInRight" style="animation-delay: 1s">Welcome</h5>
					<p class="animated bounceInRight" style="animation-delay: 1.5s"><a href="login.php">Login</a></p>
				</div>
                                <div class="carousel-caption land_view ml-auto">
                                    <p>This is the view of cucg hostel</p>
                                </div>
			</div>
			<div class="carousel-item">
                            <img alt="Second slide" class="d-block w-100" src="../img/cucg1.jpg">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="animated slideInDown" style="animation-delay: 1s">Welcome</h5> 
					<p class="animated zoomIn" style="animation-delay: 1.5s"><a href="login.php">Login</a></p>
				</div>
                                <div class="carousel-caption land_view ml-auto">
                                    <p>This is the view of cucg hostel</p>
                                </div>
			</div>
			<div class="carousel-item">
                            <img alt="Third slide" class="d-block w-100" src="../img/cucg3.jpg">
				<div class="carousel-caption d-none d-md-block">
				 <h5 class="animated zoomIn" style="animation-delay: 1s;">Welcome</h5> 
                                        <p class="animated zoomIn" style="animation-delay: 1.5s"><a href="login.php">Login</a></p>
				</div>
                                 <div class="carousel-caption land_view ml-auto">
                                    <p>This is the view of cucg hostel</p>
                                </div>
			</div>
		</div><a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
	</div>
   <!-- footer--> 
   <footer class="footer shadow align-self-end py-3 px-xl-5 w-100 h-50" id="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 text-primary">
                <img src="../img/cucglogo.jpeg" alt="cucg logo"  id="logoimg2"/>
                <h4 class="h4">Catholic University College of Ghana</h4>
                <p class="p">We are tagged with providing Tertiary Education Services at a whole new different level. 
                    That is why we at Catholic University College are Uniquely Unique !!.</p>
              </div>
                <div class="col-md-3 text-gray-400">
                  <h4>Quick Links</h4>
                  <ul class="list">
                      <li class="address"><a href="https://www.cug.edu.gh">Cucg Website</a></li>
                      <li class="address"><a href="https://www.cug.edu.gh/studentportal">Student Portal</a></li>
                  </ul>                         
              </div>
              <div class="col-md-3 text-gray-400">
                  <h4>Social Media Handles</h4>
                  <ul class="list">
                      <li class="address"><a href="https://www.facebook.com/yourfacebookid" target="_blank">
                                    <span class="media-icon">
                                        <i class="fa fa-facebook-f" id="facebook"></i>
                                    </span>
                                    <span class="media-name">Facebook</span>
                                </a></li>
                      <li class="address2"><a href="https://twitter.com/yourtwittername" target="_blank">
                                    <span class="media-icon">
                                        <i class="fa fa-twitter" id="twitter"></i>
                                    </span>
                                    <span class="media-name">Twitter</span>
                                </a></li>
                  </ul>               
              </div>
                 <div class="col-md-3 text-gray-400">
                  <h4>Contact us</h4>
                  <p>University Ave, Post Office Box 363, Fiapre-Sunyani</p><br>
                  <p>
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  Phone: 035209458/94650/96218/ 0352196760 0501260727</p>
                  <p> 
                      <i class="fa fa-envelope-o" aria-hidden="true"></i>               
                      <a href="mailto:cugadmin@cug.edu.gh">E-mail: cugadmin@cug.edu.gh</a></p>              
              </div>
            </div>
          </div>
        </footer>
<!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="js/osmanli_calendar.js" type="text/javascript"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
	</script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
	</script>

    
  </body> 
</html>