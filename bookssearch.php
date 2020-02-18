<?php
if(isset($_REQUEST["btnsearch_book"]))
{
    
    $name=$_REQUEST["txtname"];
    $genre=$_REQUEST["txtgenre"];
   // $cat=$_REQUEST["pcat"];
    $con=mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
  //  echo "Code".$pcode;
    //echo "Cat".$cat;
    if($name!="" && $genre=="")
    {
    $qry="SELECT * FROM book WHERE cname LIKE '%".$name."%'";
    echo $qry;
    }
    else if($name=="" && $genre!="")
    {
    $qry="SELECT * FROM book WHERE cgenre=  '".$genre."%'";
        echo $qry;
    }  
 else {
        echo "Details required"; 
        $qry="";
    }
    if($qry!="")
    {
$result= mysql_query($qry,$con);
    echo "<table border='2'>";
    echo "<tr>
      <td>Book name</td>
<td>Author</td>
<td>Genre</td>
<td>edition</td>
<td>mrp</td>
<td>Pages</td>   
<td>Description</td>
     <td>Photo</td>
    </tr>";
 
    
    while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table$row[0]; and so on
     //   if($row[0]==$pcode && $row[1]!=$pname && $row[3]!=$pcat)
        
        echo "<tr>
            <td>".$row['cname']."</td> 
                
            <td>".$row['cauthor']."</td>
            <td>".$row['cgenre']."</td>
            <td>".$row['cedition']."</td>
            <td>".$row['cmrp']."</td>
                    <td>".$row['cpages']."</td>
                            <td>".$row['cdes']."</td>
                                
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
    <td>".$row['cpub']."</td>              
</tr>";     
     }
    echo "</table>";
}
}
if(isset($_REQUEST["btnshow_book"]))
{
        $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    $qry="SELECT * FROM book";
    $result= mysql_query($qry,$con);
    echo "<table border='2'>";
   echo "<tr>
      <td>Book name</td>
<td>Author</td>
<td>Genre</td>
<td>edition</td>
<td>mrp</td>
<td>Pages</td>   
<td>Description</td>
     <td>Photo</td>
    </tr>";
  while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table
        echo "<tr>
            <td>".$row['cname']."</td>
            <td>".$row['cauthor']."</td>
            <td>".$row['cgenre']."</td>
            <td>".$row['cedition']."</td>
            <td>".$row['cmrp']."</td>
                 <td>".$row['cpages']."</td>
                      <td>".$row['cdes']."</td>
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
 <td>".$row['cpub']."</td>              
   
</tr>"  ;    
 
    }
    
    }


      echo "</table>";

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
        <form action="bookssearch.php" >
            <table border="0" width="400px" align="center">
                    <tr>
                        <td>Book Name:</td>
                        <td><input type="text" name="txtname" value="" /></td>
                    </tr>
                    <tr>
                        
                        <td>Genre:</td>
                        <td><select name="txtgenre">
                            <option value="">--select--</option>
                               <?php
                           $con=  mysql_connect("localhost", "root","") or die("cant connect");
                            mysql_select_db("cc", $con);
                            $qry="SELECT * FROM genre";
                             $result= mysql_query($qry,$con);
                                
                             while ($row = mysql_fetch_array($result))
                             {
                                 echo  "<option value=".$row[cid].">".$row[1]."</option>";
                             }
                             ?>
                         
                            </select></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Search" name="btnsearch_book"/></td>
                        <td><input type="submit" value="Show All" name="btnshow_book" /></td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>