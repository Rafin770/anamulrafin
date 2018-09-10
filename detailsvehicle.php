<?php 
	include_once 'inc/header.php';
    Session::checkSession();

    include 'lib/Vehicle.php';

    $vehicle = new Vehicle;

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateVehicle'])) 
    {
        $updateVehicle = $vehicle->updateVehicle($_POST, $_FILES, $_GET['id']);
    }

?>

<div id="content" class="float_r">
    
    <?php 
        if(isset($addVehicle))
        {
            echo $addVehicle;
        }
    ?>
    
    <h1>Add Vehicle</h1>

    <div class="cleaner"></div>
    <div class="cleaner"></div>
    
    
    <form action="" method="post" enctype="multipart/form-data">

        <table width="516" height="522" border="1" color="black" class="tftable">

            <?php 

            if(isset($_GET['id']))
            {
                $detailsVehicle = $vehicle->detailsVehicle($_GET['id']);
                foreach ($detailsVehicle as $value) { ?>
            

                    <tr>
                        <th width="160">NAME:</th>
                        <td width="254"><input type="text" name="name" value="<?php echo $value['name']; ?>" /></td>
                    </tr>

                    <tr>
                        <th>MODEL:</th>
                        <td><input type="text" name="model" value="<?php echo $value['model']; ?>" /></td>
                    </tr>

                    <tr>
                        <th>TYPE:</th>
                        <td><input type="text" name="type" value="<?php echo $value['type']; ?>" /></td>
                    </tr>

                    <tr>
                        <th>COMPANY:</th>
                        <td><input type="text" name="company" value="<?php echo $value['company']; ?>" /></td>
                    </tr>

                    <tr>
                        <th>DESCRIPTION:</th>
                        <td>
                            <textarea name="description" rows='5' cols='70'><?php echo $value['description']; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>PRICE:</th>
                        <td><input type="text" name="price" value="<?php echo $value['price']; ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th>IMAGE:</th>
                        <td>
                            <img src="<?php echo $value['image']; ?>" alt="Image Missing" width="500px" height="200px" /> <br/>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    
                <?php } } ?>

            <tr>
                <td colspan=2 >
                    <center><input type="submit" value="Update Vehicle" name="updateVehicle"></center>
                </td>
            </tr>

        </table>

    </form>

    <div class="cleaner"></div>    

</div> 
<div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>