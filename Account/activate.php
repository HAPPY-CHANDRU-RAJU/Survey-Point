<?php
	ob_start();
	session_start();
	if( isset($_SESSION['SP_User_Ext'])!="" ){
		header("Location: index.php");
	}
	include_once 'dbconnect.php';
	require_once 'utilities_ini.php';

if(isset($_GET['id'])&&isset($_GET['emailid'])&&isset($_GET['sid'])){
		$encoded_id = $_GET['id'];
		$encoded_emailid = $_GET['emailid'];
		$decode_id = base64_decode($encoded_id);
		$user_id_array = explode("encodeUserid", $decode_id);
		$id = $user_id_array[1];
		
		$sql = "UPDATE `User_Login` SET `User_SP_Status` = 'ACTIVE' WHERE `User_Login`.`User_SP_Id` = '$id' AND `User_SP_Status`= 'INACTIVE' ;";
		$res4 = $conn->prepare($sql);
		$res4->execute();
		
		if($res4->rowCount()==1){
			$curr =  "success";
			$imds = '<i class="fa fa-check" aria-hidden="true"></i>';
			$result = "Successfully verified !!! Now You Can Log-In";
		}else{
			$curr =  "success";
			$imds = '<i class="fa fa-check" aria-hidden="true"></i>';
			$result = "Already Verified !!!";
		}
}else{
	$curr =  "danger";
	$imds = '<i class="fa fa-close" aria-hidden="true"></i>';
	$result = "Something Wents Wrong !!! Try Again Later";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Activation Page - Survey Point </title>
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
          <h4 class="modal-title">ACTIVATION PAGE - Survey King</h4>
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

