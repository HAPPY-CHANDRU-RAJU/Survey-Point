<?php

ob_start();
	session_start();
	include_once 'Account/dbconnect.php';
	require_once 'Account/utilities_ini.php';


?>

<!DOCTYPE >
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="indept-assets/style.css"/>
	<link rel="icon" href="indept-assets/icon.png" >
	<title>Survey Page - Survey King </title>
	
</head>
<body>
<div class="row">
	<div class="container-fluid">
<nav class="navbar navbar-default navbar-fixed-top " style="background: #0d2f79">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: #ffffff;font: Times New Roman"><h4><img src="indept-assets/icon5.png" /><b>&nbsp;&nbsp;&nbsp;SURVEY KING</b></h4></a> 
    </div>
  </div>
</nav>
	</div>
</div>
<br/><br/>
<hr>

<?php

$tiels = $infoq['Survey_Act_Name'];
$tielbios = $infoq['Survey_Act_Bio'];

?>
	<div class="alert alert-danger alert-lg">
		<h3>&nbsp;&nbsp;<span class="glyphicon glyphicon-wrong"></span>&nbsp;&nbsp;PAGE NOT FOUND &nbsp;&nbsp;</h3>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
<center>	
		<button class="btn btn-primary btn-block" onclick="location.href='index.php'">&nbsp;&nbsp;HOME&nbsp;&nbsp;</button>
</center>
		</div>
		<div class="col-sm-3"></div>
	</div>
<?php include_once'Account/copyrights.php'; ?>
</body>
</html>