<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 07.09.2016
 * Time: 17:43
 */

function getAvailableDates()
{
    $array=array();
    require('dbconnect.php');
    $selectQ='SELECT DISTINCT(dateStamp) AS Date FROM sales ORDER BY dateStamp DESC';
    $result=mysqli_query($con,$selectQ);
    while($row=mysqli_fetch_assoc($result))
    {
        $array[]=$row;
    }
    return $array;
}

function getAvailableCategories()
{
    $array=array();
    require('dbconnect.php');
    $selectQ="SELECT * FROM category";
    $result=mysqli_query($con,$selectQ);
    while($row=mysqli_fetch_assoc($result))
    {
        $array[]=$row;
    }
    return $array;
}

function getAvailableProducts()
{
    $array=array();
    require('dbconnect.php');
    $selectQ="SELECT * FROM product";
    $result=mysqli_query($con,$selectQ);
    while($row=mysqli_fetch_assoc($result))
    {
        $array[]=$row;
    }
    return $array;
}

function testIntOrDec($number)
{
    if(is_numeric($number))
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>

