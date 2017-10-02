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

$cartItems = getAllCartItems($_SESSION['email']);

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
    <h3 class="productsOverviewTitle">Преглед на продуктите</h3><br/>
    <div class="productsOverview">
        <table>
        <?php 
            foreach($cartItems as $item){ ?>
                <tr>
                    <td><?php echo $item['name']?></td>
                    <td><?php echo $item['price']?> мкд</td>
                </tr>
        <?php } ?>
            <tr>
                <td><a href="product_summary.php"><button class="btn btn-default"> Врати се </button></a></td>
                <td>
                    <form action="charge_successful.php" method="POST" class="payForm">
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="<?php echo $stripe_publicKey ?>"
                            data-amount="<?php echo getTotalCartPrice($_SESSION['email'])*100  ?>"
                            data-name="Online IT Store"
                            data-label="Плати"
                            data-email="<?php echo $_SESSION['email'] ?>"
                            data-description="
                            <?php

                                foreach($cartItems as $item)
                                {
                                    echo $item['name'];
                                    echo ", \r\n";
                                }

                            ?>"
                            data-currency="MKD"
                            data-locale="auto">
                        </script>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    </body>
</html>