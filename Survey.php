<?php
	ob_start();
	session_start();
	include_once 'Account/dbconnect.php';
	require_once 'Account/utilities_ini.php';
	
	unset($_SESSION['Activity_id']);
	unset($_SESSION['Category_Id']);
	unset($_SESSION['Session_id']);
	unset($_SESSION['quiz']);
	
	if(($_GET['Survey_taken']=="")&&($_GET['Survey_Category']=="")){
		header("Location: NotFound.php");
		exit();
	}
	
		$survey_Id = $_GET['Survey_taken'];
		$Activ = $_GET['Activity_id'];
		$survey_Cat = $_GET['Survey_Category'];
	unset($redf);
	unset($resqs);
	
	$counts = 0;
	
	
	$redf = "SELECT * FROM `Survey_Activty` WHERE `Survey_Act_Cate_Id`='$survey_Cat' AND `Survey_Act_Id`='$survey_Id' AND `Survey_Act_Status`='ACTIVE' ";
	$resqs = $conn->prepare($redf);
	$resqs->execute();
	$counts = $resqs->rowcount();
			if(!$counts){
				unset($_SESSION['Activity_id']);
				unset($_SESSION['Category_Id']);
				unset($_SESSION['Session_id']);
				unset($_SESSION['quiz']);
				header("Location: NotFound.php?count=$counts");
				exit();
			}
	
	if(!isset($_SESSION['quiz'])){
	//	header("Location: Survey.php");
	//	exit();
	}
	 
	
	 
	$error = false;

	if ( isset($_POST['btn-email'], $_POST['token']) ) {
		
		if ( validate_token($_POST['token']) ) {
			
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		
		if(emailVerify($email)){
			$error = true;
			$emailError = "Please Enter valid email address.";
		} else {
			$query = "SELECT `Survey_attender_mail` FROM `Survey_Attender` WHERE `Survey_attender_mail`='$email' AND `Survey_attender_Activity`='$survey_Id'";
			$result = $conn->prepare($query);
			$count = $result->rowcount();
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		
		if( !$error ) {
			$stides = md5(sha1($email.time()));
			$qeres = "INSERT INTO `Survey_Attender` (`Survey_attender_Id`, `Survey_attender_mail`, `Survey_attender_Activity`) VALUES ('$stides', '$email', '$survey_Id');";
			
			$re42 = $conn->prepare($qeres);
			$re42->execute();
			
			if($re42){
				$errTyp = "Success";
				$errMSG = "Successfull";
				
				$_SESSION['quiz'] = $stides;
				$start = 1;
				
			}else{
				$errTyp = "danger";
				$errMSG = "Please try again later !!";
			}
			
		}
		
		}
		
	}
	
	
	if(($_GET['source_um']=="start")&&(isset($_GET['Activity_id'])!="")&&(isset($_GET['Survey_Category'])!="")&&(isset($_GET['Logged'])!="")){
		$quiz = 1;
		$act = $_GET['Activity_id'];
		$caft = $_GET['Survey_Category'];
		header("Location: Main_Survey.php?Activity_id=$act&Category_Id=$survey_Cat&qp=1");
		exit();
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
	<title>Welcome to Survey King </title>
	<?php
	if((!$start)&&(!isset($_GET['Logged']))){ ?>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<?php
}
?>
</head>
<body bgcolor="#e1e1e1" style="background: #e1e1e1" >

<?php
	if(!$start){
	?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Survey Page - Survey King</h4>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
	          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?Survey_taken=<?php echo $survey_Id; ?>&Survey_Category=<?php echo $survey_Cat; ?>" autocomplete="off">
    		  	
    		  	
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
    		  	
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>"  required/>
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
        
        
            <div class="form-group">
            	<hr />
            </div>
            
        	<input type="hidden" name="token" value="<?php echo _token() ?>">
            <div class="form-group">
<button type="submit" class="btn btn-block btn-primary" name="btn-email">&nbsp;&nbsp;TAKE QUIZ&nbsp;&nbsp;</button>
            </div>
            
    		  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<?php
	}
	?>

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

   $qoe	= "SELECT * FROM `Survey_Activty` WHERE `Survey_Act_Id`='$survey_Id' AND `Survey_Act_Cate_Id`='$survey_Cat'";
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
		<?php
				
			if($start){
		?>
	<center><button onclick="location.href='?source_um=start&Activity_id=<?php echo $survey_Id;?>&Logged=<?php echo $email; ?>&Survey_taken=<?php echo$survey_Id;?>&Survey_Category=<?php echo $survey_Cat; ?>'" class="btn btn-lg btn-success">&nbsp;&nbsp;START NOW&nbsp;&nbsp;</button></center>	
			<?php
			  }		
		?>
		<div class="row">
			<div class="col-sm-3"></div>
			
			<div class="col-sm-3"></div>
		</div>
		
	</div>
	<div class="col-sm-2"></div>
</div>
<hr>
<?php include_once'Account/copyrights.php'; ?>
  
</body>
</html>
<?php ob_end_flush(); ?>