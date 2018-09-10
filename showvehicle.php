<?php
    include_once 'inc/header.php';

    include 'lib/Order.php';

    $order = new Order;

    if(isset($_POST['order']))
    {
        $makeOrder = $order->makeOrder($_POST['vehicle_id']);
    }

?>

    <div id="content" class="float_r">

        <?php 

        if(isset($makeOrder))
        {
            echo $makeOrder;
        }


        if(isset($_GET['id']))
        {
            $detailsVehicle = $vehicle->detailsVehicle($_GET['id']);
            foreach ($detailsVehicle as $value) { ?>
        
                <h1><?php echo $value['name']; ?></h1>
             
                <div class="content_half float_l">
                    <img src="<?php echo $value['image']; ?>" alt="Image Missing" width="300px" height="130px"/>
                </div>
                <div class="content_half float_r">
                    <table>
                        <tr>
                            <td width="160">Price:</td>
                            <td><?php echo $value['price']; ?></td>
                        </tr>
                        <tr>
                            <td>type:</td>
                            <td><?php echo $value['type']; ?></td>
                        </tr>
                        <tr>
                            <td>Model:</td>
                            <td><?php echo $value['model']; ?></td>
                        </tr>
                        <tr>
                            <td>Company:</td>
                            <td><?php echo $value['company']; ?></td>
                        </tr>
                    </table>
                    <div class="cleaner h20"></div>

                    <!-- <a href="#" class="addtocart"></a> -->
                    
                    <form action="" method="post">
                        <input type="hidden" name="vehicle_id" value="<?php echo $_GET['id']; ?>">
                        <input type="submit" name="order" value="Order">
                    </form>


                </div>
                <div class="cleaner h30"></div>
                  
                <h5>Vehicle Description</h5>
                <p><?php echo $value['description']; ?></p>
                <div class="cleaner h50"></div> <?php
            }

        }

        ?>

    </div>

    

    <div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>