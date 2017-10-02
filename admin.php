<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 07.09.2016
 * Time: 17:07
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link id="callCss" rel="stylesheet" href="themes/onlineitstore/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <title>Admin Login</title>
</head>
<body>
<h3 class="productsOverviewTitle">Најава за админ</h3><br/>
<div class="productsOverview">
    <form action="adminPanel.php" method="POST">
        <table>
            <tr>

                <td class="table_data_right">Корисничко име: <input type="text" name="adminUser"  required></td>
            </tr>
            <tr>

                <td class="table_data_right">Лозинка: <input type="password" name="adminPass" width="60px" required></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="btn btn-default btn-test" value="Најава">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>