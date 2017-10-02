<?php



$alert="";
require('dbconnect.php');
require('showquery.php');
if(isset($_POST)&&!empty($_POST))
{
    $fullName=$_POST['fullName'];
    $password=$_POST['pass'];
    $email=$_POST['email'];
    $crypt = crypt($password,'dIiDb');
    $query='SELECT * FROM user WHERE email="'.$email.'"';
    $result=mysqli_query($con,$query);
    $rowcount=mysqli_num_rows($result);
    if($rowcount!=0)
    {
        $alert= <<<al
        <div class="alert alert-block alert-error fade in">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    Постои регистриран корисник со внесениот е-mail!
        </div>
al;
    }
    else
    {
        $hash=hash("sha256",$_POST['email']);
        $sql="INSERT INTO user (name, password, email, hashcode) VALUES ('$fullName', '$crypt' , '$email', '$hash')";
        if(mysqli_query($con,$sql))
        {
            $alert= <<<al
        <div class="alert alert-block alert-success fade in">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    Успешно регистрирање! На вашата е-mail адреса е испратен линк за активирање на профилот! <br/>
		    За 5 секунди ќе бидите префрлени на страната за најава!
        </div>
al;

            $url='login.php';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="5; '.$url.'">';

            //mail encoding to show Cyrillic
            mb_internal_encoding('UTF-8');
            mb_http_output('UTF-8');
            mb_http_input('UTF-8');
            mb_regex_encoding('UTF-8');

            $from = "onlineitstore@gmail.com";
            $headers = "From:" . $from . "\n";
            $headers .= "Content-type: text/html; charset=UTF-8 \n";
            $message="Проследете го следниот линк за активирање на профилот https://localhost/OnlineStore/confirmation.php?hash=$hash&email=$email";
            mail($email,"Confirmation for Online IT Store",wordwrap($message,70),$headers);
        }
        else
        {
            $alert= <<<al
        <div class="alert alert-block alert-error fade in">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    Грешка при конекција со базата на податоци! Пробајте подоцна!
        </div>
al;
        }
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
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
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
                        <li><a class="active" href="index.php?id=1"><i class="icon-chevron-right"></i>Desktop компјутери (<?php echo showQ(1) ?>) </a></li>
                        <li><a href="index.php?id=2"><i class="icon-chevron-right"></i>Лаптопи (<?php echo showQ(2) ?>)</a></li>
                        <li><a href="index.php?id=3"><i class="icon-chevron-right"></i>Торби и ранци за лаптопи (<?php echo showQ(3) ?>)</a></li>
                        <li><a href="index.php?id=4"><i class="icon-chevron-right"></i>Подлоги и ладилници (<?php echo showQ(4) ?>)</a></li>
                        <li><a href="index.php?id=5"><i class="icon-chevron-right"></i>Батерии за лаптопи (<?php echo showQ(5) ?>)</a></li>
                    </ul>
                </li>
                <li class="subMenu pointer"><a> Монитори и Проектори [<?php echo showQAll(6,8) ?>] </a>
                    <ul style="display:none">
                        <li><a href="index.php?id=6"><i class="icon-chevron-right"></i>Монитори (<?php echo showQ(6) ?>)</a></li>
                        <li><a href="index.php?id=7"><i class="icon-chevron-right"></i>Проектори (<?php echo showQ(7) ?>)</a></li>
                        <li><a href="index.php?id=8"><i class="icon-chevron-right"></i>Опрема за монитори и проектори (<?php echo showQ(8) ?>)</a></li>
                    </ul>
                </li>
                <li class="subMenu pointer"><a>Смартфони и Таблети [<?php echo showQAll(9,12) ?>]</a>
                    <ul style="display:none">
                        <li><a href="index.php?id=9"><i class="icon-chevron-right"></i>Смартфони (<?php echo showQ(9) ?>)</a></li>
                        <li><a href="index.php?id=10"><i class="icon-chevron-right"></i>Таблети (<?php echo showQ(10) ?>)</a></li>
                        <li><a href="index.php?id=11"><i class="icon-chevron-right"></i>Додатоци за смартфони (<?php echo showQ(11) ?>)</a></li>
                        <li><a href="index.php?id=12"><i class="icon-chevron-right"></i>Торбици и футроли за таблети (<?php echo showQ(12) ?>)</a></li>
                    </ul>
                </li>
                <li class="subMenu pointer"><a>Desktop РС компоненти [<?php echo showQAll(13,17) ?>]</a>
                    <ul style="display:none">
                        <li><a href="index.php?id=13"><i class="icon-chevron-right"></i>Матични плочи (<?php echo showQ(13) ?>)</a></li>
                        <li><a href="index.php?id=14"><i class="icon-chevron-right"></i>Графички картички (<?php echo showQ(14) ?>)</a></li>
                        <li><a href="index.php?id=15"><i class="icon-chevron-right"></i>Процесори (<?php echo showQ(15) ?>)</a></li>
                        <li><a href="index.php?id=16"><i class="icon-chevron-right"></i>Куќишта (<?php echo showQ(16) ?>)</a></li>
                        <li><a href="index.php?id=17"><i class="icon-chevron-right"></i>Напојувања (<?php echo showQ(17) ?>)</a></li>
                    </ul>
                </li>
                <li class="subMenu pointer"><a>Дискови и опрема [<?php echo showQAll(18,20) ?>]</a>
                    <ul style="display:none">
                        <li><a href="index.php?id=18"><i class="icon-chevron-right"></i>Хард дискови (<?php echo showQ(18) ?>)</a></li>
                        <li><a href="index.php?id=19"><i class="icon-chevron-right"></i>SSD дискови (<?php echo showQ(19) ?>)</a></li>
                        <li><a href="index.php?id=20"><i class="icon-chevron-right"></i>Екстерни дискови (<?php echo showQ(20) ?>)</a></li>
                    </ul>
                </li>
                <li class="subMenu pointer"><a>Тастатури и глувчиња [<?php echo showQAll(21,23) ?>]</a>
                    <ul style="display:none">
                        <li><a href="index.php?id=21"><i class="icon-chevron-right"></i>Тастатури (<?php echo showQ(21) ?>)</a></li>
                        <li><a href="index.php?id=22"><i class="icon-chevron-right"></i>Глувчиња (<?php echo showQ(22) ?>)</a></li>
                        <li><a href="index.php?id=23"><i class="icon-chevron-right"></i>Подлоги за глувчиња (<?php echo showQ(23) ?>)</a></li>
                    </ul>
                </li>
            </ul>
            <br/>
        </div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
		<h3> Регистрација</h3>	
	<div class="well">
	<form class="form-horizontal" action="register.php" method="POST">
		<h4>Ваши лични информации</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Име и презиме <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" placeholder="Име и презиме" name="fullName" required="required" autofocus>
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="email" id="input_email" placeholder="Email" name="email" required="required">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Лозинка <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="inputPassword1" placeholder="Лозинка" name="pass" required="required">
		</div>
	  </div>	  
	<?php echo $alert ?>
	<p><sup>*</sup>Задолжителни полиња. Ве молиме информациите внесете ги на латиница.</p>
	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Регистрирај ме" />
			</div>
		</div>		
	</form>
</div>

</div>
</div>
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
				<h5>SOCIAL MEDIA </h5>
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
	
	<!-- Themes switcher section ============================================================================================= -->
<span id="themesBtn"></span>
</body>
</html>