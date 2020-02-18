<?php
if(isset($_REQUEST["btnsearch"]))
{
    
    $type=$_REQUEST["txtype"];
    $cat=$_REQUEST["txtcat"];
   // $cat=$_REQUEST["pcat"];
    $con=mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
  //  echo "Code".$pcode;
    //echo "Cat".$cat;
    if($type!="" && $cat=="")
    {
    $qry="SELECT * FROM cloth WHERE cname LIKE '%".$type."%'";
    echo $qry;
    }
    else if($type=="" && $cat!="")
    {
    $qry="SELECT * FROM cloth WHERE cgenre=  '".$genre."%'";
        echo $qry;
    }    
    else
    {
        echo "Enter some value in the field";
       $qry="";    
        }
if($qry!="")
{
        $result= mysql_query($qry,$con);
 echo "<table border='2'>";
 echo "<tr>
   <td>Type</td>
 <td> Category</td>
  <td>size</td>
  <td>mrp</td>
  <td>Description</td>
<td>Photo</td>
  </tr>";
     while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table$row[0]; and so on
     //   if($row[0]==$pcode && $row[1]!=$pname && $row[3]!=$pcat)
        
        echo "<tr>
            <td>".$row['ctype']."</td> 
                
            <td>".$row['ccat']."</td>
            <td>".$row['csize']."</td>
                <td>".$row['cmrp']."</td>
            <td>".$row['cdes']."</td>
            
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
    
</tr>";     
     }

   echo "</table>";
}
}    
    

if(isset($_REQUEST["btnshow"]))
{
        $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    $qry="SELECT * FROM cloth";
    $result= mysql_query($qry,$con);
   echo "<table border='2'>";
 echo "<tr>
   <td>Type</td>
 <td> Category</td>
  
  <td>size</td>
  <td>mrp</td>
  <td>Description</td>

  <td>Photo</td>
  </tr>";
    while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table
        echo "<tr>
            <td>".$row['ctype']."</td>
          <td>".$row['ccat']."</td>
            <td>".$row['csize']."</td>
                <td>".$row['cmrp']."</td>
            <td>".$row['cdes']."</td>
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>

   
</tr>"  ;    
    }
    echo "</table>";
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
        <form action="apparelsearch.php" >
            <table border="0" width="400px" align="center">
                    <tr>
                        <td>Type:</td>
                        <td>
                            <select name="txtype">
                            <option value="">--select--</option>
                               <?php
                           $con=  mysql_connect("localhost", "root","") or die("cant connect");
                            mysql_select_db("cc", $con);
                            $qry="SELECT * FROM clothes_type";
                             $result= mysql_query($qry,$con);
                                
                             while ($row = mysql_fetch_array($result))
                             {
                                 echo  "<option value=".$row[0].">".$row[1]."</option>";
                             }
                             ?>
                         
                            </select>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>Category:</td>
                        <td><select name="txtcat">
                           <option value="">--select--</option>
                               <?php
                           $con=  mysql_connect("localhost", "root","") or die("cant connect");
                            mysql_select_db("cc", $con);
                            $qry="SELECT * FROM clothes_category";
                             $result= mysql_query($qry,$con);
                                
                             while ($row = mysql_fetch_array($result))
                             {
                                 echo  "<option value=".$row[0].">".$row[1]."</option>";
                             }
                             ?>
                         
                            </select></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Search" name="btnsearch"/></td>
                        <td><input type="submit" value="Show All" name="btnshow" /></td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>