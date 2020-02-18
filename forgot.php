<?php session_start();

if(isset($_REQUEST["btnsub"]))
{
    
$ans=$_REQUEST["txtans"];
$user=$_REQUEST["txtuser"];
$que=$_REQUEST["securityque"];
    $con = mysql_connect("localhost", "root", "") or die("Sorry cant connect");
 mysql_select_db("cc", $con);
    $sql = "Select security_que,cusername,security_ans from user where 
            security_ans='".$ans."' and security_que='".$que."' and 
            cusername='".$user."'";
   // echo $sql;
    $result = mysql_query($sql, $con);
    $row = mysql_fetch_array($result);
     if (mysql_affected_rows() > 0)
     {
          $_SESSION["username"] = $user; 
       header("Location:cpwlb.php"); 
       
       ?>

<?php
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
    <body><form action="forgot.php">
           
        <table>
              <tr>
                    <td>Username:</td>
                    <td><input type="text" name="txtuser" value="" /></td>
                </tr>
            <tr>
                        <td>Select your Security Question:</td>
                        <td><select name="securityque">
                                <option value="0">--Select--</option>
                                <option value="1">My favorite school teacher?</option>
                                <option value="2">My first Phone: </option>
                                <option value="3">My favorite Destination:</option>
                                <option value="4">My biggest dream:</option>
                                <option value="5">My Inspiration:</option>
                            </select><br>
            </tr>
            <tr>
                <td>Answer the security question:</td>
                <td><input type="text" name="txtans" value="" /></td>
                            
                    </tr>
                    <tr><td colspan="2"><input type="submit" value="Submit" name="btnsub"/></td></tr>
       
        </table>
        </form>
        
    </body>      
</html>
