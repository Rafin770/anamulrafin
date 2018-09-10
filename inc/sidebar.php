<div id="sidebar" class="float_l">
    
    <?php 

    include 'lib/Vehicle.php';

    $vehicle = new Vehicle;
        
    $id = Session::get("id");
    
    $userlogin = Session::get("login");

    if ($userlogin == true) { ?>

        <div class="sidebar_box"><span class="bottom"></span>
            <h3>Customer account</h3>   
            <div class="content"> 
                <ul class="sidebar_list">
                    <li class="first"><a href="dashboard.php">My Account</a></li>
                    <li><a href='profile.php'>My Profile</a></li>


                    <?php

                    if(Session::get('type') != 3)
                    { ?>
                        <li><a href='viewvehicles.php'>View Vehicles</a></li>
                        <li><a href='addvehicle.php'>Add Vehicle</a></li>
                        <li><a href='vieworder.php'>Vehicle Order Report</a></li> 
                        <li><a href='salesreport.php'>Seles Report</a></li> <?php
                    }

                    ?>


                    <li><a href='myvehicles.php'>My Vehicles</a></li>
                    <!-- <li><a href='changepassword.php'>Change Password</a></li> -->
                    <li class="last"><a href="?action=logout">Logout</a></li>
                </ul>
            </div>
        </div> <?php 
    }
    ?>

    <div class="sidebar_box"><span class="bottom"></span>
        <h3>Vehicles list</h3>   
        <div class="content"> 
            <ul class="sidebar_list">

            <li class="first">
                <a href="#"></a>
            </li>

            <?php

            $getVehicle = $vehicle->getVehicle();
            if ($getVehicle) {
                foreach ($getVehicle as $value) { ?>

                <li>
                    <a href="showvehicle.php?id=<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?>
                    </a>
                </li> <?php

               }
            }

            ?>

            </ul>
        </div>
    </div>
    
</div>
