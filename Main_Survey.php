<?php
		ob_start();
	session_start();
	include_once 'Account/dbconnect.php';
	require_once 'Account/utilities_ini.php';
	
	if(($_GET['Activity_id']!="")&&($_GET['Category_Id']!="")){
		$_SESSION['Activity_id'] =	$_GET['Activity_id'];
		$_SESSION['Category_Id'] =	$_GET['Category_Id']; 
	}
	
	if($_GET['Activity_id']){
		$_SESSION['Activity_id']=$_GET['Activity_id'];
	}
	
	if($_GET['Category_Id']){
		$_SESSION['Category_Id']=$_GET['Category_Id'];
	}
	
	 if(($_SESSION['Activity_id']=="")&&($_SESSION['Category_Id']=="")){
		header("Location: NotFound.php");
		exit();				
	}
	
	$qps = $_GET['qp'];
	$qpd = $_SESSION['qps'];
	
	$acti = $_SESSION['Activity_id'];
	$cate = $_SESSION['Category_Id'];
	
	$redf = "SELECT * FROM `Survey_Activty` WHERE `Survey_Act_Cate_Id`='$cate' AND `Survey_Act_Id`='$acti'";
	$resqs = $conn->prepare($redf);
	$counts = $resqs->rowcount();
			if($counts){
				unset($_SESSION['Activity_id']);
				unset($_SESSION['Category_Id']);
				unset($_SESSION['Session_id']);
				unset($_SESSION['quiz']);
				header(("Location: NotFound.php"));
				exit();
			}
			
		
		if($qps==21){
			unset($_SESSION['qps']);
			unset($_SESSION['Category_Id']);
			unset($_SESSION['Activity_id']);
			unset($_SESSION['quiz']);
			header("Location: Success.php?Category_Id=$cate&Activity_id=$acti");
			exit();
		}else if($qps>21){
			header("Location: NotFound.php");
			exit();
		}
	
$error = false;

	if ( isset($_POST['btn-submittxt'], $_POST['token']) ) {
		
		if ( validate_token($_POST['token']) ) {
			
		$names = trim($_POST['inputxt']);
		$names = strip_tags($names);
		$names = htmlspecialchars($names);
		
		$qpid = $_POST['qpid'];
		
		if(empty($names) || (strlen($names)< 12) ){
			$error = TRUE;
			$namesError = "Please Enter your Answer";
		}
		
		if(!$error){
				$rdetsid = md5(sha1(md5($names.time())));
			$qr = "INSERT INTO `Survey_Answer_txt` (`Survey_Answer_Id`, `Survey_Create_ID`, `Survey_Creater_FAq_Id`, `Survey_Creater_answer`) VALUES ('$rdetsid', '$acti', '$qpid', '$names')";
			$qres = $conn->prepare($qr);
			$qres->execute();
			
			$QpNom = $_POST['noms'];
			$QpNom++;
			header("Location: ?qp=$QpNom");
			exit();
			
		}
			
		}
	}else if ( isset($_POST['btn-submitpq'], $_POST['token']) ) {
		
		if ( validate_token($_POST['token'])&& isset($_POST['option_no']) ) {
		
		 $option = $_POST['option_no'];
		 $qpid = $_POST['qpid'];
		
		if(empty($option)){
			$error = TRUE;
			$optionError = "Please Select Your Answer";
		}
		
		if(!$error){
			
			$qr = "SELECT * FROM `Survey_Answer` WHERE `Survey_Creater_FAq_Id`='$qpid'";
			$qres = $conn->prepare($qr);
			$qres->execute();
			
			$nomr = $qres->rowCount();
			
			if($nomr==0){
			$anId = sha1(md5($qpid));
				$inqu = "INSERT INTO `Survey_Answer`(`Survey_Answer_Id`, `Survey_Create_ID`, `Survey_Creater_FAq_Id`, `Survey_Creater_opt1`, `Survey_Creater_opt2`, `Survey_Creater_opt3`, `Survey_Creater_opt4`) VALUES ('$anId', '$acti', '$qpid',0,0,0,0)";
				$qresd = $conn->prepare($inqu);
				$qresd->execute();
			
			$opt1 = 0;
			$opt2 = 0;
			$opt3 = 0;
			$opt4 = 0;
		
		}else{ 
		
		$inqu="SELECT * FROM `Survey_Answer` WHERE `Survey_Create_ID`='$acti' AND `Survey_Creater_FAq_Id`='$qpid'";
		$qresd= $conn->prepare($inqu);
		$qresd->execute();
		$ansd = $qresd->fetch();
		$anId = $ansd['Survey_Answer_Id'];
		$opt1 = $ansd['Survey_Creater_opt1'];
		$opt2 = $ansd['Survey_Creater_opt2'];
		$opt3 = $ansd['Survey_Creater_opt3'];
		$opt4 = $ansd['Survey_Creater_opt4'];
			}
			
			switch($option){
				case "option1":	
						$opt1 = $opt1+1;
						$queropt = "UPDATE `Survey_Answer` SET `Survey_Creater_opt1` = '$opt1' WHERE `Survey_Answer`.`Survey_Answer_Id` = '$anId'";
						$resdq = $conn->prepare($queropt);
						$resdq->execute();
						
						break;
						
						
				case "option2":
						$opt2 = $opt2+1;
						$queropt = "UPDATE `Survey_Answer` SET `Survey_Creater_opt2` = '$opt2' WHERE `Survey_Answer`.`Survey_Answer_Id` = '$anId'";
						$resdq = $conn->prepare($queropt);
						$resdq->execute();
						break;
						
				case "option3":
				
						$opt3 = $opt3+1;
						$queropt = "UPDATE `Survey_Answer` SET `Survey_Creater_opt3` = '$opt3' WHERE `Survey_Answer`.`Survey_Answer_Id` = '$anId'";
						$resdq = $conn->prepare($queropt);
						$resdq->execute();
						break;
						
						
				case "option4":
						$opt4 = $opt4+1;
						$queropt = "UPDATE `Survey_Answer` SET `Survey_Creater_opt4` = '$opt4' WHERE `Survey_Answer`.`Survey_Answer_Id` = '$anId'";
						$resdq = $conn->prepare($queropt);
						$resdq->execute();
						break;
			}
			$QpNom = $_POST['noms'];
			$QpNom++;
			header("Location: ?qp=$QpNom");
			exit();
			
		}
		
		}
}
	
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
<body bgcolor="#e1e1e1" style="background: #e1e1e1;color: black;" >
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
<br/><br/><hr/>

<?php

   $qoe	= "SELECT * FROM `Survey_Activty` WHERE `Survey_Act_Id`='$acti' AND `Survey_Act_Cate_Id`='$cate'";
   $resd123 = $conn->prepare($qoe);
   $resd123->execute();
   $infoq = $resd123->fetch();

$tiels = $infoq['Survey_Act_Name'];
$tielbios = $infoq['Survey_Act_Bio'];
?>
	<div class="alert alert-info alert-lg"><b><h3>&nbsp;&nbsp;<?php echo $infoq['Survey_Act_Name']; ?></h3></b><hr><p align="left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $infoq['Survey_Act_Bio']; ?></p></div>
	
<hr>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
<?php

$qu34 = "SELECT * FROM `Survey_FAQ` WHERE `Survey_Cat_Id_FAQ`='$cate' AND `Survey_Cat_FAQ_Status` = 'ACTIVE' ORDER BY `Survey_FAQ`.`Survey_Cat_FAQ_Id` ASC";

$res145 = $conn->prepare($qu34);
$res145->execute();
$count = 1;
while($resd = $res145->fetch()){
	if($count!=$qps){
		$count++;
		continue;
	}else{
		?>
		
		<h4 align="left"><b>&nbsp;&nbsp;&nbsp;<?php echo $resd['Survey_Cat_FAQ_Title']; ?></b></h4>
				<hr/>
	 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <?php  
    
     $currentQp = $resd['Survey_Cat_FAQ_Type'];
     $currentId = $resd['Survey_Cat_FAQ_Id'];
    
    if($currentQp=="CH_OP"){
     $quw = "SELECT * FROM `Survey_Option` WHERE `Survey_Opt_FAQ_Id`= '$currentId'";
     $resdw = $conn->prepare($quw);
     $resdw->execute();
     $opt = $resdw->fetch();
     ?>
				<div class="row">
	<div class="col-sm-6">&nbsp;&nbsp;<input type="checkbox" name="option_no" value="option1" >&nbsp;&nbsp;<b><?php echo $opt['Survey_Opt_Title1']; ?></b></input></div>
	<div class="col-sm-6">&nbsp;&nbsp;<input type="checkbox" name="option_no" value="option2" >&nbsp;&nbsp;<b><?php echo $opt['Survey_Opt_Title2']; ?></b></input></div>
	<div class="col-sm-6">&nbsp;&nbsp;<input type="checkbox" name="option_no" value="option3" >&nbsp;&nbsp;<b><?php echo $opt['Survey_Opt_Title3']; ?></b></input></div>
	<div class="col-sm-6">&nbsp;&nbsp;<input type="checkbox" name="option_no" value="option4" >&nbsp;&nbsp;<b><?php echo $opt['Survey_Opt_Title4']; ?></b></input></div>
				</div>
				<span class="text-danger"><?php echo $optionError; ?></span>
				<input type="hidden" name="qpid" value="<?php echo $currentId ;?>">
				<input type="hidden" name="noms" value="<?php echo $_GET['qp'] ;?>">
				<input type="hidden" name="token" value="<?php echo _token() ?>">
				<div class="form-group">
				<br/>
            	<button type="submit" class="btn btn-block btn-primary" name="btn-submitpq">&nbsp;&nbsp;<SPAN class="glyphicon glyphicon-lock"></SPAN>&nbsp;&nbsp;SUBMIT</button>
            	</div>
          	
            	
		
<?PHP
		}else if($currentQp=="TXT"){  ?>
			<div class="row">
				<div class="col-sm-8">
	<textarea class="form-control " style="width: 550px" type="text" name="inputxt" minlength="12" maxlength="150" placeholder="Start from here ......" required></textarea>
				</div>
				<span class="text-danger"><?php echo $namesError; ?></span>
				<div class="col-sm-4"></div>
			</div>
			<input type="hidden" name="qpid" value="<?php echo $currentId ;?>">
				<input type="hidden" name="noms" value="<?php echo $_GET['qp'] ;?>">
				<input type="hidden" name="token" value="<?php echo _token() ?>">
			<div class="form-group">
			<br/>
            	<button type="submit" class="btn btn-block btn-primary" name="btn-submittxt">&nbsp;&nbsp;<SPAN class="glyphicon glyphicon-lock"></SPAN>&nbsp;&nbsp;SUBMIT</button>
            	</div>
			</form>  
	<?php	}
	$count++;
	}
}

?>
			
			</div>
			<div class="col-sm-2"></div>
		</div>
		
	</div>
	<div class="col-sm-2"></div>
</div>
<?php include_once'Account/copyrights.php'; ?>
  
</body>
</html>
<?php ob_end_flush(); ?>