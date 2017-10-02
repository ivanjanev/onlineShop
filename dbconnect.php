<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 07.08.2016
 * Time: 20:35
 */

//Composer autoload
require('vendor/autoload.php');
$stripe_publicKey="public_key_from_stripe_account";
$stripe_secretKey="secret_key_from_stripe_account";
\Stripe\Stripe::setApiKey($stripe_secretKey);

$con = mysqli_connect("localhost","root","","OnlineStore");
if (mysqli_connect_errno())
{
    echo "Неуспешно поврзување на базата на податоци: " . mysqli_connect_error();
}
?>