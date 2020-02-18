<?php session_start();
   
    

// put your code here
if (isset($_REQUEST["btnsave"])) {

    $name = $_REQUEST["txtname"];
    $profession = $_REQUEST["txtpro"];
    $dob = $_REQUEST["txtdob"];
    $gender = $_REQUEST["gender"];
    $address = $_REQUEST["txtadd"];
    $landmark = $_REQUEST["txtlm"];
    $city = $_REQUEST["txtcity"];
    $state = $_REQUEST["txtstate"];
    $aadhar = $_REQUEST["txtaadhar"];
    $contact = $_REQUEST["txtmobile"];
    $email = $_REQUEST["txtemail"];
    $pass = $_REQUEST["txtpw"];
    $user = $_REQUEST["txtuser"];
    $confirmpass = $_REQUEST["txtcpw"];
    $id=$_REQUEST["txtuid"];
  $security=$_REQUEST["securityque"];
                    $sec_ans=$_REQUEST["txtans"];
    if ($pass == $confirmpass && $pass!="") {

        $con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
        mysql_select_db("cc", $con);

        
        
        
        $qry = "INSERT INTO user (cid,cname,cdob,cgender,cprofession,caddress,clandmark,"
                . "ccity,cstate,caadhar,ccontact,cemail,cusername,cpassword,"
                . "security_que,security_ans) "
                . "VALUES('" . $id. "','" . $name . "','" . $dob . "','" . $gender ."','" 
                . $profession . "','" . $address . "','" . $landmark . "','" . $city . "','"
                . $state . "','". $aadhar . "','" . $contact . "','" . $email . "',"
                . "'" . $user . "','" . $pass . "','".$security."','".$sec_ans."')";
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
        <title>user Registration</title>

    </head>
    <body>
        <form name="registration" action="registration.php" method="POST" enctype="multipart/form-data">
            <table border="1">

                   <tr>
                    <td>UserId:</td>
                    <td><input type="text" name="txtuid" readonly value="us<?php      $con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
        mysql_select_db("cc", $con);
$qry1="SELECT MAX(CAST(SUBSTRING(cid,3) AS unsigned)) AS maxid FROM user";
        mysql_query($qry1, $con);
   //     echo $qry1;
               $result=mysql_query($qry1,$con);
             $row = mysql_fetch_array($result);
        $id=$row["maxid"]+1;
  echo $id ?>" /></td>
                </tr>




                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="txtname" required value="" /></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="txtuser" value="" /></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type="email" name="txtemail" value="" /></td>
                </tr>
                <tr>
                    <td>Profession:</td>
                    <td><input type="text" name="txtpro" value="" /></td>
                </tr>
                <tr>
                    <td>DOB:</td>
                    <td><input type="date" name="txtdob" value="" /></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><input type="radio" name="gender" value="Female" checked="checked" />Female
                        <input type="radio" name="gender" value="Male" />Male</td>
                </tr>
                <tr>
                    <td>Aadhar Card No:</td>
                    <td><input type="text" name="txtaadhar" value="" /></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><select name="txtcity">
                            <option value="">--select--</option>
<?php
$con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
mysql_select_db("cc", $con);
$qry = "Select  * from city";
$result = mysql_query($qry, $con);
while ($row = mysql_fetch_array($result)) {
    echo "<option value=" . $row[cityno] . ">" . $row[1] . "</option>";
}
?>

                        </select></td>
                </tr>
                <tr>
                    <td>Landmark:</td>
                    <td><input type="text" name="txtlm" value="" /></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><select name="txtstate">
                            <option value="">--select--</option>
                            <?php
$con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
mysql_select_db("cc", $con);
$qry = "Select  * from state";
$result = mysql_query($qry, $con);
while ($row = mysql_fetch_array($result)) {
    echo "<option value=" . $row[csno] . ">" . $row[1] . "</option>";
}

?>

                        </select></td>
                </tr>


                <tr>
                    <td>Address:</td>
                    <td><textarea name="txtadd" rows="4" cols="20">
                        </textarea></td>
                </tr>
                <tr>
                    <td>Mobile No:</td>
                    <td><input type="text" name="txtmobile" value="" /></td>
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
                    <td>Captcha:</td>
                    <td><img src="images"/>
                    </td>
                </tr>
                <tr>
                    <td>Captcha:</td>
                    <td><input type="text" name="txtcap" value=""/>
                    </td>
                </tr>



                    <tr>
                        <td>Security Question:</td>
                        <td><select name="securityque">
                                <option value="0">--Select--</option>
                                <option value="1">My favorite school teacher?</option>
                                <option value="2">My first Phone: </option>
                                <option value="3">My favorite Destination:</option>
                                <option value="4">My biggest dream:</option>
                                <option value="5">My Inspiration:</option>
                            </select><br>
                            <input type="text" name="txtans" value="" /></td>
                            
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