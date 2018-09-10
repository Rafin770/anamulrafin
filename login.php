<?php 
    include_once 'inc/header.php';
    Session::checkLogin();

    include 'lib/User.php';
    
    $user = new User;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) 
    {
        $userLogin = $user->userLogin($_POST);
    }
?>


<div id="content" class="float_r">

    <?php 
        if (isset($userLogin)) 
        {
            echo $userLogin;
        }
    ?>

	<h2>Login Panel</h2>
    <h5><strong>Please enter Username and password to login..</strong></h5>
    <div class="content_half float_l checkout">
    
        <form action="" method="post">         

            <table width="562" height="181" border=0 color=black class="tftable">

                <tr>
                    <th height="47"><strong>EMAIL:</strong></th>
                    <td><input name="email" type="email" size="45"></td>
                </tr>

                <tr>
                    <th height="50"><strong>PASSWORD:</strong></th>
                    <td><input name="password" type="password" size="45"></td>
                </tr>


                <tr >
                    <td colspan=2 >
                        <center>
                            <input type="submit" name="login" value="LOGIN" />
                        </center>
                    </td>
                </tr>

                <tr >
                    <td colspan=2 align="center" ><a rel="nofollow" href="forgotpassword.php"><strong>Forgot your password?</strong></a>
                    </td>
                </tr>


            </table>

            <p><a href="signup.php"><img src="inc/images/new user.jpg" width="561" height="96" border="3" /></a></p>

        </form>
    </div>
    
    <div class="content_half float_r checkout"></div>
    
    <div class="cleaner h50"></div>
</div> 

<div class="cleaner"></div>


<?php 
    include_once 'inc/footer.php';
?>
