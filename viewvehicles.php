<?php 
    include_once 'inc/header.php';
    Session::checkSession();

    include 'lib/Vehicle.php';

    $vehicle = new Vehicle;

    if (isset($_GET['action']) && $_GET['action'] == 'delete') 
    {
        $deleteVehicle = $vehicle->deleteVehicle($_GET['id']);
    }

?>

      
<div id="content" class="float_r">

    <?php 
        if(isset($deleteVehicle))
        {
            echo $deleteVehicle;
        }
    ?>

    <h1>View vehicles</h1>
    <table width="468" border="1" color=black class="tftable">
        <tr>
            <th width="5" scope="col" align="center">&nbsp;No</th>
            <th width="80" scope="col" align="center">&nbsp;Vehicle Name</th>
            <th width="70" scope="col" align="center">&nbsp;Model</th>       
            <th width="40" scope="col" align="center">&nbsp;Price</th>
            <th width="78" scope="col" align="center">&nbsp;Image</th>
            <th width="63" scope="col" align="center">&nbsp; Action</th>
        </tr>

        <?php

        $getVehicle = $vehicle->getVehicle();
        if ($getVehicle) {
            $i = 0;
            foreach ($getVehicle as $value) {
                $i++; ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['model']; ?></td>
                    <td><?php echo $value['price']; ?></td>
                    <td>
                        <img src="<?php echo $value['image']; ?>" alt="Image Missing" width="200px" height="100px" />
                    </td>
                    <td>
                        <a href="detailsvehicle.php?id=<?php echo $value['id']; ?>">
                        Edit</a> || 
                        <a href="?action=delete&id=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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