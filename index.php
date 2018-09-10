<?php 
    include_once 'inc/header.php';

    include 'lib/User.php';

    $user = new User;

    include 'lib/Vehicle.php';

    $vehicle = new Vehicle;


?>


<div id="content" class="float_r">
	<div id="slider-wrapper">
        <div id="slider" class="nivoSlider">
            <img src="inc/images/slider/car1.gif" alt="" />
            <a href="#"><img src="inc/images/slider/car2.jpg" alt="" title="Best-In-Class Highway Fuel Economy" /></a>
            <img src="inc/images/slider/car3.jpg" alt="" />
            <img src="inc/images/slider/car4.jpg" alt="" title="#htmlcaption" />
        </div>
        <div id="htmlcaption" class="nivo-html-caption">
            <strong>User friendly advanced technology</strong>
        </div>
    </div>
    <script type="text/javascript" src="inc/js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="inc/js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
    </script>


	<h1>New Vehicles</h1>

    <?php 

    $getVehicle = $vehicle->getVehicle();
    if ($getVehicle) {
        foreach ($getVehicle as $value) { ?>
    
            <div class='product_box'>            
                <h3><?php echo $value['name']; ?></h3>
            	<a href="showvehicle.php?id=<?php echo $value['id']; ?>">
                    <img src="<?php echo $value['image']; ?>" alt="Image Missing" width="200px" height="150px" />
                </a>
                <p>Model: <?php echo $value['model']; ?></p>
                <p>Type: <?php echo $value['type']; ?></p>
                <p class="product_price">Tk: <?php echo $value['price']; ?></p>
            </div> <?php

        }
    }

    ?>


    <div class="cleaner"></div>
</div> 
<div class="cleaner"></div>


<?php include_once 'inc/footer.php'; ?>