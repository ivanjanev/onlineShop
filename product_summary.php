<?php
$defaultItemsCart=0;
$totalPrice=0;
session_start();
require('showquery.php');
$user="User";
$logged=false;
if(isset($_SESSION['email'])&&!empty($_SESSION['email']))
{
    $user=$_SESSION['email'];
    $userid=$_SESSION['id'];
    $defaultItemsCart=showCartItems($user);
    $totalPrice=getTotalCartPrice($user);
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
  </head>
<body>
<div id="header">
<div class="container">
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
                <li class=""><a href="contact.php">За нас</a></li>
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
	<div class="row">
<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart"><label id="itemsInCart" style="display: inline"><?php echo $defaultItemsCart ?></label> Продукти  <span class="badge badge-warning pull-right"><label id="totalPrice" style="display: inline"><?php echo $totalPrice ?></label> мкд</span></a></div>
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
    
	<h3>  Кошница [ <small><?php echo $defaultItemsCart ?> Продукт(и) </small>]<a href="index.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Продолжи со купување </a></h3>
	<hr class="soft"/>
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Продукт</th>
                  <th>Опис</th>
				  <th>Цена (во МКД)</th>
                  <th>Извади од кошничка</th>
				</tr>
              </thead>
              <tbody>
				<?php

                if($defaultItemsCart!=0)
                {
                    $array=getAllCartItems($user);
                    foreach($array as $items)
                    {
                        echo "<tr>";
                            echo "<td> <img width='60' src='themes/images/products/".$items['id'].".jpg' alt=''/></td>";
                            echo "<td>".$items['name']."</td>";
                            echo "<td>".$items['price']."</td>";
                            echo "<td><button class='btn btn-danger btnDeleteCartItem' id=".$items['id']." type='button'><i class='icon-remove icon-white'></i></button></div></td>";
                        echo "</tr>";
                    }
                }

                ?>
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>Вкупно за наплата</strong></td>
                  <td class="label label-success" style="display:block"> <strong> <?php echo $totalPrice ?> </strong></td>
                </tr>
				</tbody>
            </table>
	<a href="#" class="btn btn-large pull-right btnGoToCharge">Продолжи кон наплата <i class="icon-arrow-right"></i></a>
        <form>
            <input type="text" id="id" style="display: none" value="<?php echo $userid ?>" />
            <input type="text" id="email" style="display: none" value="<?php echo $user ?>" />
        </form>
	
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
                <a href="contact.php">Контакт</a>
                <a href="contact.php">За нас</a>
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
</body>
</html>