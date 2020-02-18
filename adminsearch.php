<?php 
if(isset($_SESSION["ausername"]))
{
echo  $_SESSION["ausername"];

//if(isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
    
//{     //$status=$_REQUEST["status"];
    //if($_REQUEST["status"]=="delete")
     $con=mysql_connect("localhost", "root","") or die("cant connect");
        mysql_select_db("cc", $con);

    
    echo $_REQUEST["status"];
    
        if($_REQUEST["status"]=="delete_book")
        {
        $qry="DELETE FROM book where cno=".$_REQUEST["id"];
       echo $qry;
        echo 'data deleted successfully';
        }
       else if($_REQUEST["status"]=="delete_cloth")
        {
        $qry="DELETE FROM cloth where cno=".$_REQUEST["id"];
         
        }
       else if($_REQUEST["status"]=="delete_ent")
        {
        $qry="DELETE FROM entertainment where cno=".$_REQUEST["id"];
       
        }
       else if($_REQUEST["status"]=="delete_others")
        {
        $qry="DELETE FROM others where cno=".$_REQUEST["id"];
       
        }

        
        echo $qry;
        
        if(mysql_query($qry, $con))
    {
        echo "<h1>Record deleted successfully</h1>";
        
    }
 else {
        echo "Error".  mysql_error();    
    }
                
   


   
    



//OTHERS SEARCH
                 if(isset($_REQUEST["btnshow_others"]))
        {
    // $status=$_REQUEST["txtstatus"];
        
              $con=  mysql_connect("localhost","root","") or die("Sorry! Cannot Connect");
                   mysql_select_db("cc",$con);
              
                  //echo "Code".$pcode;
                   //echo "Cat".$cat;
         $qry = "SELECT * FROM others";
         echo $qry;
          $result=mysql_query($qry,$con);
        echo"<table border='2'>";
        echo "<tr>
        
   <td>Name</td>
         <td>Description</td>
         <td>Price</td>
         <td>Purpose</td>
         <td>Duration</td>
         <td>Uploaded by</td>
                  <td>Photo</td>
                           <td>Delete/td>
               </tr>";

        while ($row = mysql_fetch_array($result))
        {
            // echo $row[0];data will not appear in table form
            //so create table $row[0]; and so on
            //if($row[0]==$pcode && $row[1]!=$pname && $row[3]!=$pcat
            echo "<tr> 
            <td>".$row['cname']."</td>
            <td>".$row['cdes']."</td>
            <td>".$row['cmrp']."</td>
            <td>".$row['citem_for']."</td>
            <td>".$row['cduration']."</td>    
            <td>".$row['uid']."</td>
                 
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td><a href='adminsearch.php?id=".$row['cno']."&status=delete_others'>Delete</a></td>                
</tr>";
        }
        echo "</table>";
        }
        
//ENTERTAINMENT SEARCH
        
       
if(isset($_REQUEST["btnshow_ent"]))
{
     //$status=$_REQUEST["txtstatus"];
   
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    $qry="SELECT * FROM entertainment";
    $result= mysql_query($qry,$con);
   echo "<table border='2'>";
 echo "<tr> <td>Type</td>
 <td> name</td>
  
  <td>genre</td>
  <td>Description</td>
<td>Purpose</td>
<td>Price</td>    
<td>Duration</td>
         <td>Uploaded by</td>
         
  <td>Photo</td>
  <td>Delete</td>
  
  </tr>";
    while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table
        echo "<tr>
            <td>".$row['ctype']."</td>
            <td>".$row['cname']."</td>
            
            <td>".$row['cgenre']."</td>
            
                      <td>".$row['cdes']."</td>
<td>".$row['citem_for']."</td>
            <td>".$row['cmrp']."</td>
    <td>".$row['cduration']."</td>    
            <td>".$row['uid']."</td>
                        
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td><a href='adminsearch.php?id=".$row["cno"]."&status=delete_ent'>Delete</a></td>
   
</tr>"  ;    
    }
    echo "</table>";
}

        
        
        



//BOOK SEARCH


if(isset($_REQUEST["btnshow_book"]))
{
     //$status=$_REQUEST["txtstatus"];
   
        $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    $qry="SELECT * FROM book";
    $result= mysql_query($qry,$con);
    echo "<table border='2'>";
   echo "<tr>
      <td>Book name</td>
<td>Author</td>
<td>Genre</td>
<td>Edition</td>
<td>Price</td>
<td>Pages</td>   
<td>Description</td>
<td>Purpose</td>
         <td>Duration</td>
         <td>Uploaded by</td>
         
<td>Photo</td>
<td>Publication</td>
<td>Delete</td>
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
<td>".$row['citem_for']."</td>
            <td>".$row['cduration']."</td>    
            <td>".$row['uid']."</td>
            
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
 <td>".$row['cpub']."</td>              
           <td><a href='adminsearch.php?id=".$row['cno']."&status=delete_book'>Delete</a></td>
   
</tr>"  ;    
 
    }
      echo "</table>";
}


//CLOTH SEARCH


if(isset($_REQUEST["btnshow_cloth"]))
{
     //$status=$_REQUEST["txtstatus"];
   
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    $qry="SELECT * FROM cloth";
    $result= mysql_query($qry,$con);
   echo "<table border='2'>";
 echo "<tr>
  <td>Type</td>
 <td> Category</td>
  <td>Size</td>
  <td>Price</td>
  <td>Description</td>
  <td>Purpose</td>
  <td>Duration</td>
  <td>Uploaded By</td>
<td>Photo</td>
<td>Delete</td>
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
<td>".$row['citem_for']."</td>
            <td>".$row['cduration']."</td>    
            <td>".$row['uid']."</td>
            
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td><a href='adminsearch.php?id=".$row["cno"]."&status=delete_cloth'>Delete</a></td>
   
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

        
        
<?php 
//OTHERS
if(isset($_REQUEST["status"]) && ($_REQUEST["status"]=="others"))
{?>
        <form name="searchform_others" action="adminsearch.php" method="GET" >
        <input type="submit" class="formbutton" value="Show All" name="btnshow_others" />
        
        </form> 
        <?php
}?>
        
        
        
        
<?php 

//BOOK
if(isset($_REQUEST["status"]) && ($_REQUEST["status"]=="book"))
{?>
              <form action="adminsearch.php" >
        <input type="submit" value="Show All" name="btnshow_book" />
              </form>
  
        <?php
}?>
        
        

                
<?php 

//entertainment
if(isset($_REQUEST["status"]) && ($_REQUEST["status"]=="ent"))
{?>
              <form action="adminsearch.php" >
            <input type="submit" value="Show All" name="btnshow_ent" />
        </form>

        <?php
}?>

        <?php 
//Apparels
if(isset($_REQUEST["status"]) && ($_REQUEST["status"]=="cloth"))
{?>
        <form action="adminsearch.php" >
            <input type="submit" value="Show All" name="btnshow_cloth" />
  
<?php
}
?>
        </form>
   
        
    </body>
</html>


  <?php
}
 else {
    header('Location:adminlogin.php');
}

?>


