<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 08.08.2016
 * Time: 19:52
 */
session_start();
require('dbconnect.php');
require('showquery.php');

if(isset($_SESSION['email'])&&!empty($_SESSION['email']))
{
    if(isset($_POST['productId'])&&!empty($_POST['productId']))
    {
        $array=array();
        $productId=$_POST['productId'];
        $userId=$_SESSION['id'];

        //checking for stock > 0

        $checkQuery='SELECT stock FROM product WHERE id="'.$productId.'"';
        $rez=mysqli_query($con,$checkQuery);
        $stock=mysqli_fetch_assoc($rez);

        //if stock > 0 add in cart
        if($stock['stock'] == 0)
        {
            echo "false";
        }
        else
        {
            $query="INSERT INTO cart (userid,productid) VALUES ('$userId','$productId')";
            $result=mysqli_query($con,$query);
            $total=getTotalCartPrice($_SESSION['email']);
            $number=showCartItems($_SESSION['email']);
            $array[]=$total;
            $array[]=$number;
            echo json_encode($array);
        }
    }
    if(isset($_POST['log'])&&!empty($_POST['log']))
    {
        session_start();
        session_destroy();
    }
    if(isset($_POST['deleteId'])&&!empty($_POST['deleteId']))
    {
        $productId=$_POST['deleteId'];
        $userId=$_SESSION['id'];
        $query='DELETE FROM cart WHERE userid="'.$userId.'" AND productid="'.$productId.'" LIMIT 1';
        $result=mysqli_query($con,$query);
    }
    if(isset($_POST['emailUser'])&&!empty($_POST['emailUser']))
    {
        if(isset($_POST['idUser'])&&!empty($_POST['idUser']))
        {
            echo checkStockOnPayment($_POST['emailUser'],$_POST['idUser']);
        }
    }
}

?>
