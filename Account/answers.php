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
	
	if (($_GET['source_um']=="accept")&&($_GET['action']=="view")&&(isset($_GET['Activity_Id']))) {
		$actI = $_GET['Activity_Id'];
			$quer78 = "SELECT * FROM `Survey_Activty` WHERE `Survey_Act_Id`='$actI'";
			$reds = $conn->prepare($quer78);
			$reds->execute();
			$countsf = $reds->rowcount();
			if($countsf){
				$row4 = $reds->fetch();
				$surName = $row4['Survey_Act_Name'];
				$surcatid = $row4['Survey_Act_Cate_Id'];
			
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
			<h3><b>Your <?php echo $surName; ?> Surveys Response !!!</b></h3>
			 
	</div>
	
	  <div class="container-fluid">
		<div class="row">
			<div class="col-sm-1"></div>	
			<div class="col-sm-10" >
				<?php
				
$quer99 = "SELECT * FROM `Survey_FAQ` WHERE `Survey_Cat_Id_FAQ` = '$surcatid' AND `Survey_Cat_FAQ_Status`='ACTIVE' ORDER BY `Survey_FAQ`.`Survey_Cat_FAQ_Id` ASC LIMIT 20";
$redfs = $conn->prepare($quer99);
$redfs->execute();
$count = 1;
while($row22 = $redfs->fetch()){ 
	$SUrId = $row22['Survey_Cat_FAQ_Id'];
	?>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10" style="box-shadow: 10px 10px 25px 2px #000000">
	<h5 class="text text-default"><?php echo $count; $count++; ?>.&nbsp;&nbsp;<b><?php echo $row22['Survey_Cat_FAQ_Title']; ?></b></h5>
					<hr>
					<?php
						if($row22['Survey_Cat_FAQ_Type']=="CH_OP"){
	$qu89 = "SELECT * FROM `Survey_Option` WHERE `Survey_Opt_FAQ_Id` = '$SUrId'";
	$redsfg = $conn->prepare($qu89);
	$redsfg->execute();					
	
	$answrow = $redsfg->fetch();
	
	
	$qu88 = "SELECT * FROM `Survey_Answer` WHERE `Survey_Creater_FAq_Id` = '$SUrId' AND `Survey_Create_ID`='$actI'";
	$redsfg1 = $conn->prepare($qu88);
	$redsfg1->execute();					
	
	$answrowq = $redsfg1->fetch();
	
$opt1 =	$answrowq['Survey_Creater_opt1'];
$opt2 =	$answrowq['Survey_Creater_opt2'];
$opt3 =	$answrowq['Survey_Creater_opt3'];
$opt4 =	$answrowq['Survey_Creater_opt4'];

$total = $opt1+$opt2+$opt3+$opt4;

$per1 = ($opt1/$total)*100;
$per2 = ($opt2/$total)*100;
$per3 = ($opt3/$total)*100;
$per4 = ($opt4/$total)*100;

$pr1 = 'style="width: '.$per1.'%"';
$pr2 = 'style="width: '.$per2.'%"';
$pr3 = 'style="width: '.$per3.'%"';
$pr4 = 'style="width: '.$per4.'%"';
							?>
							
						<div class="row">
							<div class="col-sm-1">OPTION:</div>
							<div class="col-sm-4"><b><?php echo $answrow['Survey_Opt_Title1']; ?></b></div>
							<div class="col-sm-7">
								<div class="progress">
									<div class="progress-bar  progress-bar-primary progress-bar-striped active " role="progressbar"  arial-valuemin="0" aria-valuemax="100" <?php echo $pr1;?>  >
									
									</div>
								</div>
							</div>
						</div>
								
						<div class="row">
							<div class="col-sm-1">OPTION:</div>
							<div class="col-sm-4"><b><?php echo $answrow['Survey_Opt_Title2']; ?></b></div>
							<div class="col-sm-7">
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" arial-valuemin="0" aria-valuemax="100"  <?php echo $pr2;?>  >
									</div>
								</div>
							</div>
						</div>
								
						<div class="row">
							<div class="col-sm-1">OPTION:</div>
							<div class="col-sm-4"><b><?php echo $answrow['Survey_Opt_Title3']; ?></b></div>
							<div class="col-sm-7">
								<div class="progress">
									<div class="progress-bar  progress-bar-striped progress-bar-warning active" role="progressbar" arial-valuemin="0" aria-valuemax="100"  <?php echo $pr3;?> >
									
									</div>
								</div>
							</div>
						</div>
								
						<div class="row">
							<div class="col-sm-1">OPTION:</div>
							<div class="col-sm-4"><b><?php echo $answrow['Survey_Opt_Title4']; ?></b></div>
							<div class="col-sm-7">
								<div class="progress">
									<div class="progress-bar active progress-bar-striped progress-bar-success " role="progressbar" arial-valuemin="1" aria-valuemax="100"  <?php echo $pr4;?> >
									
									</div>
								</div>
							</div>
						</div>
						
				<?php
						}else if($row22['Survey_Cat_FAQ_Type']=="TXT"){
	$qu78 = "SELECT * FROM `Survey_Answer_txt` WHERE `Survey_Create_ID`='$actI' AND `Survey_Creater_FAq_Id`='$SUrId'";
	$redsfg2 = $conn->prepare($qu78);
	$redsfg2->execute();					
	$can= 1;
	while($answrowaq = $redsfg2->fetch()){
	
		?>
	<div class="row">
		<div class="col-sm-2 text-danger"> <b>Answer <?php echo $can; ?></b></div>
		<div class="col-sm-8">
			<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $answrowaq['Survey_Creater_answer']; ?></p>
		</div>
		<div class="col-sm-1"></div>
	</div>	
		<?php
	}
						}
					 ?>
					
				</div>
				<div class="col-sm-1"></div>
			</div><br/>
	
	<?php
}
			?>
			
			</div>	
			<div class="col-sm-1"></div>	
		</div>
	</div>
<?php

}else{
				header("Location: ../NotFound.php");
				exit();
			}	 
	}else{
		header("Location: ../NotFound.php");
		exit();
	}
?>
	
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