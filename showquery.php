<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 07.08.2016
 * Time: 23:17
 */


function showQ($id) //get number of subcategory entries
{
    require('dbconnect.php');
    $que='SELECT * FROM product WHERE product.categoryid="'.$id.'"';
    $result=mysqli_query($con,$que);
    $num=mysqli_num_rows($result);
    return $num;
}

function showQAll($first,$second) //get number of category entries
{
    $num=0;
    for($i = $first; $i<=$second; $i++)
    {
        $num+=showQ($i);
    }
    return $num;
}

function displayProducts($categoryId=1)
{
    require('dbconnect.php');
    $que='SELECT * FROM product WHERE product.categoryid="'.$categoryId.'"';
    $result=mysqli_query($con,$que);
    while($row=mysqli_fetch_array($result))
    {
        $id=$row['id'];
        $name=$row['name'];
        $desc=$row['description'];
        $price=$row['price'];
        $stock=$row['stock'];
        $desc=substr($desc,0,60);
        $html= <<<hh
                <li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.php?id=$id"><img src="themes/images/products/$id.jpg" alt="" width="160" height="160"  /></a>
					<div class="caption">
					  <h5>$name</h5>
					  <p>
						$desc ...
					  </p>
					  <p> <strong> Залиха: $stock </strong> </p>

					  <h4 style="text-align:center"> <a class="btn btnAddToCart" id=$id href="#">Додади <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$price мкд</a></h4>
					</div>
				  </div>
				</li>
hh;
        echo $html;
    }
}

function showCartItems($email)
{
    require('dbconnect.php');
    $query='SELECT cart.* FROM user,cart WHERE user.email="'.$email.'" AND cart.userid=user.id';
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    return $num;
}

function getAllCartItems($email)
{
    require('dbconnect.php');
    $query='SELECT product.* FROM user,cart,product WHERE user.email="'.$email.'" AND cart.userid=user.id AND cart.productid=product.id';
    $result=mysqli_query($con,$query);
    $array=array();
    while($row=mysqli_fetch_assoc($result))
    {
        $array[]=$row;
    }
    return $array;
}

function getTotalCartPrice($email)
{
    require('dbconnect.php');
    $query='SELECT product.* FROM user,cart,product WHERE user.email="'.$email.'" AND cart.userid=user.id AND cart.productid=product.id';
    $result=mysqli_query($con,$query);
    $total=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $total+=$row['price'];
    }
    return $total;
}

function deleteCartItemsOnCharge($email)
{
    require('dbconnect.php');
    $cartItems=getAllCartItems($email);
    $userId=$_SESSION['id'];
    foreach($cartItems as $items)
    {
        $productId=$items['id'];
        $deleteQuery='DELETE FROM cart WHERE userid="'.$userId.'" AND productid="'.$productId.'" LIMIT 1';
        mysqli_query($con,$deleteQuery);
        $updateQuery='UPDATE product SET stock=IF(stock > 0, stock - 1, 0) WHERE id="'.$productId.'"';
        mysqli_query($con,$updateQuery);
    }

}

function getProductDetails($id)
{
    require('dbconnect.php');
    $productId=$id;
    $detailsQuery='SELECT * FROM product WHERE id="'.$productId.'"';
    $q=mysqli_query($con,$detailsQuery);
    $result=mysqli_fetch_assoc($q);
    return $result;
}

function checkStockOnPayment($email,$userid)
{
    require('dbconnect.php');
    $returnString="Немате производи во кошницата!";
    $itemsInCart=getAllCartItems($email);
    foreach ($itemsInCart as $item)
    {
        $numItemInCart=showQtyOfItemsInCart($userid,$item['id']);
        if($item['stock']<$numItemInCart)
        {
            $returnString = "Неуспешно! ".$item['name']." на залиха ".$item['stock']." , а во кошница ".$numItemInCart."!";
            break;
        }
        else
        {
            $returnString = "Success";
        }
    }
    return $returnString;

}

function showQtyOfItemsInCart($userid,$productid)
{
    require('dbconnect.php');
    $qtyQuery='SELECT * FROM cart WHERE userid="'.$userid.'" AND productid="'.$productid.'"';
    $q=mysqli_query($con,$qtyQuery);
    $num=mysqli_num_rows($q);
    return $num;
}
?>
