<?php 
    include_once 'inc/header.php';
    // Session::checkLogin();
?>

<div id="content" class="float_r">
    <h1>Contact</h1>
    <div class="content_half float_l">
       
        <div id="contact_form">
           <form method="post" name="contact" action="#">
                
                <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                <div class="cleaner h10"></div>
                <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                <div class="cleaner h10"></div>
                
                <label for="phone">Phone:</label> <input type="text" name="phone" id="phone" class="input_field" />
                <div class="cleaner h10"></div>

                <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                <div class="cleaner h10"></div>
                
                <input type="submit" class="submit_btn" name="submit" id="submit" value="Send" />
                
            </form>
        </div>
    </div>

    <div class="content_half float_r">
        <h5>Contact Us On :</h5>
        <br />
        <br />
        <br /><br />
                    
        Phone: +880 168 503 4907<br />
        Email: <a href="mailto:rafin84062@gmail.com">rafin84062@gmail.com</a><br/>
        
        <div class="cleaner h40"></div>
    
        Phone: +880 167 961 6561<br />
        Email: <a href="mailto:limon@gmail.com">limon@gmail.com</a><br/>
        <br />
     
    </div>

    <div class="cleaner h40"></div>
    <h5>Primary Office</h5>
        <br />
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.842557728006!2d90.38960821492229!3d23.752993194594275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a257bb11cd%3A0xbd52aeded6799b0b!2sAuto+Address4!5e0!3m2!1sen!2sbd!4v1534576397903" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <br />
        <br />
    <h5>Secondary Office</h5>
    <br />
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.412027074733!2d90.41042031492198!3d23.732682195369982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b858aa3c0b7d%3A0x9c52f7e8465da891!2sm.m+bd+center!5e0!3m2!1sen!2sbd!4v1534576595910" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
   
</div> 
<div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>