<?php 
    ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	if( !isset($_SESSION['SP_User_Ext']) ) {
		header("Location: login.php");
		exit;
	}     
	
	$emid = $_SESSION['SP_User_Ext'];
	
	$sql1 = "SELECT * FROM `User_Login` WHERE `User_SP_Id`='$emid'";
	$res1 = $conn->prepare($sql1);
	$res1->execute();
	$SP_User= $res1->fetch();
	
	if(!isset($_GET['show'])){
		header("Location: index.php?show=All_Survey");
		exit;
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
		<div class="alert alert-info alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<h3 class="text-success"><b>Welcome <?php echo $SP_User['User_SP_Name']; ?> !!!</b>-</h3>
	</div>
			<div class="col-sm-12">
			<h3 class="text text-uppercase text-info" align="justify">&nbsp;&nbsp;<b>Survey Categories</b>&nbsp;&nbsp;</h3>
			<hr style="border-top: 1px dashed red;" />	
			</div>
				
<marquee>
   <h3 class="text-success">&nbsp;&nbsp;<i class="fa fa-info text-success"></i>&nbsp;&nbsp;Create your Own Survey !!!</h3>
</marquee>
				<hr style="border-top: 1px dashed red;" />
			<section class="">

			<?php
			   $sql = "SELECT * FROM `Survey_Category` WHERE `Survey_Cat_Status` = 'ACTIVE' ORDER BY `Survey_Category`.`Survey_Cat_Name` ASC";
				$res2 = $conn->prepare($sql);
				$res2->execute();
				
				while($cat= $res2->fetch()){ 
					$Sur_Names = strtoupper($cat['Survey_Cat_Name']);
					$Sur_Id = $cat['Survey_Cat_Id'];
					?> 
				<div class="col-sm-4 btn-primary " style="border-radius: 10px;border: 1px solid black;box-shadow: 0px 15px 12px 5px #000000;margin: 15px" onclick="location.href='CreateMySurvey.php?show=<?php echo $Sur_Names; ?>&category_Id=<?php echo $Sur_Id;?>'">
	<diV class="form-group">
		<br/>	
	</div>	
						<p align="center" >&nbsp;&nbsp;<h3 class="text-default" align="center"><b><?php echo $Sur_Names; ?></b></h3>&nbsp;&nbsp;<br/><br/></p>
	<diV class="form-group">
	<br/>
	</diV>
				</div>
				<div class="col-sm-1" style="margin: 15px;"></div>
					<?php
				}
				?>
	
			</section>
				
		</div>
		<hr style="border-top: 1px dashed red;">
</div>
<?php include_once'copyrights.php'; ?>
</body>
</html>
<?php ob_flush(); ?>