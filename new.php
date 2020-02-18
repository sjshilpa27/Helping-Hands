<?php session_start();

if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
         

 $con=mysql_connect("localhost", "root","") or die("cant connect");
        mysql_select_db("cc", $con);
        
       

if(isset($_REQUEST["id"]) && ($_REQUEST["status"])!="ToAvailable" && ($_REQUEST["status"])!="ToUnavailable")
    
{     //$status=$_REQUEST["status"];
    //if($_REQUEST["status"]=="delete")
  //  echo $_REQUEST["status"];
    
        if($_REQUEST["status"]=="delete_book")
        {
        $qry="DELETE FROM book where cno=".$_REQUEST["id"];
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

        
//        echo $qry;
        
        if(mysql_query($qry, $con))
    {
        echo "<h1>Record deleted successfully</h1>";
        
    }
 else {
        echo "Error".  mysql_error();    
    }
                
    }


        if (($_REQUEST["status"])=="ToAvailableBOOK" && isset($_REQUEST["id"]))   
 { 
 
        $qryup="UPDATE book SET status='Available' WHERE cno='".$_REQUEST["id"]."'";
           echo $qryup; 
if(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
        }
 }

      
        if (($_REQUEST["status"])=="ToUnavailableBOOK" && ($_REQUEST["id"]))   
 { 
   $qryup="UPDATE book SET status='Unavailable' WHERE cno='".$_REQUEST["id"]."'";

           echo $qryup; 
if(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
        }
 }

        
 
 
 //CLOTH
 
        if (($_REQUEST["status"])=="ToAvailableCLOTH" && isset($_REQUEST["id"]))   
 { 
 
        $qryup="UPDATE cloth SET status='Available' WHERE cno='".$_REQUEST["id"]."'";
           echo $qryup; 
if(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
        }
 }

      
        if (($_REQUEST["status"])=="ToUnavailableCLOTH" && ($_REQUEST["id"]))   
 { 
   $qryup="UPDATE cloth SET status='Unavailable' WHERE cno='".$_REQUEST["id"]."'";

           echo $qryup; 
if(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
        }
 }

        
 
 //ENT
 
 
        if (($_REQUEST["status"])=="ToAvailableENT" && isset($_REQUEST["id"]))   
 { 
 
        $qryup="UPDATE entertainment SET status='Available' WHERE cno='".$_REQUEST["id"]."'";
           echo $qryup; 
if(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
        }
 }

      
        if (($_REQUEST["status"])=="ToUnavailableENT" && ($_REQUEST["id"]))   
 { 
   $qryup="UPDATE entertainment SET status='Unavailable' WHERE cno='".$_REQUEST["id"]."'";

           echo $qryup; 
if(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
        }
 }

        
 
 //OTHERS
 
        if (($_REQUEST["status"])=="ToAvailableOTHERS" && isset($_REQUEST["id"]))   
 { 
 
        $qryup="UPDATE others SET status='Available' WHERE cno='".$_REQUEST["id"]."'";
           echo $qryup; 
if(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
        }
 }

      
        if (($_REQUEST["status"])=="ToUnavailableOTHERS" && ($_REQUEST["id"]))   
 { 
   $qryup="UPDATE others SET status='Unavailable' WHERE cno='".$_REQUEST["id"]."'";

           echo $qryup; 
if(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
        }
 }

        
 
 
 
 
 
 
 


//BOOK
if(isset($_REQUEST["btnshow_book"]))
{
                
$uid=$_SESSION["userid"];

    $con=  mysql_connect("localhost", "root","") or die("cant connect");

    mysql_select_db("cc", $con);
    $qry="SELECT * FROM book where uid='".$uid."'";
    $result= mysql_query($qry,$con);
    echo $qry;
    
    echo "<table border='2'>";
   echo "<tr>
       <td>Book name</td>
<td>Author</td>
<td>Genre</td>
<td>edition</td>
<td>mrp</td>
<td>Pages</td>   
<td>Description</td>
<td>Purpose</td>
         <td>Duration</td>
         <td>Uploaded by</td>
         
<td>Photo</td>
<td>Publication</td>
<td>EDIT</td>
<td>Delete</td>
<td>Status</td>
<td>Change To</td>

</tr>";
  while($row = mysql_fetch_array($result))
    {
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
 
 
             <td> <a href='bookenter.php?id=".$row["cno"]."&status=update'>Edit</td>  
              <td> <a href='usersearch.php?id=".$row["cno"]."&status=delete'>Delete</td>
<td>".$row['status']."</td>
<td>" ;
        
        
      if($row['status']=='Available')
   {
echo " <a href='usersearch.php?id=".$row["cno"]."&status=ToUnavailableBOOK'>Unavailable</td>";
}
else
{
echo "<a href='usersearch.php?id=".$row["cno"]."&status=ToAvailableBOOK'>Available</td>";

}

"</tr>"  ;    
    }
    echo "</table>";
}







    
//CLOTH
    if(isset($_REQUEST["btnshow_cloth"]))
{
$uid=$_SESSION["userid"];
   
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    $qry="SELECT * FROM cloth where uid='".$uid."'";
    $result= mysql_query($qry,$con);
   echo "<table border='2'>";
 echo "<tr>
  <td>Type</td>
 <td> Category</td>
  <td>size</td>
  <td>mrp</td>
  <td>Description</td>
  <td>Purpose</td>
  <td>Duration</td>
  <td>Uploaded By</td>
<td>Photo</td>
<td>EDIT</td>
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
       <td> <a href='clothesenter.php?id=".$row["cno"]."&status=update'>Edit</td>  
              <td> <a href='usersearch.php?id=".$row["cno"]."&status=delete_cloth'>Delete</td>
<td>".$row['status']."</td>
<td>" ;
        
        
      if($row['status']=='Available')
   {
echo " <a href='usersearch.php?id=".$row["cno"]."&status=ToUnavailableCLOTH'>Unavailable</td>";
}
else
{
echo "<a href='usersearch.php?id=".$row["cno"]."&status=ToAvailableCLOTH'>Available</td>";

}

"</tr>"  ;    
    }
    echo "</table>";
}
    
    
 //ENT

if(isset($_REQUEST["btnshow_ent"]))
{
$uid=$_SESSION["userid"];
   
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    $qry="SELECT * FROM entertainment where uid='".$uid."'";
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
  <td>EDIT</td>
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
        <td> <a href='entertainment.php?id=".$row["cno"]."&status=update'>Edit</td>  
              <td> <a href='usersearch.php?id=".$row["cno"]."&status=delete_ent'>Delete</td>
   
<td>".$row['status']."</td>
<td>" ;
        
        
      if($row['status']=='Available')
   {
echo " <a href='usersearch.php?id=".$row["cno"]."&status=ToUnavailableENT'>Unavailable</td>";
}
else
{
echo "<a href='usersearch.php?id=".$row["cno"]."&status=ToAvailableENT'>Available</td>";

}

"</tr>"  ;    
    }
    echo "</table>";
}
    

    
//OTHERS

        
         if(isset($_REQUEST["btnshow_others"]))
        {
   $uid=$_SESSION["userid"];
        
              $con=  mysql_connect("localhost","root","") or die("Sorry! Cannot Connect");
                   mysql_select_db("cc",$con);
              
                  //echo "Code".$pcode;
                   //echo "Cat".$cat;
         $qry = "SELECT * FROM others where uid='".$uid."'";
         echo $qry;
          $result=mysql_query($qry,$con);
        echo"<table border='2'>";
        echo "<tr>
        
   <td>Name</td>
         <td>Description</td>
         <td>Price</td>
         <td>Purpose</td>
<td>Price</td>
<td>Duration</td>
         <td>Uploaded by</td>
                  <td>Photo</td>
                           <td>EDIT</td>
<td>Delete</td>

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
            <td>".$row['cmrp']."</td>
                
<td>".$row['cduration']."</td>    
            <td>".$row['uid']."</td>
                 
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td> <a href='others.php?id=".$row["cno"]."&status=update'>Edit</td>  
              <td> <a href='usersearch.php?id=".$row["cno"]."&status=delete_others'>Delete</td>
<td>".$row['status']."</td>
<td>" ;
        
        
      if($row['status']=='Available')
   {
echo " <a href='usersearch.php?id=".$row["cno"]."&status=ToUnavailableOTHERS'>Unavailable</td>";
}
else
{
echo "<a href='usersearch.php?id=".$row["cno"]."&status=ToAvailableOTHERS'>Available</td>";

}

"</tr>"  ;    
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
  <a href='logout.php?status='>Logout</a>

        <form action="usersearch.php" >
                <input type="submit" value="My bookshelf" name="btnshow_book" />
                <input type="submit" value="My Wardrobe" name="btnshow_cloth" />
                <input type="submit" value="My entertainment collection " name="btnshow_ent" />
                <input type="submit" value="My other stuffs" name="btnshow_others" />

                
        </form>
  <a href='transactions.php?status=transactions'>My Transactions</a>

        <?php
        // put your code here
        ?>
    </body>
</html>


          <?php
}
 else {
    header('Location:login.php');
}

?>
