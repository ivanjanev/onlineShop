<?php
session_start();
$logged=false;
require('showquery.php');
if(isset($_SESSION['email'])&&!empty($_SESSION['email']))
{
    $logged=true;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Online IT Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/onlineitstore/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
	<style>#canvas-for-google-map img{max-width:none!important;background:none!important;font-size: inherit;}</style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6"></div>
	<div class="span6">
	<div class="pull-right">
    <?php if(!$logged)
    {
        echo '<a href="register.php" style="color:#0000ff; margin-right:10px">Регистрирај се</a>';
    }
    else
    {
        echo '<a href="#" class="linkLogout" style="color:#0000ff; margin-right:10px">Одјави се</a>';
    }
    ?>
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
    <ul id="topMenu" class="nav pull-right">
	<li class=""><a href="index.php">Дома</a></li>
	<li class=""><a href="about.php">За нас</a></li>
	<li class=""><a href="contact.php">Контакт</a></li>
        <?php
        if(!$logged)
        {
            echo '<a href="login.php" role="button" style="padding-right:0"><span class="btn btn-large btn-success login">Најави се</span></a>';
        }
        ?>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
<div class="container">
	<hr class="soften">
	<h1 style="margin-left:95px;">За нас</h1>
	<hr class="soften"/>	
	<div class="row">
		<div class="span1"></div>
		<div class="span10" id="mainCol">
			<hr class="soft"/>
			<h5>Lorem ipsum dolor sit amet</h5><br/>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. 
				Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin 
				diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula 
				imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, 
				dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient 
				montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. 
				Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. 
			</p><br/>
			<h5>Lorem ipsum dolor sit amet</h5><br/>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. 
				Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin 
				diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula 
				imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, 
				dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient 
				montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. 
				Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. 
			</p><br/>
			<h5>Lorem ipsum dolor sit amet</h5><br/>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. 
				Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin 
				diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula 
				imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, 
				dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient 
				montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. 
				Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. 
			</p>
		</div>
	</div><br/><br/>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3"></div>
			<div class="span3">
				<h5>Брзи линкови</h5>
				<a href="index.php">Дома</a>
				<a href="about.php">За нас</a>
				<a href="contact.php">Контакт</a>
			 </div>
			<div id="socialMedia" class="span3">
				<h5>Социјални Мрежи </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; Online IT Store</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
    <script src="themes/js/scripts.js"></script>
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	<script src="https://www.dog-checks.com/google-maps-authorization.js?id=e0bb2c86-c214-e46b-5fee-9c5418beaa55&c=embed-map-code&u=1471081170" defer="defer" async="async"></script>
</body>
</html>