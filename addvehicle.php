<?php 
	include_once 'inc/header.php'; 
    include 'lib/Vehicle.php';

    $vehicle = new Vehicle;

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addVehicle'])) 
    {
        $addVehicle = $vehicle->addVehicle($_POST, $_FILES);
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

            <tr>
                <th width="160">NAME:</th>
                <td width="254"><input type="text" name="name" /></td>
            </tr>

            <tr>
                <th>MODEL:</th>
                <td><input type="text" name="model" /></td>
            </tr>

            <tr>
                <th>TYPE:</th>
                <td><input type="text" name="type" /></td>
            </tr>

            <tr>
                <th>COMPANY:</th>
                <td><input type="text" name="company" /></td>
            </tr>

            <tr>
                <th>DESCRIPTION:</th>
                <td>
                    <textarea name="description" rows='5' cols='30'></textarea>
                </td>
            </tr>

            <tr>
                <th>PRICE:</th>
                <td><input type="text" name="price" /></td>
            </tr>
            
            <tr>
                <th>IMAGE:</th>
                <td><input type="file" name="image" /></td>
            </tr>

            <tr>
                <td colspan=2 >
                    <center><input type="submit" value="Add Vehicle" name="addVehicle"></center>
                </td>
            </tr>

        </table>

    </form>

    <div class="cleaner"></div>    

</div> 
<div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>