<?php session_start();

if(isset($_SESSION["ausername"]))
{
echo  $_SESSION["ausername"];
$con=mysql_connect("localhost", "root","") or die("cant connect");
        mysql_select_db("cc", $con);
       $qry="SELECT * FROM user";
       $result= mysql_query($qry,$con);
       echo $qry;
         echo "<table border='2'>";
   echo "<tr>
<td>Username</td>
<td>Name</td>
<td>Profession</td>
<td>Address</td>
<td>Aadhar no</td>
<td>Contact No:</td>   
<td>Email</td>
<td>Profile Picture</td>

<td>Delete</td>
</tr>";

         while($row = mysql_fetch_array($result))
         {         echo "<tr>
            <td>".$row['cusername']."</td>
            <td>".$row['cname']."</td>
            <td>".$row['cprofession']."</td>
            <td>".$row['caddress']."</td>
            <td>".$row['ccontact']."</td>
                 <td>".$row['cemail']."</td>


<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
            
              <td> <a href='manageacc.php?id=".$row["cid"]."&status=delete'>Delete</td>
   
</tr>"  ;    
    }
    echo "</table>";


if(isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
    
{
    if($_REQUEST["status"]=="delete")
    
    {   $con=mysql_connect("localhost", "root","") or die("cant connect");
        mysql_select_db("cc", $con);
        $qry="DELETE FROM user where cid='".$_REQUEST["id"]."'";
        echo $qry;
    if(mysql_query($qry, $con))
    {
        echo "<h1>Record deleted successfully</h1>";
        
    }
 else {
        echo "Error".  mysql_error();    
    }
                
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
        <?php
        // put your code here
        ?>
    </body>
</html>
    <?php
}
 else {
    header('Location:adminlogin.php');
}

?>
