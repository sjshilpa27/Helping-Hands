<?php session_start();
if (isset($_REQUEST['btn'])) {
    $user = $_REQUEST["un"];
    $pass = $_REQUEST["pw"];
    $con = mysql_connect("localhost", "root", "") or die("Sorry cant connect");
    mysql_select_db("cc", $con);
    $sql = "Select * from user where cusername='" . $user . "' and cpassword='" . $pass . "'";
    $result = mysql_query($sql, $con);
    $row = mysql_fetch_array($result);
    if (mysql_affected_rows() > 0) {
        $_SESSION["username"] = $user;
        $_SESSION["userid"] = $row["cid"];
       echo $_SESSION["userid"];
        header("Location:userhomepg.php");
    } else {
        echo "Check your username and password";
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            
            .tables
            {
                cellspacing:0;
                cellpadding:0;
                border-image:cross-fade;
            }
            
            
        </style>
    </head>
    <body>
        
        <form name="unpw" action="login.php">
        
            <table border="0" class="tables">
           
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="un" value="" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pw" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Log In" name="btn" /></td>
                    
                </tr>
           
        </table>
        </form>
        
        <a href='registration.php?status='>Register</a><br>
<a href='forgot.php?status='>Forgot Password</a>


    </body>
</html>
