<?php 
    $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/Session.php');
    Session::init();

    if (isset($_GET['action']) && $_GET['action'] == 'logout') 
    {
        Session::destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Automobile Sales System</title>
<link href="inc/css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="inc/css/nivo-slider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="inc/css/ddsmoothmenu.css" />

<script type="text/javascript" src="inc/js/jquery.min.js"></script>
<script type="text/javascript" src="inc/js/ddsmoothmenu.js"></script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1></h1></div>   
        
        <?php 
        
        $id = Session::get("id");
        
        $userlogin = Session::get("login");

        if ($userlogin != true) { ?>
        
            <div id="header_right">
            	<p>      
            		<strong> 
                        <a href="signup.php">Register</a>  | 
                        <a href="login.php">Log In</a> |
                        <a href="forgotpassword.php">Forgot Password</a>
                    </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </p>

    		</div> <?php
        }

        ?>


        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->
    
    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" <?php 
                    $path = basename($_SERVER['PHP_SELF']);
                    
                    if(basename($path,".php") == 'index')
                    {
                        echo "class='selected'";
                    }
                ?>
                >Home</a></li>

                <li><a href="about.php" <?php 
                    $path = basename($_SERVER['PHP_SELF']);
                    
                    if(basename($path,".php") == 'about')
                    {
                        echo "class='selected'";
                    }
                ?>
                >About Us</a></li>

<!-- 
                <li><a href="dealers.php" <?php 
                    $path = basename($_SERVER['PHP_SELF']);
                    
                    if(basename($path,".php") == 'dealers')
                    {
                        echo "class='selected'";
                    }
                ?>>Dealers</a></li>

 -->

                <li><a href="contact.php" <?php 
                    $path = basename($_SERVER['PHP_SELF']);
                    
                    if(basename($path,".php") == 'contact')
                    {
                        echo "class='selected'";
                    }
                ?>>Contact Us</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        
    </div> <!-- END of templatemo_menubar -->  


    <div id="templatemo_main">

    <?php include_once 'inc/sidebar.php'; ?>
