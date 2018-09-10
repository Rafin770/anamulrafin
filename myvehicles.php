<?php 

    include_once 'inc/header.php';
    Session::checkSession();

    include 'lib/Order.php';

    $order = new Order;

    if($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['cancel_order']))
    {
        $cancelOrder = $order->cancelOrder($_POST['tbl_order_id']);
    }

?>
      
<div id="content" class="float_r">

    <?php 
        if(isset($deliveryOrder))
        {
            echo $deliveryOrder;
        }

        if(isset($cancelOrder))
        {
            echo $cancelOrder;
        }

    ?>

    <h1>View Ordered vehicles</h1>
    <table width="468" border="1" color=black class="tftable">
        <tr>
            <th width="63" scope="col" align="center">&nbsp;No.</th>
            <th width="87" scope="col" align="center">&nbsp;Vehicle Comapny</th>       
            <th width="99" scope="col" align="center">&nbsp;Vehicle Model</th>
            <th width="78" scope="col" align="center">&nbsp;Vehicle Price</th>
            <th width="85" scope="col" align="center">&nbsp;Vehicle Image</th>
            <th width="88" scope="col" align="center">&nbsp;Delivered</th>
        </tr>

        <?php

        $getVehiclesByUser = $vehicle->getVehiclesByUser(Session::get('id'));
        if ($getVehiclesByUser) {
            $i = 0;
            foreach ($getVehiclesByUser as $value) {
                $i++; ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['company']; ?></td>
                    <td><?php echo $value['model']; ?></td>
                    <td><?php echo $value['price']; ?></td>
                    <td>
                        <img src="<?php echo $value['image']; ?>" alt="Image Missing" width="200px" height="100px" />
                    </td>
                    <td>
                        
                        <?php
                            if($value['delivered'] != 1)
                            {
                                echo '<h4>Pending</h4>';

                                ?>

                                <form action="" method="post">
                                    <input type="hidden" name="tbl_order_id" value="<?php echo $value['tbl_order_id']; ?>">
                                    <input type="submit" name="cancel_order" value="Cancel Order" onclick="return confirm('Are you sure to cancel this order?');">
                                </form>
                                

                                <?php


                            }
                            else
                            {
                                echo '<h4>Delivered</h4>';
                            }
                        ?>

                    </td>
                </tr> <?php

            }
        }
        else
        { ?>
            <tr>
                <td colspan="6" style="letter-spacing: 10px;">
                    <h2 style="text-align: center;">Vehicle Not Found</h2>
                </td>
            </tr> <?php
        }

        ?>
        
        

    </table>
</div> 
<div class="cleaner"></div>
        
<?php include_once 'inc/footer.php'; ?>