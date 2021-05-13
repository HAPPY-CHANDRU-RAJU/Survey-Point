<?php

include_once '../indept-assets/resource-php/send-email-gmail.php';

	ob_start();
	session_start();
	if( isset($_SESSION['SP_User_Ext'])!="" ){
		header("Location: index.php");
	}
	include_once 'dbconnect.php';
	require_once 'utilities_ini.php';

	$error = false;

	if ( isset($_POST['btn-signup'], $_POST['token']) ) {
		
		if ( validate_token($_POST['token']) ) {
		
		$fname = trim($_POST['name']);
		$fname = strip_tags($fname);
		$name = htmlspecialchars($fname);
		$name = strtoupper($name);
		
        $dob = trim($_POST['dob']);
		$dob = strip_tags($dob);
		$dob = htmlspecialchars($dob);
		
		$gender = trim($_POST['gender']);
		$gender = strip_tags($gender);
		$gender = htmlspecialchars($gender);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		$st = trim($_POST['stt']);
		$st = strip_tags($st);
		$st = htmlspecialchars($st);
			
		$cy = trim($_POST['std']);
		$cy = strip_tags($cy);
		$cy = htmlspecialchars($cy);
			
		if(checkErrorInput($name,3)){
			$error = TRUE;
			$nameError = "Please Check Your Name <sub>( Min 3 characters )</sub>";
		}		
		
		if(emailVerify($email)){
			$error = true;
			$emailError = "Please Enter valid email address.";
		} else {
			$query = "SELECT `User_SP_Mail` FROM `User_Login` WHERE `User_SP_Mail`='$email'";
			$result = $conn->prepare($query);
			$count = $result->rowcount();
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		
		if(empty($pass) || (strlen($pass)< 6) ){
			$error = TRUE;
			$passError = "Please Enter Password <sub> ( Min 6 Characters ) </sub>";
		}
		
		if(empty($dob)){
			$error  = TRUE;
			$dobError = "Please Select Your Date of birth";
		}
		
		if(empty($gender)){
			$error = TRUE;
			$genderError = "Please Select Your Gender";
		}
		
		$password = hash('sha256', $pass);
		
		if( !$error ) {
			$stid = md5(sha1(md5($email).$name).time()); 
			
			$qu2 = "INSERT INTO `User_Login` (`User_SP_Id`, `User_SP_Name`, `User_SP_DOB`, `User_SP_Mail`, `User_SP_Status`, `User_SP_Password`, `User_SP_Ranking`, `User_SP_DOC`, `User_SP_Credit`, `User_SP_Photo`, `User_SP_Gender`, `User_SP_City`, `User_SP_State`, `User_SP_Country`) VALUES ('$stid', '$name', '$dob', '$email', 'INACTIVE', '$password', '0', current_timestamp(), '0', '../indept-assets/profile.png', '$gender', '$cy', '$st', 'India');";
			
			$re4 = $conn->prepare($qu2);
			$re4->execute();
				
			if ($re4) {
				unset($st);
				unset($cy);
				unset($pass);
				unset($email);
				unset($dob);
				unset($password);
				unset($gender);
				$user_id = $stid;
				$encode_id = base64_encode("encodeUserid{$user_id}");
				_token();
				
				
				$mail_body = '
	<html>
		<body style="font-family: Arial, Helvetica, sans-serif;line-height:1.8em;">
		<hr>
			<h2 align="center">Survey Point Verification</h2>
		<hr>
		<p style="margin: 15px;">Dear '.$name.'<br><br>Thank you for registering, please click on the link below to confirm your email address<br/><a href="http://localhost/Survey%20Points/Account/activate.php?id='.$encode_id.'&sid='.$_SESSION['token'].'&emailid='.$email.'"> Confirm Email</a></p><br>
		<p style="margin: 15px;">Regards,<br><b>Creation In</b><br>Survey Point</p>
		<hr>
		
				<p align="center"><strong>&copy;&nbsp;&nbsp;2020 Survey Point System </strong></p>
		</body>
</html>';

							$mail->addAddress($email); #  $email is necessary BUT $username is optional..
							$mail->Subject = "Verification link from Survey Point";
							$mail->Body = $mail_body;

							if ($mail->Send()) {
$errTyp = "success";
$errMSG ="Hey {$name} &nbsp;!!!,Hurray, registration successfull.<br>Please check your email for confirmation link!";
	header('Location :RegisterationSuccess.php.php?stid='.$_SESSION['token'].'&status=success');			
	exit();
							}else{
								$errTyp = "danger";
								$errMSG = "E-mail sending FAILED!!";
							}	
				
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
	  }	
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script src="../indept-assets/cities.js"></script>
  	<link rel="stylesheet" href="../indept-assets/style.css"/>
	<link rel="icon" href="../indept-assets/icon.png" >
	<title>Registration - Survey King</title>
</head>
<body background="../indept-assets/bg1.jpg">
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
      <a class="navbar-brand" href="#" style="color: #ffffff;font: Times New Roman"><h4><b>&nbsp;&nbsp;&nbsp;SURVEY KING</b></h4></a> 
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" >
      <ul class="nav navbar-nav navbar-right" >
      <li><a href="login.php" style="color: #fff"><button class="btn btn-lg btn-inverse" style="border: 2px solid black;background: #0d2f79" ><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp; LOG IN</button></a></li>
      </ul>
    </div>
  </div>
</nav>
	</div>
</div>
<br/><br/><br/>
<hr>

<div class="container-fluid" >
<div  class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="background: rgba(0,0,0,0.52);color: #ffff" id="bgtran">
		
		<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="text-danger"> <b>Create a FREE account</b></h2>
            </div>
            
        	<div class="form-group">
            	Already have an account ? <a href="login.php" id="nolink" >&nbsp;&nbsp;Log in Here...</a>
            </div>
            
            
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Your Full Name" maxlength="50" value="<?php echo $name ?>" required />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
               <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-birthday-cake"></span></span>
                 <input type="date" class="form-control" name="dob"  value="<?php echo $dob ?>" required />
            	</div>
                <span class="text-danger"><?php echo $dobError; ?></span>
            </div>
            
            <div class="form-group">
               <div class="input-group">
     <span class="input-group-addon"><span class="fa fa-question"></span></span>&nbsp;&nbsp;&nbsp;&nbsp;
            	<input type="radio" name="gender"  value="male" />&nbsp;&nbsp;MALE&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender"   value="female" />&nbsp;&nbsp;FEMALE&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender"   value="others" />&nbsp;&nbsp;OTHERS
            	   	</div>
                <span class="text-danger"><?php echo $genderError; ?></span>
            </div>
       
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>"  required/>
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" required/>
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
         
          
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="fa fa-globe"></span></span>
<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control" required></select>
				</div>
            </div>
            
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
<select id ="state" class="form-control" name="std" required></select>
		</div>
            </div>
<script language="javascript">print_state("sts");</script>
         
            <div class="form-group">
            	<hr />
            </div>
            
        	<input type="hidden" name="token" value="<?php echo _token() ?>">
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup"><b>CREATE ACCOUNT</b></button>
            </div> 
        </div>
    </form>
        
        
    </div>	
    
		<p align="center">By clicking ‘<b>Create account</b>’ or signing up, you agree to the Terms of Use and Privacy Policy. You also agree to receive information and offers relevant to our services via email. You can opt-out of these emails in your My Account page anytime.</p>
	</div>
	<div class="col-sm-3"></div>
</div>


<?php include_once'copyrights.php'; ?>
</div>
</body>
</html>
<?php ob_end_flush(); ?>