<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 09.08.2016
 * Time: 19:55
 */
session_start();
require('dbconnect.php');
require('showquery.php');

if(isset($_GET['sct'])&&!empty($_GET['sct']))
{
    $date=$_GET['sct'];
    $total=0;
    $sql = 'SELECT user.name,sales.price,product.name AS pname FROM user,sales,product WHERE sales.dateStamp="'.$date.'" AND sales.userId=user.id AND product.id=sales.productId';
    $resultat=mysqli_query($con,$sql);
    $array=array();
    while($row=mysqli_fetch_assoc($resultat))
    {
        $array[]=$row;
        $total+=$row['price'];
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link id="callCss" rel="stylesheet" href="themes/onlineitstore/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <title>Document</title>
</head>
<body>
<h3 class="productsOverviewTitle">Извештај за <?php echo $date ?></php></h3><br/>
<div class="productsOverview reportOverview">
    <table>
        <tr>
            <th>Корисник</th>
            <th>Продукт</th>
            <th>Цена</th>
        </tr>
        <?php
        foreach($array as $item){ ?>
            <tr>
                <td><?php echo $item['name']?></td>
                <td><?php echo $item['pname']?></td>
                <td><?php echo $item['price']?> мкд</td>
            </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td><b>Вкупно:</b></td>
            <td><?php echo $total ?></td>
        </tr>
        <tr>
            <td><a href="adminPanel.php"><button class="btn btn-default"> Врати се </button></a></td>
        </tr>
    </table>
</div>

</body>
</html>