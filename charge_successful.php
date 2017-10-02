<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 09.08.2016
 * Time: 20:20
 */
session_start();
require('showquery.php');
require('dbconnect.php');

if(isset($_POST['stripeToken'])&&!empty($_POST['stripeToken']))
{
    $token=$_POST['stripeToken'];

    try {
        \Stripe\Charge::create(array(
            "amount" => getTotalCartPrice($_SESSION['email'])*100,
            "currency" => "MKD",
            "source" => $token, // obtained with Stripe.js
            "description" => "Charge for ".$_SESSION['email']
        ));
    }
    catch(\Stripe\Error\Card $e) {
        $alert= <<<al
            <div class="alert alert-block alert-error fade in" style="text-align:center; margin-top:50px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Грешка со вашата кредитна картичка!
            </div>
al;
    }

    $url='index.php';
    $alert= <<<al
            <div class="alert alert-block alert-success fade in" style="text-align:center; margin-top:50px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Ви благодариме на купувањето!
            </div>
al;
    echo '<META HTTP-EQUIV=REFRESH CONTENT="3; '.$url.'">';


    //create sales log for charge
    $productsArray = getAllCartItems($_SESSION['email']);
    $userId = $_SESSION['id'];
    foreach ($productsArray as $prod)
    {
        $productId=$prod['id'];
        $productPrice=$prod['price'];
        $data=date("Y-m-d");
        $insertSql="INSERT INTO sales(userId,productId,dateStamp,price) VALUES ('$userId','$productId','$data','$productPrice')";
        mysqli_query($con,$insertSql);
    }

    deleteCartItemsOnCharge($_SESSION['email']);
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