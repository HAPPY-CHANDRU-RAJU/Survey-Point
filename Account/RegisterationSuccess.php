<?php
	ob_start();
	session_start();
	if( isset($_SESSION['SP_User_Ext'])!="" ){
		header("Location: index.php");
	}
	include_once 'dbconnect.php';
	require_once 'utilities_ini.php';

if(isset($_GET['status'])&&isset($_GET['stid'])){
	if(($_GET['status']=='success')&&(validate_token($_GET['stid']))){
		$curr =  "success";
			$imds = '<i class="fa fa-check" aria-hidden="true"></i>';
$result ="Hey {$name} &nbsp;!!!,Hurray, registration successfull.<br>Please check your email for confirmation link!";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Successfully Registered Page - Survey Point </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="../indept-assets/style.css"/>
	<link rel="icon" href="../indept-assets/icon.png" >
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body>

<div class="container mt-3">
 <center> <h2 class="text-uppercase text-info">Survey Point</h2>
 <hr>
  <!-- Button to Open the Modal -->
  <a href="index.php"><button type="button" class="btn btn-primary"  >
    LOGIN NOW
  </button></a>
</center>

<?php include_once'copyrights.php'; ?>

  <!-- The Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ACTIVATION PAGE - SIS Student portal</h4>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
          <?php 
          		echo '<h1 align="center" class="text-upper text-'.$curr.'">'.$imds.'</h1>';
 				echo '<p align="center" >'.$result.'</p>';         
          ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

</body>
</html>

