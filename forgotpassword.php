<?php 
    include_once 'inc/header.php';
    Session::checkLogin();
?>


<div id="content" class="float_r">
    <h1>FORGOT PASSWORD</h1>
    <form name="forgotpassword" method="post" action="" onsubmit="return validation()">
        <table width="422" height="98" border=1 color=black class="tftable">
            <tr>
                <th height="35"> Enter your Email ID </th><td><input type=email name=email ></td>
            </tr>
            <tr>
                <td height="55" colspan=2 align="center" ><input type=submit value="Recover password" name=submit></td>
            </tr>
        </table>
    </form>
</div> 
<div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>
