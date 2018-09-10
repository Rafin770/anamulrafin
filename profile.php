<?php 
    include_once 'inc/header.php';
    Session::checkSession();

    include 'lib/User.php';

    $user = new User;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) 
    {
        $id = Session::get('id');
        $updateUserData = $user->updateUserData($id, $_POST);
    }

?>


<div id="content" class="float_r">
	<h1>My Profile</h1>

    <?php 
        if(isset($updateUserData))
        {
            echo $updateUserData;
        }
    ?>

    <form action="" method="post">

        <table width="516" height="522" border=1 color=black class="tftable">

            <?php

            $id = Session::get("id");
            $getUserById = $user->getUserById($id);
            if ($getUserById) { ?>
    	
                <tr>
                    <th width="160">FIRSTNAME:</th>
                    <td width="254"><input type="text" name="first_name" value="<?php echo $getUserById->first_name; ?>">
                    </td>
                </tr>

                <tr>
                    <th>LASTNAME:</th>
                    <td><input type="text" name="last_name" value="<?php echo $getUserById->last_name; ?>">
                    </td>
                </tr>

                <tr>
                    <th>EMAIL:</th>
                    <td><input type="email" value="<?php echo $getUserById->email; ?>" readonly></td>
                </tr>

                <tr>
                    <th>CELL:</th>
                    <td><input type="text" name="cell" value="<?php echo $getUserById->cell; ?>"></td>
                </tr>

                <tr>
                    <th>ADDRESS:</th>
                    <td>
                        <textarea name="address" rows='5' cols='30'><?php echo $getUserById->address; ?></textarea></td>
                </tr>

                <tr>
                    <th>CITY:</th>
                    <td><input type="text" name="city" value="<?php echo $getUserById->city; ?>"></td>
                </tr>
                
                <tr>
                    <th>COUNTRY:</th>
                    <td><input type="text" name="country" value="<?php echo $getUserById->country; ?>"></td>
                </tr>


                <tr>
                    <th>PINCODE:</th>
                    <td><input type="number" name="pincode" value="<?php echo $getUserById->pincode; ?>"></td>
                </tr>   <?php
            }

            ?>

            <tr>
                <td colspan=2 >
                    <center><input type="submit" value="Update" name="update"></center>
                </td>
            </tr>

        </table>

    </form>

</div>

<div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>