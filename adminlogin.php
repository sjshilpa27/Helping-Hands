<?php session_start();
if (isset($_REQUEST['btn'])) {
    $user = $_REQUEST["un"];
    $pass = $_REQUEST["pw"];

        if($user=="xyz"&&$pw="pol")
    { 
     $_SESSION["ausername"]=$user;
       
       //echo $_SESSION["userid"];
        header("Location:aadmin.php");
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
    </head>
    <body>
        <form name="unpw" action="adminlogin.php">
        
        <table border="1">
           
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="un" value="" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pw" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Log In" name="btn" /></td>
                    
                </tr>
           
        </table>
        </form>
        

<a href='forgot.php?status='>Forgot Password</a>

    </body>
</html>
