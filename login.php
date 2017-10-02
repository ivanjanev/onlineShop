<?php
$acc="";
$acc1="";
session_start();
require('showquery.php');
require ('dbconnect.php');

if(isset($_GET)&&!empty($_GET))
{
    $acc1= <<<al
        <div class="alert alert-block alert-error fade in" style="text-align:center">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    Морате да бидете логирани за да пристапете до кошницата!
        </div>
al;
}

if(isset($_POST)&&!empty($_POST))
{
    $email=$_POST['inputEmail1'];
    $password=$_POST['inputPassword1'];
    $crypt = crypt($password,'dIiDb');
    $query='SELECT * FROM user WHERE email="'.$email.'" and password="'.$crypt.'"';
    $result=mysqli_query($con,$query);
    $rownum=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    if($rownum==0)
    {
        $acc= <<<al
        <div class="alert alert-block alert-error fade in" style="text-align:center">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    Профилот не постои или комбинацијата на податоците е погрешна!
        </div>
al;
    }
    elseif($row['active']==0)
    {
        $acc= <<<al
        <div class="alert alert-block alert-error fade in" style="text-align:center">
		    <button type="button" class="close" data-dismiss="alert">×</button>
			Логирањето е неуспешно. Профилот сеуште не е активиран!        
		</div>
al;
    }
    else
    {
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
        $_SESSION['id']=$row['id'];
        $url='index.php';
        $acc= <<<al
        <div class="alert alert-block alert-success fade in" style="text-align:center">
		    <button type="button" class="close" data-dismiss="alert">×</button>
			Успешно логирање!       
		</div>
al;
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }
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
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Online IT store"/></a>
    <ul id="topMenu" class="nav pull-right">
		<li class=""><a href="index.php">Дома</a></li>
		<li class=""><a href="about.php">За нас</a></li>
		<li class=""><a href="contact.php">Контакт</a></li>
		<li class="">
			<a href="login.php" role="button" style="padding-right:0"><span class="btn btn-large btn-success">Најави се</span></a>
		</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open pointer"><a>Компјутери [<?php echo showQAll(1,5) ?>]</a>
				<ul>
				<li><a class="active" href="products.php"><i class="icon-chevron-right"></i>Desktop компјутери (<?php echo showQ(1) ?>) </a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Лаптопи (<?php echo showQ(2) ?>)</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Торби и ранци за лаптопи (<?php echo showQ(3) ?>)</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Подлоги и ладилници (<?php echo showQ(4) ?>)</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Батерии за лаптопи (<?php echo showQ(5) ?>)</a></li>
				</ul>
			</li>
			<li class="subMenu pointer"><a> Монитори и Проектори [<?php echo showQAll(6,8) ?>] </a>
			<ul style="display:none">
				<li><a href="products.php"><i class="icon-chevron-right"></i>Монитори (<?php echo showQ(6) ?>)</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Проектори (<?php echo showQ(7) ?>)</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Опрема за монитори и проектори (<?php echo showQ(8) ?>)</a></li>
			</ul>
			</li>
			<li class="subMenu pointer"><a>Смартфони и Таблети [<?php echo showQAll(9,12) ?>]</a>
				<ul style="display:none">
					<li><a href="products.php"><i class="icon-chevron-right"></i>Смартфони (<?php echo showQ(9) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Таблети (<?php echo showQ(10) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Додатоци за смартфони (<?php echo showQ(11) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Торбици и футроли за таблети (<?php echo showQ(12) ?>)</a></li>
				</ul>
			</li>
			<li class="subMenu pointer"><a>Desktop РС компоненти [<?php echo showQAll(13,17) ?>]</a>
				<ul style="display:none">
					<li><a href="products.php"><i class="icon-chevron-right"></i>Матични плочи (<?php echo showQ(13) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Графички картички (<?php echo showQ(14) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Процесори (<?php echo showQ(15) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Куќишта (<?php echo showQ(16) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Напојувања (<?php echo showQ(17) ?>)</a></li>
				</ul>
			</li>
			<li class="subMenu pointer"><a>Дискови и опрема [<?php echo showQAll(18,20) ?>]</a>
				<ul style="display:none">
					<li><a href="products.php"><i class="icon-chevron-right"></i>Хард дискови (<?php echo showQ(18) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>SSD дискови (<?php echo showQ(19) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Екстерни дискови (<?php echo showQ(20) ?>)</a></li>
				</ul>
			</li>
			<li class="subMenu pointer"><a>Тастатури и глувчиња [<?php echo showQAll(21,23) ?>]</a>
				<ul style="display:none">
					<li><a href="products.php"><i class="icon-chevron-right"></i>Тастатури (<?php echo showQ(21) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Глувчиња (<?php echo showQ(22) ?>)</a></li>
					<li><a href="products.php"><i class="icon-chevron-right"></i>Подлоги за глувчиња (<?php echo showQ(23) ?>)</a></li>
				</ul>
			</li>
		</ul>
		<br/>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
	<h3> Најава</h3>
	<hr class="soft"/>
	
	<div class="row">
		<div class="span4">
			<div class="well">
			<form action="login.php" method="POST">
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email *</label>
				<div class="controls">
				  <input class="span3"  type="text" id="inputEmail1" name="inputEmail1" placeholder="Email" required="required" autofocus>
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Лозинка *</label>
				<div class="controls">
				  <input type="password" class="span3"  id="inputPassword1" name="inputPassword1" placeholder="Password" required="required">
				</div>
			  </div>
			  <span> <?php echo $acc ?> </span>
              <span> <?php echo $acc1 ?> </span>
			  <p><sup>*</sup> Задолжителни полиња.</p>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn">Најави се</button>
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	
	
</div>
</div></div>
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
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
<span id="themesBtn"></span>
</body>
</html>