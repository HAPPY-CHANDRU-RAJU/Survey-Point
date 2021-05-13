<?php

ob_start();
	session_start();
	include_once 'Account/dbconnect.php';
	require_once 'Account/utilities_ini.php';

			unset($_SESSION['qps']);
			unset($_SESSION['Category_Id']);
			unset($_SESSION['Activity_id']);
			unset($_SESSION['quiz']);
			
 if(($_GET['Activity_id']=="")&&($_GET['Category_Id']=="")){
		header("Location: NotFound.php");
		exit();				
	}
	
	$survey_Id = $_GET['Activity_id'];
	$survey_Cat = $_GET['Category_Id'];

 
	$redf = "SELECT * FROM `Survey_Activty` WHERE `Survey_Act_Cate_Id`='$survey_Cat' AND `Survey_Act_Id`='$survey_Id'";
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
		}else{
				 $infoq = $resqs->fetch();
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
	<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body>
	<div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Survey Page - Survey King</h4>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">

				<div class="form-group">
            	<div class="alert alert-success">
				<span class="glyphicon glyphicon-info-sign"></span>Successfully Survey Completed
                </div>
            	</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
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

$tiels = $infoq['Survey_Act_Name'];
$tielbios = $infoq['Survey_Act_Bio'];

?>
	<div class="alert alert-info alert-lg">
		<b><h3>&nbsp;&nbsp;<?php echo $tiels; ?></h3>
		<P align="right"><marquee><span class="text-danger"> SURVEY COMPLETED </span></marquee></P></b>
			<hr>
				<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tielbios; ?></p>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
<center>	
		<button class="btn btn-success btn-block" onclick="location.href='index.php'">CREATE YOUR OWN SURVEY </button>
</center>
		</div>
		<div class="col-sm-3"></div>
	</div>
<?php include_once'Account/copyrights.php'; ?>
</body>
</html>