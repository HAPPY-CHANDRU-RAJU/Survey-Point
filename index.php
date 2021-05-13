<?php
	ob_start();
	session_start();
?>
<!DOCTYPE >
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="indept-assets/style.css"/>
	<link rel="icon" href="indept-assets/icon.png" >
	<title>Welcome to Survey King </title>
</head>
<body>
<div class="row">
	<div class="container">
<nav class="navbar navbar-default navbar-fixed-top " style="background: #0d2f79">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" style="color: #ffffff;font: Times New Roman"><h4><img src="indept-assets/icon5.png" /><b>&nbsp;&nbsp;&nbsp;SURVEY KING</b></h4></a> 
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" >
      <ul class="nav navbar-nav navbar-right" >
<li><a href="Account/login.php" style="color: #fff"><button class="btn btn-lg btn-inverse" style="background: #0d2f79" ><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp; Login</button></a></li>
      <li><a href="Account/register.php" style="color: #fff"><button class="btn btn-lg btn-inverse" style="border: 2px solid black;background: #0d2f79" ><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp; Sign Up</button></a></li>
      </ul>
    </div>
  </div>
</nav>
	</div>
</div>
<br/><br/><br/>
<hr>
<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
    		<div class="item active">
      			<img src="indept-assets/bg.resized.jpg" align="middle" alt="">
    		  <div class="carousel-caption" align="center">
       			 <h1 class=""><b>We are ready to give answers !!!</b></h1>
       			 <p style="color: #3d3d3d">Get the feedback you need with a global leader in survey software</p>
       			 <br>
       			 <br>
       			 <button  class="btn btn-lg btn-success" onclick="location.href='Account/index.php'">GET STARTED</button>
       			 <br>
       			 <br>
       			 <br>
     		  </div>
    		</div>
    	</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-6" style="background-color: #0d2f79;color: #ffffff">
		<center>
			<i class="glyphicon glyphicon-user" style="font-size: 45px;margin: 15px;"></i>
			<h3>For you</h3>
			<p align="center" style="width: 400px;line-height: 25px">Get a platform that can grow and change along with your survey needs over time. Browse our plans to learn more about specific features.</p>
		</center>
	</div>
	<div class="col-sm-6" style="background-color: #1a7909;color: #ffffff">
		<center>
			<i class="glyphicon glyphicon-briefcase " style="font-size: 45px;margin: 15px;"></i>
			<h3>For your organization</h3>
			<p align="center" style="width: 400px;line-height: 25px">Manage your company’s data with advanced security and control, so you can enable your teams to share and collaborate safely.</p>
		</center>
	</div>
</div>
<?php include_once'Account/copyrights.php'; ?>
</body>
</html>
<?php ob_end_flush(); ?>