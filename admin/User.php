<?php 
    ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	if( !isset($_SESSION['SP_Admin_Ext']) ) {
		header("Location: login.php");
		exit;
	}     
	
	$emid = $_SESSION['SP_Admin_Ext'];
	
	$sql1 = "SELECT * FROM `Admin_Login` WHERE `Admin_Id`='$emid'";
	$res1 = $conn->prepare($sql1);
	$res1->execute();
	$SP_User= $res1->fetch();
	
	
	if ( ($_GET['source_um']=="accept")&&(isset($_GET['action']))&&(isset($_GET['Activity_Id']))) {
			$Actvid = $_GET['Activity_Id'];
			$Action = $_GET['action'];
			$query34 = "SELECT * FROM `User_Login` WHERE `User_SP_Id`='$Actvid'";
			$reds = $conn->prepare($query34);
			$reds->execute();
			$countsf = $reds->rowcount();
			if($countsf){
				if($Action=="delete"){
$redsqu = "UPDATE `User_Login` SET `User_SP_Status` = 'INACTIVE' WHERE `User_SP_Id` = '$Actvid'";
				}else if($Action=="update"){
$redsqu = "UPDATE `User_Login` SET `User_SP_Status` = 'ACTIVE' WHERE `User_SP_Id` = '$Actvid'";
				}
$redsfs = $conn->prepare($redsqu);
$redsfs->execute();

								$errTyp = "success";
								$errMSG = "UPDATED SUCCESSFULLY !!!";
				
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
	<title>Users Details - Survey Point</title>
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
<?php include_once'nav.php'; ?>  
	<div class="alert alert-info alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<h3><b>Check out Users details !!!</b></h3>
	</div>
	
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				
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
			<div class="col-sm-3"></div>
		</div>
            		
            
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-1"></div>	
			<div class="col-sm-10" style="overflow: scroll;height: 500px;">
				<table class="table table-responsive">
					<tr class="alert alert-danger">
						<th>Name</th>	
						<th>Email</th>	
						<th>DOB</th>		
						<th>Gender</th>		
						<th>Place</th>		
						<th>Status</th>		
					</tr>
					
					<?php
					
					$quy2 = "SELECT * FROM `User_Login` ORDER BY `User_SP_DOC` ";
				   	$rs2 = $conn->prepare($quy2);
					$rs2->execute();
					
					while( $row2 = $rs2->fetch()){
					
					if($row2["User_SP_Status"]=="ACTIVE"){
									$display = "INACTIVE";
									$cole = "danger";
									$stat = "delete";
								}else{
									$display = "ACTIVE";
									$cole = "primary";
									$stat = "update";
								}
								
		echo '<tr>		<td>'.$row2["User_SP_Name"].'</td>
						<td>'.$row2["User_SP_Mail"].'</td>
						<td>'.$row2["User_SP_DOB"].'</td>
						<td>'.$row2["User_SP_Gender"].'</td>
						<td>'.$row2["User_SP_City"].','.$row2["User_SP_State"].','.$row2["User_SP_Country"].'</td>';
						?>
						<td><button class="btn btn-sm btn-<?php echo $cole; ?>" onclick="location.href='?source_um=accept&action=<?php echo $stat; ?>&&Activity_Id=<?php echo $row2["User_SP_Id"]; ?>'">
									<?php echo $display; ?>
						</button></td>
						
						<?php
						echo'</tr>';
					}
		?>
					
				</table>
			</div>	
			<div class="col-sm-1"></div>	
		</div>
	</div>
	
<?php include_once'copyrights.php'; ?>
</body>
</html>
<?php ob_flush(); ?>