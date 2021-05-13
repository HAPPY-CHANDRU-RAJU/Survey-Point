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
	<title>Contact Us - Survey Point</title>
</head>
<body >


<div class="container-fluid" >
  <div class="row">
  <div class="col-sm-2" >
  <br/><br/><br/><br/><br/>
  </div>
</div>
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
<div class="row">
	<div class="col-sm-12">
		<img src="indept-assets/contact.jpg"/><br>
		<p align="justify" style="margin: 10px;"><br/><br/>
			This is a project done by the students of Ramaiah Institute of technology Formely M S Ramaiah Institute of technologys ( Computer Science and Information Science Branch ) . If there is any problems and Errors regarding in this website. Sorry for the inconviences.<br/><br/>

The materialization of ideas and views of this project has been the valuable contribution from a large number of individuals in the form of constructive critism, well wishes and above all, words of inspiration. And your best friend inspired us and supported us to do this Website.<br/><br/>
<hr>
<h2 class="text-uppercase text-info">&nbsp;&nbsp;<b>DEVELOPment team</b></h2>
<hr>
<h4 class="text-uppercase text-default" style="margin: 10px;">CHANDRU V (&nbsp;&nbsp;)<br/>
Pooja (&nbsp;&nbsp;)<br/>
Saniya (&nbsp;&nbsp;)<br/>
Sneha Kulkarni (&nbsp;&nbsp;)</h4>
		</p>
	</div>
</div>
<?php include_once'Account/copyrights.php'; ?>
</body>
</html>
<?php ob_flush(); ?>