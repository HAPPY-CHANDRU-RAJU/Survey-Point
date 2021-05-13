<?php 
    ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	if( !isset($_SESSION['SP_User_Ext']) ) {
		header("Location: login.php");
		exit;
	}     
	
	$emid = $_SESSION['SP_User_Ext'];
	
	$sql1 = "SELECT * FROM `User_Login` WHERE `User_SP_Id`='$emid'";
	$res1 = $conn->prepare($sql1);
	$res1->execute();
	$SP_User= $res1->fetch();
	
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  	<link rel="stylesheet" href="../indept-assets/style.css"/>
	<link rel="icon" href="../indept-assets/icon.png" >
	<title>Profile pages - Survey Point</title>
<body >
<?php include_once'nav.php'; ?>  
<br/><br/><br/><br/><br/><br/><br/>
	<div class="alert alert-info alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<h3><b> Update your details here <?php echo $SP_User['User_SP_Name']; ?> !!!</b></h3>
	</div>
<hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-2">
				<img src="<?php echo $SP_User['User_SP_Photo'];?>" class="img-thumbnail" height="200px" width="200px;"/>
			</div>
			<div class="col-sm-10">
				<h2 class="text text-danger" align="left">Your Profile</h2>&nbsp;&nbsp;&nbsp;
				<p align="right"><a href="Setting.php"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;EDIT</a></p>
				<hr style="border: 2px dotted black">
				<div class="row">
					<table class="col-sm-12">
<tr><td><strong>NAME</strong></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $SP_User['User_SP_Name'];?></td></tr>
<tr><td><strong>DOB</strong></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $SP_User['User_SP_DOB'];?></td></tr>
<tr><td><strong>E-MAIL ID</strong></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $SP_User['User_SP_Mail'];?></td></tr>
<tr><td><strong>GENDER</strong></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo strtoupper($SP_User['User_SP_Gender']);?></td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once'copyrights.php'; ?>
</body>
</html>
<?php ob_flush(); ?>