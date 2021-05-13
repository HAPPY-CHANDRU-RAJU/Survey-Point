<?php 
    ob_start();
	session_start();
	require_once 'dbconnect.php';
	require_once 'utilities_ini.php';
	
	if( !isset($_SESSION['SP_User_Ext']) ) {
		header("Location: login.php");
		exit;
	}     
	
	$emid = $_SESSION['SP_User_Ext'];
	
	$sql1 = "SELECT * FROM `User_Login` WHERE `User_SP_Id`='$emid'";
	$res1 = $conn->prepare($sql1);
	$res1->execute();
	$SP_User= $res1->fetch();
	
	if ( ($_GET['source_um']=="accept")&&($_GET['action']=="delete")&&(isset($_GET['Activity_Id']))) {
			$Actvid = $_GET['Activity_Id'];
			$query34 = "SELECT * FROM `Survey_Activty` WHERE `Survey_Act_Id`='$Actvid'";
			$reds = $conn->prepare($query34);
			$reds->execute();
			$countsf = $reds->rowcount();
			if($countsf){
				
$redsqu = "UPDATE `Survey_Activty` SET `Survey_Act_Status` = 'INACTIVE' WHERE `Survey_Act_Id` = '$Actvid'";
$redsfs = $conn->prepare($redsqu);
$redsfs->execute();

								$errTyp = "success";
								$errMSG = "DEACTIVATED SURVEY SUCCESSFULLY !!!";
				
			}else{
								$errTyp = "danger";
								$errMSG = " UNSUCCESSFULLY !!!";
			}
			 
	}

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
	<title>Visit Survey - Survey Point</title>
	<script>
		function myCopy(){
			var copyText = document.getElementById("idfield");
			copyText.select();
			copyText.setSelectionRange(0, 99999)
			document.execCommand("copy");
			alert("Link Copied !!!");
		}
	</script>
</head>
<body >
<?php include_once'nav.php'; ?>  <br/><br/><br/><br/><br/><br/>
	<div class="alert alert-info alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<h3><b>Your Current Surveys  !!! :) :)</b></h3>
	</div>
	
	 
            <DIV class="row">
            	<div class="col-sm-1"></div>
            	<div class="col-sm-10">
            		
            		<?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            		
            	</div>
            	<div class="col-sm-1"></div>
            </DIV>
	
	  <div class="container-fluid">
		<div class="row">
			<div class="col-sm-1"></div>	
			<div class="col-sm-10" style="overflow: scroll;height: 500px;">
				<table class="table table-responsive">
					<tr class="alert alert-danger">
						<th>Survey title </th>	
						<th>Bio</th>	
						<th>Category</th>		
						<th>No.of.question</th>			
						<th>Created on</th>			
						<th>Survey Link </th>		
						<th>View Responses </th>		
						<th>Action</th>		
					</tr>
					
					<?php
					
					$qs1 = "SELECT * FROM `Survey_Activty` WHERE `Survey_Act_Author_Id`='$emid' AND `Survey_Act_Status`='ACTIVE' ORDER BY `Survey_Act_Cate_name`  AND `Survey_Act_DOC` ASC ";
					$rs23 = $conn->prepare($qs1);
					$rs23->execute();
					while($row2 = $rs23->fetch()){
				
					
						echo '<tr>
						<td>'.trim($row2["Survey_Act_Name"]).'</td>
						<td>'.trim($row2["Survey_Act_Bio"]).'</td>
						<td>'.$row2["Survey_Act_Cate_name"].'</td>
						<td>'.$row2["Survey_Act_Credit"].'</td>
						<td>'.date('M j Y',strtotime($row2["Survey_Act_DOC"])).'</td>'; 

						?>
						<td>
						<input type="text" id="idfield" value="http://localhost/Survey%20Points/Survey.php?Survey_taken=<?php echo $row2["Survey_Act_Id"]; ?>&Survey_Category=<?php echo $row2["Survey_Act_Cate_Id"]; ?>"  /><br/>
						<button class="btn btn-sm btn-info" onclick="myCopy()">&nbsp;<span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;&nbsp;COPY</button>
						</td>
						<td><button class="btn btn-sm btn-primary" onclick="location.href='answers.php?source_um=accept&action=view&Activity_Id=<?php echo $row2["Survey_Act_Id"]; ?>'">
									VIEW
						</button></td>
						<td><button class="btn btn-sm btn-danger" onclick="location.href='?source_um=accept&action=delete&Activity_Id=<?php echo $row2["Survey_Act_Id"]; ?>'">INACTIVE</button></td>
					<?php
					echo '</tr>';
}
		?>
					<tr class="alert alert-info">
						<th colspan="8" align="center"> <center>NO MORE</center> </th>		
					</tr>
				</table>
			</div>	
			<div class="col-sm-1"></div>	
		</div>
	</div>
	    
	
<?php include_once'copyrights.php'; ?>
	<script>
		function myCopy(){
			var copyText = document.getElementById("idfield");
			copyText.select();
			copyText.setSelectionRange(0,99999)
			document.execCommand("copy");
			alert("Link Copied !!!");
		}
	</script>
</body>
</html>
<?php ob_flush(); ?>