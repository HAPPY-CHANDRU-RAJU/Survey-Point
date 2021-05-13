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

	
	$show = $_GET['show'];
	$cat_Id = $_GET['category_Id'];

	if(!isset($_GET['show']) || !isset($_GET['category_Id'])){
		header("Location: index.php");
		exit;
	}else{
	$redq = "SELECT `Survey_Cat_Id`, `Survey_Cat_Name` FROM `Survey_Category` WHERE `Survey_Cat_Id`='$cat_Id' AND `Survey_Cat_Name`='$show'";
	$res12 = $conn->prepare($redq);
	$res12->execute();
	
	if($res12->rowcount()==1){
	}else{
		header("Location: index.php");
		exit();
	}
}
	

	if ( isset($_POST['btn-submit'], $_POST['token']) ) {
		
		if ( validate_token($_POST['token']) ) {
			
			
		$fname = trim($_POST['name']);
		$fname = strip_tags($fname);
		$name = htmlspecialchars($fname);
		$name = strtoupper($name);
		
		$bio = trim($_POST['bio']);
		$bio = strip_tags($bio);
		$bio = htmlspecialchars($bio);
			
		$noq = trim($_POST['noq']);
		$noq = strip_tags($noq);
		$noq = htmlspecialchars($noq);
		
			
		
		if(checkErrorInput($name,12)){
			$error = TRUE;
			$nameError = "Please Check Your Survey Name <sub>( Min 12 characters )</sub>";
		}
		
			
		if(checkErrorInput($bio,25)){
			$error = TRUE;
			$bioError = "Please Check Your Survey Description <sub>( Min 25 characters )</sub>";
		}
		
		
		if(empty($noq) || ($noq)< 5 || ($noq)>20 ){
			$error = TRUE;
			$noqError = "MIN ( 5 - 20 ) ONLY";
		}
		
		if(!$error){
			$stid = md5(sha1(md5($bio).$name).time()); 
			
			
			$q3 = "SELECT  `Survey_Cat_Name`, `Survey_Cat_No_Of_Post` FROM `Survey_Points`.`Survey_Category` WHERE `Survey_Cat_Status`= 'ACTIVE' AND `Survey_Cat_Id`='$cat_Id'";
			$re3 = $conn->prepare($q3);
			$re3->execute();
			
			if($re3->rowCount()==1){
				$row2 = $re3->fetch();
				$deptname = $row2['Survey_Cat_Name'];	
			}
			$sna= $SP_User['User_SP_Name'];
			
			$sq4 = "INSERT INTO `Survey_Activty` (`Survey_Act_Id`, `Survey_Act_Name`, `Survey_Act_Cate_Id`, `Survey_Act_Bio`, `Survey_Act_Status`, `Survey_Act_DOC`, `Survey_Act_Author`, `Survey_Act_Author_Id`, `Survey_Act_Rating`, `Survey_Act_Cate_name`, `Survey_Act_No_ques`, `Survey_Act_Credit`) VALUES ('$stid', '$name', '$cat_Id', '$bio', 'INACTIVE', current_timestamp(), '$sna', $emid, '0', '$show', '$noq', '$noq');";
			$res3 = $conn->prepare($sq4);
			$res3->execute();
			
			if($res3->rowCount()==1){
			$to = $row2['Survey_Cat_No_Of_Post'];
			$to=$to+1;
$sq7 = "UPDATE `Survey_Category` SET `Survey_Cat_No_Of_Post` = '$to' WHERE `Survey_Category`.`Survey_Cat_Id` = '$dept';";
			$res4 = $conn->prepare($sq7);
			$res4->execute();
			}
			
			if($res4){
			
				unset($to);
				unset($res4);
				unset($dept);
				unset($deptname);
				unset($bio);
				unset($name);
				unset($noq);
				unset($to);
				unset($sna);
				$errTyp = "success";
				$errMSG = "Successsfully Created Survey !! 
						   Share Below Link <br>
						   <b><a href='Take_survey.php?Survey_Id=$stid&source_um=test'> LINK </a></b>";
			}else{
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
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
	<title>Home - Survey Point</title>
	<script>
		$(document).ready(function(){
    $('.categories').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
	</script>
	<style>
		
.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide h2
{
    display: block;
}
.slick-slide.slick-loading h2
{
    display: none;
}
.slick-slide.dragging h2
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
	</style>
</head>
<body >

<div class="row">
<?php include_once'nav.php'; ?>
</div>
<div class="container">
	<br/><br/><br/><br/><br/>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6 bggrey">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?show=<?php echo $show ?>&category_Id=<?php echo $cat_Id ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="text-danger"> <b>Create your Survey !! Just one click</b></h2>
            </div>
        
        	<div class="form-group">
            	<hr />
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
                <span class="input-group-addon"><span class="fa fa-header"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Your Survey Title" minlength="12" value="<?php echo $name ?>" required />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
          
             <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="fa fa-paragraph"></span></span>
            	<input type="text" name="bio" class="form-control" placeholder="Enter Your Survey Description"  minlength="25" value="<?php echo $bio ?>" required />
                </div>
                <span class="text-danger"><?php echo $bioError; ?></span>
            </div>
           	
             <div class="form-group">
            	<div class="input-group">
                
            	<input type="hidden" name="noq" class="form-control" placeholder="Enter Number of questions in Your Survey ( 5 - 20 )" value="20" required />
                </div>
            </div>
           	
           
            <div class="form-group">
            	<hr />
            </div>
            
        	<input type="hidden" name="token" value="<?php echo _token() ?>">
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-submit">Submit</button>
            </div>
            
            
            <div class="form-group">
            	<hr />
            </div>
        
        </div>
    </form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<?php include_once'copyrights.php'; ?>
</body>
</html>
<?php ob_flush(); ?>