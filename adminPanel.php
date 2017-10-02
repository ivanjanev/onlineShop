<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 07.09.2016
 * Time: 17:11
 */
session_start();
require('dbconnect.php');
require('Reporting.php');
if(isset($_POST['adminUser'])&&!empty($_POST['adminUser']))
{
    $adminUser=$_POST['adminUser'];
    $adminPass=$_POST['adminPass'];
    $crypt = crypt($adminPass,'dIiDb');
    $checkQ='SELECT * FROM user WHERE name="'.$adminUser.'" AND password="'.$crypt.'" AND admin=1';
    $result=mysqli_query($con,$checkQ);
    if(mysqli_num_rows($result)==0)
    {
        $message = "Немате админски привилегии";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0.01; URL=admin.php');
        die();
    }
}
if(isset($_GET['sct'])&&!empty($_GET['sct']))
{
    $date=$_GET['sct'];
    $total=0;
    $sql = 'SELECT user.name,sales.price,product.name AS pname FROM user,sales,product WHERE sales.dateStamp="'.$date.'" AND sales.userId=user.id AND product.id=sales.productId';
    $resultat=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($resultat))
    {
        echo "Корисник: ".$row['name']." Производ: ".$row['pname']." Цена: ".$row['price']."<br/>";
        $total+=$row['price'];
    }
    echo $total;
}
if(isset($_FILES)&&!empty($_FILES)&&isset($_POST['name'])&&!empty($_POST['name'])&&isset($_POST['description'])&&!empty($_POST['description'])
&&isset($_POST['price'])&&!empty($_POST['price'])&&isset($_POST['stock'])&&!empty($_POST['stock'])&&isset($_POST['categoryId'])&&!empty($_POST['categoryId']))
{
    $name=$_POST['name'];
    $desc=$_POST['description'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $catId=$_POST['categoryId'];

    $targetDir1="themes/images/products/";
    $targetDir2="themes/images/products/large/";
    $targetFileName=$targetDir1.basename($_FILES['fileUpload']['name']);
    $targetFileName1=$targetDir2.basename($_FILES['fileUpload']['name']);
    $uploadOK=1;
    $imageFileType=pathinfo($targetFileName,PATHINFO_EXTENSION);

    //check if price and stock are numbers
    if(testIntOrDec($price)&&testIntOrDec($stock))
    {
        $uploadOK=1;
    }
    else
    {
        $uploadOK=0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
    {
        echo "Дозволени се само .jpg, .png, .jpeg формати за слика.";
        $uploadOK = 0;
    }

    if ($uploadOK == 0)
    {
        echo "Имаше проблем при додавање на сликата.";
    // if everything is ok, try to upload file
    }
    else
    {
        $targetFileName=$targetDir1.mysqli_insert_id($con).".".$imageFileType;
        $targetFileName1=$targetDir2.mysqli_insert_id($con).".".$imageFileType;
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFileName))
        {
            echo "Продуктот е внесен во базата.";
            copy($targetFileName,$targetFileName1);
            $insertQ="INSERT INTO product(name,description,price,stock,categoryId) VALUES('$name','$desc','$price','$stock','$catId')";
            $rez=mysqli_query($con,$insertQ);
        }
        else
        {
            echo "Имаше проблем при додавање на продукт.";
        }
    }
}

if(isset($_GET['sctDelete'])&&!empty($_GET['sctDelete']))
{
    $id=$_GET['sctDelete'];
    $deleteQ='DELETE FROM product WHERE id ="'.$id.'"';
    mysqli_query($con,$deleteQ);
    $path1="themes/images/products/".$id;
    $path2="themes/images/products/large/".$id;
    if(file_exists($path1.".jpg"))
    {
        unlink($path1.".jpg");
        unlink($path2.".jpg");
    }
    if(file_exists($path1.".jpeg"))
    {
        unlink($path1.".jpeg");
        unlink($path2.".jpeg");
    }
    if(file_exists($path1.".png"))
    {
        unlink($path1.".png");
        unlink($path2.".png");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AdminPanel</title>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <link href="themes/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="themes/js/jquery.js"></script>
</head>
<body>
    <div class="adminPage">
        <div class="generateReport">
            <h3>Генерирање извештај</h3>
            <form action="" method="GET">
                <table>
                    <tr>
                        <td>
                            <select name="sct" class="adminText">
                                <?php
                                $arr=getAvailableDates();
                                foreach ($arr as $a)
                                {
                                    echo "<option value='".$a['Date']."'>".$a['Date']."</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="submit" value="Генерирај извештај" class="adminBtn">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="addProduct">
            <h3>Додавање продукт</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Внесете име" required class="adminText">
                        </td>
                        <td>
                            <input type="text" name="description" placeholder="Внесете опис" required class="adminText">
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Внесете цена" required class="adminText">
                        </td>
                        <td>
                            <input type="text" name="stock" placeholder="Внесете залиха(цел број)" required class="adminText">
                        </td>
                        <td>
                            <select name="categoryId" class="adminText">
                                <?php
                                $cat=getAvailableCategories();
                                foreach($cat as $c)
                                {
                                    echo "<option value='".$c['id']."'>".$c['name']."</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <label class="adminBtn">
                                <input type="file" name="fileUpload" id="file-upload">
                                <i class="fa fa-upload" aria-hidden="true"></i> Додади слика
                            </label>
                            <span id="addedPic"></span>
                        </td>
                    </tr>
                </table><br/>
                <input type="submit" value="Додади продукт" class="adminBtn">
            </form>
        </div>
        <div class="deleteProduct">
            <h3>Бришење продукт</h3>
            <form action="" method="GET">
                <table>
                    <tr>
                        <td>
                            <select name="sctDelete" class="adminText">
                                <?php
                                $sctArray=getAvailableProducts();
                                foreach($sctArray as $sct)
                                {
                                    echo "<option value='".$sct['id']."'>".$sct['name']."</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="submit" value="Избриши продукт" class="adminBtn">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="themes/js/scripts.js"></script>
</body>
</html>