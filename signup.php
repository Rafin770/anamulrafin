<?php 
    include_once 'inc/header.php';
    Session::checkLogin();

    include 'lib/User.php';
    
    $user = new User;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) 
    {
        $userRegistration = $user->userRegistration($_POST);
    }

?>

    <div id="content" class="float_r">
        
        <?php
            if(isset($userRegistration))
            {
                echo $userRegistration;
            }
        ?>

    	<h2>New Account</h2>
        <h5><strong>Please enter following details</strong></h5>
        <div class="content_half float_l checkout">
        
            <form action="" method="post">
                FIRST NAME:
                <input type="text" name="first_name" style="width:300px;" />
                <br /><br />

                
                LAST NAME:
    			<input type="text" name="last_name" style="width:300px;"/>            
                <br /><br />

                
                ADDRESS:
                <textarea name="address" name="address" rows="5" cols="35"></textarea>
                <br /><br />

                
                CITY:
                <input type="text" name="city" style="width:300px;" /> 
                <br /><br />
            
                
                PIN CODE:
                <input type="text" name="pincode"  style="width:300px;" />
                <br /><br />
			    
                
                COUNTRY:
                <select name="country" style="width:300px;"/>                
        			<option value="" selected>Choose your country</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="India">India</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="China">China</option>
                    <option value="U.S.A">U.S.A</option>
                </select>
                <br /><br />

        </div>
        
        <div class="content_half float_r checkout">
			
        Email Address:
        <input type="email" name="email" placeholder="name@example.com" style="width:300px;"  />
			
            <br />
            <br />

            PASSWORD:
            <input type="password" name="password" minlength="4" maxlength="6" size="6" style="width:300px;"  />
            
            
            <br /><br />
            

            Gender: <br/>
            <input type="radio" name="gender" value="Male" checked />   Male<br />
            <input type="radio" name="gender" value="Female" />  Female
             <br /><br />

            <br />
            CONTACT NO.
            <input type="number" style="width:300px;" name="cell"/>
        </div>
        
        <div class="cleaner h50"></div>

        <p><input type="submit" name="register" value="Register" class="submit_btn" /></p>
            </form>
            
            
            
            
            
            
            
		</div>                 
        <div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>
