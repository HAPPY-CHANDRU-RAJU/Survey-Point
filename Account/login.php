<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	require_once 'utilities_ini.php';
	
	if ( isset($_SESSION['SP_User_Ext']) ) {
		header("Location: index.php");
		exit;
	}
	
	$error = FALSE;
	
	if( isset($_POST['btn-login'],$_POST['token']) ) {	
		if ( validate_token($_POST['token']) ) {
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		if(empty($pass) || (strlen($pass)< 6) ){
			$error = TRUE;
			$passError = "Please Enter Password <sub> ( Min 6 Characters ) </sub>";
		}
		
		if(emailVerify($email)){
			$error = TRUE;
			$emailError = "Please Check E-mail Id";
		}
		
		if (!$error) {
			
			$password = hash('sha256', $pass); 
			
			$sql1 = "SELECT `User_SP_Id`, `User_SP_Status`, `User_SP_Password`, `User_SP_Mail`  FROM `User_Login` WHERE `User_SP_Mail`='$email';";
			$res= $conn->prepare($sql1);
			$res->execute();
			$row= $res->fetch();
			
			if(($res->rowCount()==1)&&($row['User_SP_Password']==$password)) {
			  if($row['User_SP_Status']=='ACTIVE'){
			  	$_SESSION['SP_User_Ext'] = $row['User_SP_Id'];
				header("Location: index.php");
			  }else{
			  	$stat = "info";
			  	$errMSG = "Please verify your account !! check your E-Mail ";
			  }
			} else {
				$stat = "danger";
				$errMSG = "Incorrect Credentials, Try again...<br>$password";
			}
				
		}
		
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
  	<link rel="stylesheet" href="../indept-assets/style.css"/>
	<link rel="icon" href="../indept-assets/icon.png" >
	<title>Login - Survey King</title>
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
      <li><a href="register.php" style="color: #fff"><button class="btn btn-lg btn-inverse" style="border: 2px solid black;background: #0d2f79" ><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp; Sign Up</button></a></li>
      </ul>
    </div>
  </div>
</nav>
	</div>
</div>
<br/><br/><br/>
<hr>
<div class="container">

<div  class="row" style="min-height:300px;">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="background-color: rgba(0,0,0,0.25);">
		
		<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        
        	<div class="form-group">
            	<h2 class="text-default" style="color: #ffffff"> <b>Log in to your account</b></h2>
            </div>
            
             <div class="form-group" style="color: #ffffff">
Don't have an account&nbsp;?&nbsp;&nbsp;<a href="register.php" class="text-danger" id="nolink"><b>Sign Up Here...</b></a>
            </div>
        
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo $stat ;?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
           
        <input type="hidden" name="token" value="<?php echo _token(); ?>">
            <div class="form-group" >
            	<button type="submit"  class="btn btn-block btn-primary" name="btn-login"><b>LOG IN</b>&nbsp;&nbsp;<i class="glyphicon glyphicon-triangle-right"></i></button><br/>
            </div>
            
   
        </div>
   
    </form>
    </div>	
		
	</div>
	<div class="col-sm-3"></div>
</div>

</div>
<hr>
<div class="col-sm-12" style="background: #0d2f79;color: white">
	<center>
	<br>	
<h2 class="text text-uppercase"><b>Work smarter and faster as a team</b></h2>
<br/>
 	 <i class="fa fa-check-square-o "></i>&nbsp;&nbsp;Powerful collaboration features&nbsp;&nbsp;
 	 <i class="fa fa-check-square-o "></i>&nbsp;&nbsp;User and data management&nbsp;&nbsp;
 	 <i class="fa fa-check-square-o"></i>&nbsp;&nbsp;Consolidated billing&nbsp;&nbsp;&nbsp;
<br>
<br>
 </center>
</div>
<div class="col-sm-12" style="color: #00000">
	<?php include_once'copyrights.php'; ?>
</div>

</body>
</html>
<?php ob_end_flush(); ?>