<?php session_start();
if (isset($_REQUEST["btnsave"])) {
    $pass = $_REQUEST["txtpw"];
    $confirmpass = $_REQUEST["txtcpw"];
  $usern=$_SESSION["username"];
      if ($pass == $confirmpass && $pass!="") {
    $con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
        mysql_select_db("cc", $con);
      
        $qry="UPDATE user set cpassword='$pass' WHERE cusername='".$usern."'";
          echo $qry;
        mysql_query($qry, $con);
        
        echo "Data Saved!";
            
    } else {
        echo"Password and Confirm Password did not match!";
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
        <form action = "cpw.php">
            <table border="1">
                 <tr>
                        <td>Username:</td>
                        <td><?php echo $_SESSION["username"] ;
                             ?>
                             </td>
                    </tr>
                    <tr>
                    <td>Password:</td>
                    <td><input type="password" name="txtpw" value="" /></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td> 
                    <td><input type="password" name="txtcpw" value="" /></td>
                </tr>
                     <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="formbutton" name="btnsave" value="SAVE">
                    </td>
                </tr>




       </table>

        </form>
    </body>
</html>
