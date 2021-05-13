<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	require_once 'utilities_ini.php';
	
	if ( isset($_SESSION['SP_Admin_Ext']) ) {
		header("Location: index.php");
		exit;
	}
	
	$error = false;
	
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
			
			$sql = "SELECT * FROM `Admin_Login` WHERE `Admin_Mail`='$email';";
			$res= $conn->prepare($sql);
			$res->execute();
			$row= $res->fetch();
			
			if( $res->rowCount() == 1 && $row['Admin_password']==$password ) {
			  if($row['Admin_Status']=='ACTIVE'){
			  	$_SESSION['SP_Admin_Ext'] = $row['Admin_Id'];
				header("Location: index.php");
			  }else{
			  	$stat = "info";
			  	$errMSG = "Please verify your account !! check your E-Mail ";
			  }
			} else {
				$stat = "danger";
				$errMSG = "Incorrect Credentials, Try again...";
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
	<title>Admin Login - Survey Point</title>
</head>
<body>


<div class="container-fluid" >
  <div class="row">
  <div class="col-xs-2" >
  	<img src="../indept-assets/lo.png" align="middle" style="height: 15vw;margin: 15px;" >
  </div>
</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="1007">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="../Survey Point.php"><b>HOME</b></a></li>
          <li><a href="../ContactUs.php" ><b>CONTACT US</b></a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>  

<div  class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" id="bgtran">
		
		<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        
        	<div class="form-group">
            	<h2 class="text-danger"> <b>SIGN IN</b></h2>
            </div>
            
        	<div class="form-group">
            	<hr />
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
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
           
        </div>
   
    </form>
    </div>	
		
	</div>
	<div class="col-sm-3"></div>
</div>

<?php include_once'copyrights.php'; ?>
</div>
</body>
</html>
<?php ob_end_flush(); ?>