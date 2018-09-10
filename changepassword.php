<?php 
    include_once 'inc/header.php';
    Session::checkSession();
?>


<div id="content" class="float_r">
    <h1>Change password</h1> 
    <form name="changepasswrd" method="post" action="" onsubmit="return validation()">

        <table width="422" height="228" border=1 color=black class="tftable">

            <tr>
                <th>&nbsp; Login ID:</th><td><input type=text name="emailid" value="salman@gmail.com" readonly></th>
            </tr>

            <tr>
                <th>&nbsp; Old Password: </th><td><input type=password name=opassword ></th>
            </tr>

            <tr>
                <th>&nbsp; New Password: </th><td><input type=password name=npassword ></td>
            </tr>

            <tr>
                <th>&nbsp; Confirm Password: </th><td><input type=password name=cpassword ></td>
            </tr>

            <tr >
                <td colspan=2 align="center" ><input type=submit value=CHANGE PASSWORD name=submit></td>
            </tr>

        </table>

    </form>
</div> 
<div class="cleaner"></div>

<?php include_once 'inc/footer.php'; ?>