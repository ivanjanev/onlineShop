<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 09.08.2016
 * Time: 13:42
 */
require('dbconnect.php');
if(isset($_GET['hash'])&&!empty($_GET['hash']))
{
    if(isset($_GET['email'])&&!empty($_GET['email']))
    {
        $hash=$_GET['hash'];
        $email=$_GET['email'];
        $query='SELECT hashcode,active FROM user WHERE email="'.$email.'"';
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($result);
        if($row['active']==1)
        {
            $alert= <<<al
        <div class="alert alert-block alert-error fade in" style="text-align:center; margin-top:50px;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Профилот е веќе активен!
        </div>
al;
            $url="index.php";
            echo '<META HTTP-EQUIV=REFRESH CONTENT="2; '.$url.'">';
        }
        elseif($row['hashcode']!=$hash)
        {
            $alert= <<<al
            <div class="alert alert-block alert-error fade in" style="text-align:center; margin-top:50px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Проблем со конфирмацискиот линк!
            </div>
al;
            $url="login.php";
            echo '<META HTTP-EQUIV=REFRESH CONTENT="2; '.$url.'">';
        }
        else
        {
            $updateQuery='UPDATE user SET active=1 WHERE email="'.$email.'"';
            if(mysqli_query($con,$updateQuery))
            {
                $alert= <<<al
            <div class="alert alert-block alert-success fade in" style="text-align:center; margin-top:50px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Профилот е успешно активиран!
            </div>
al;
                $url="index.php";
                echo '<META HTTP-EQUIV=REFRESH CONTENT="2; '.$url.'">';
            }
            else
            {
                $alert= <<<al
            <div class="alert alert-block alert-error fade in" style="text-align:center; margin-top:50px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Проблем со конекцијата кон базата на податоци!
            </div>
al;
                $url="login.php";
                echo '<META HTTP-EQUIV=REFRESH CONTENT="2; '.$url.'">';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link id="callCss" rel="stylesheet" href="themes/onlineitstore/bootstrap.min.css" media="screen"/>
        <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <?php echo $alert ?>
                </div>
            </div>
        </div>
    </body>
</html>