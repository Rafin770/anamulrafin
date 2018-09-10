<?php 

    include_once 'inc/header.php';
    Session::checkSession();

    include 'lib/Order.php';

    $order = new Order;

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delivery']))
    {
        $deliveryOrder = $order->deliveryOrder($_POST['tbl_order_id']);
    }

?>
      
<div id="content" class="float_r">

    <?php 
        if(isset($deliveryOrder))
        {
            echo $deliveryOrder;
        }
    ?>

    <h1>View Ordered vehicles</h1>
    <table width="468" border="1" color=black class="tftable">
        <tr>
            <th width="63" scope="col" align="center">&nbsp;No.</th>
            <th width="85" scope="col" align="center">&nbsp;Customer Email</th>
            <th width="87" scope="col" align="center">&nbsp;Vehicle Comapny</th>       
            <th width="99" scope="col" align="center">&nbsp;Vehicle Model</th>
            <th width="78" scope="col" align="center">&nbsp;Vehicle Price</th>
            <th width="88" scope="col" align="center">&nbsp;Delivered</th>
        </tr>
        
        <?php

        $getOrder = $order->getOrder();
        if ($getOrder) 
        {
            $i = 0;
            foreach ($getOrder as $order) 
            {
                $i++; ?>
                
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $order['email']; ?></td>
                    <td><?php echo $order['company']; ?></td>
                    <td><?php echo $order['model']; ?></td>
                    <td><?php echo $order['price']; ?></td>
                    <td>
                        
                        <?php

                        if($order['delivered'] != 0)
                        { ?>
                            <a href="vieworder.php">Delivered</a> <?php
                        }
                        else
                        { ?>

                            <form action="" method="post">
                                <input type="hidden" name="tbl_order_id" value="<?php echo $order['id']; ?>"/>
                                <input type="submit" name="delivery" value="Delivery" />
                            </form> 

                        <?php

                        }

                        ?>

                    </td> 
                </tr> <?php 

            }

        }

        ?>

    </table>
</div> 
<div class="cleaner"></div>
        
<?php include_once 'inc/footer.php'; ?>