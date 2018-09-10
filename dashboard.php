<?php 
    include_once 'inc/header.php';
    Session::checkSession();

    include 'lib/User.php';

    $user = new User;

?>

<div id="content" class="float_r">
    
    <?php

    $loginmsg = Session::get("loginmsg");
    if (isset($loginmsg)) 
    {
        echo $loginmsg;
    }
    Session::set("loginmsg", NULL);

    ?>
    
    <h1>My Account</h1>

    <div class="cleaner"></div>
    <div class="cleaner"></div>
    
    <blockquote>
        <b>Welcome</b> 
        <?php echo Session::get('first_name').' '.Session::get('last_name'); ?>
    </blockquote>

    <div class="cleaner"></div>    
    
    <?php

        $id = Session::get("id");
        $getUserById = $user->getUserById($id);
        if ($getUserById) { ?>

            <blockquote>
                <strong>Account details:</strong> <br>
                Name:  <?php echo $getUserById->first_name .' '. $getUserById->last_name; ?>
                <br><br>
                <strong>Contact details:</strong><br> 
                Address:  <?php echo $getUserById->address; ?><br>

                City -  <?php echo $getUserById->city; ?><br>
                Country - <?php echo $getUserById->country; ?><br>
                PIN Code -  <?php echo $getUserById->pincode; ?><br><br>
                <strong>Email: </strong> <?php echo $getUserById->email; ?><br>
            </blockquote>      <?php 
        } 

    ?> 

        <div class="cleaner"></div>
        <blockquote> No. of vehicles booked : 0 </blockquote>

</div> 
<div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>
