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
	
	if ( isset($_POST['btn-emailsd'], $_POST['token']) ) {
		
		if ( validate_token($_POST['token']) ) {
			
		$emaild = $_POST['emaild'];
		
		
		if(empty($emaild)){
			$error = true;
			$emaildError = "Please Enter your DOB";
		} 
		
		if( !$error ) {
			$qeres = "UPDATE `User_Login` SET `User_SP_DOB` = '$emaild' WHERE `User_Login`.`User_SP_Id` = '$emid'";
			
			$re42 = $conn->prepare($qeres);
			$re42->execute();
			
			if($re42){
				$errTyp = "Success";
				$errMSG = "Successfull";
			
				
			}else{
				$errTyp = "danger";
				$errMSG = "Please try again later !!";
			}
			
		}
		
		}
		
	}
	
	
	if ( isset($_POST['btn-emails'], $_POST['token']) ) {
		
		if ( validate_token($_POST['token']) ) {
			
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		$email = strtoupper($email);
		
		
		if(empty($email)||strlen($email)<4){
			$error = true;
			$emailError = "Please Enter your Name";
		} 
		
		if( !$error ) {
			$qeres = "UPDATE `User_Login` SET `User_SP_Name` = '$email' WHERE `User_Login`.`User_SP_Id` = '$emid'";
			
			$re42 = $conn->prepare($qeres);
			$re42->execute();
			
			if($re42){
				$errTyp = "Success";
				$errMSG = "Successfull";
			
				
			}else{
				$errTyp = "danger";
				$errMSG = "Please try again later !!";
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  	<link rel="stylesheet" href="../indept-assets/style.css"/>
	<link rel="icon" href="../indept-assets/icon.png" >
	<title>Setting pages - Survey Point</title>
</head>
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
				<img src="../indept-assets/profile.png" class="img-thumbnail" height="200px" width="200px;"/>
			</div>
			<div class="col-sm-10">
				<h2 class="text text-danger" align="left">Your Profile</h2>&nbsp;&nbsp;&nbsp;
				<hr style="border: 2px dotted black">
					
				<div class="row">
					<table class="col-sm-12">
<tr><td><strong>NAME</strong></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $SP_User['User_SP_Name'];?>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#namesetting"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;EDIT</button></td></tr>
<tr><td><strong>DOB</strong></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $SP_User['User_SP_DOB'];?>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" value="edit" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#dobsetting"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;EDIT</button></td></tr>
<tr><td><strong>E-MAIL ID</strong></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $SP_User['User_SP_Mail'];?></td></tr>
<tr><td><strong>GENDER</strong></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo strtoupper($SP_User['User_SP_Gender']);?></td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

 
  <div class="modal fade" id="namesetting">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title text-primary"><b>Update name :</b> </h3>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    		  	
    		  	
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
            	<input type="text" name="email" class="form-control" placeholder="Enter Your Name" maxlength="40" value="<?php echo $email ?>"  required/>
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
        
        
            <div class="form-group">
            	<hr />
            </div>
            
        	<input type="hidden" name="token" value="<?php echo _token() ?>">
            <div class="form-group">
<button type="submit" class="btn btn-block btn-primary" name="btn-emails">&nbsp;&nbsp;SAVE&nbsp;&nbsp;</button>
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


<div class="modal fade" id="dobsetting">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title text-primary"><b>Update DOB</b></h3>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    		  	
    		  	
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            	<input type="date" name="emaild" class="form-control"   required/>
                </div>
                <span class="text-danger"><?php echo $emaildError; ?></span>
            </div>
        
        
            <div class="form-group">
            	<hr />
            </div>
            
        	<input type="hidden" name="token" value="<?php echo _token() ?>">
            <div class="form-group">
<button type="submit" class="btn btn-block btn-primary" name="btn-emailsd">&nbsp;&nbsp;SAVE&nbsp;&nbsp;</button>
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

<?php include_once'copyrights.php'; ?>
</body>
</html>
<?php ob_flush(); ?>