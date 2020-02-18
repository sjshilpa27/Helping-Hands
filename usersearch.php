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


 if(isset($_REQUEST["type"]))
 {
  
     //book
    if (($_REQUEST["status"])=="ToAvailable" && isset($_REQUEST["id"]) && ($_REQUEST["type"])=="book")   
 { 
 
        $qryup="UPDATE book SET status='Available' WHERE cno='".$_REQUEST["id"]."'";
           echo $qryup; 
 }          
    
  else      if (($_REQUEST["status"])=="ToUnavailable" && ($_REQUEST["id"]) && ($_REQUEST["type"])=="book")   
   
 { 
   $qryup="UPDATE book SET status='Unavailable' WHERE cno='".$_REQUEST["id"]."'";

           echo $qryup; 
 }          
           
           //cloth
 
   if (($_REQUEST["status"])=="ToAvailable" && isset($_REQUEST["id"]) && ($_REQUEST["type"])=="cloth")   
 { 
 
        $qryup="UPDATE cloth SET status='Available' WHERE cno='".$_REQUEST["id"]."'";
           echo $qryup; 
 }          
    
  else      if (($_REQUEST["status"])=="ToUnavailable" && ($_REQUEST["id"]) && ($_REQUEST["type"])=="cloth")   
   
 { 
   $qryup="UPDATE cloth SET status='Unavailable' WHERE cno='".$_REQUEST["id"]."'";

           echo $qryup; 
 }          
  
 //ent
   if (($_REQUEST["status"])=="ToAvailable" && isset($_REQUEST["id"]) && ($_REQUEST["type"])=="ent")   
 { 
 
        $qryup="UPDATE entertainment SET status='Available' WHERE cno='".$_REQUEST["id"]."'";
           echo $qryup; 
 }          
    
  else      if (($_REQUEST["status"])=="ToUnavailable" && ($_REQUEST["id"]) && ($_REQUEST["type"])=="ent")   
   
 { 
   $qryup="UPDATE entertainment SET status='Unavailable' WHERE cno='".$_REQUEST["id"]."'";

           echo $qryup; 
 }          
  
 //others
   if (($_REQUEST["status"])=="ToAvailable" && isset($_REQUEST["id"]) && ($_REQUEST["type"])=="others")   
 { 
 
        $qryup="UPDATE others SET status='Available' WHERE cno='".$_REQUEST["id"]."'";
           echo $qryup; 
 }          
    
  else      if (($_REQUEST["status"])=="ToUnavailable" && ($_REQUEST["id"]) && ($_REQUEST["type"])=="others")   
   
 { 
   $qryup="UPDATE others SET status='Unavailable' WHERE cno='".$_REQUEST["id"]."'";

           echo $qryup; 
 }          
  
 
 
           
           
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
    
    echo "<table border='2' class='tab'>";
   echo "<tr style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;'>
       <td>Book name</td>
<td>Author</td>
<td>Genre</td>
<td>edition</td>
<td>mrp</td>
<td>Pages</td>   
<td>Description</td>
<td>Purpose</td>
         <td>Duration</td>
         
<td>Photo</td>
<td>Publication</td>
<td>Edit</td>
<td>Delete</td>
<td>Status</td>
<td>Change To</td>

</tr>";
  while($row = mysql_fetch_array($result))
    {
        echo "<tr>
            <td>".$row['cname']."</td>
            <td>".$row['cauthor']."</td>
 <td>";
        $qryu="SELECT cgenre FROM genre where cid='".$row['cgenre']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cgenre"];
                        echo"</td>
            <td>".$row['cedition']."</td>
            <td>".$row['cmrp']."</td>
                 <td>".$row['cpages']."</td>
                      <td>".$row['cdes']."</td>
<td>".$row['citem_for']."</td>
            <td>".$row['cduration']."</td>    
        
            
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
 <td>".$row['cpub']."</td>              
 
 
             <td> <a href='bookenter.php?id=".$row["cno"]."&status=update'>Edit</td>  
              <td> <a href='usersearch.php?id=".$row["cno"]."&status=delete'>Delete</td>
<td>".$row['status']."</td>
<td>" ;
        
        
      if($row['status']=='Available')
   {
echo " <a href='usersearch.php?id=".$row["cno"]."&status=ToUnavailable&type=book'>Unavailable</td>";
}
else
{
echo "<a href='usersearch.php?id=".$row["cno"]."&status=ToAvailable&type=book'>Available</td>";

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
   echo "<table border='2' class='tab' style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;'>";
 echo "<tr>
  <td>Type</td>
 <td> Category</td>
  <td>size</td>
  <td>mrp</td>
  <td>Description</td>
  <td>Purpose</td>
  <td>Duration</td>
  <td>Photo</td>
<td>EDIT</td>
<td>Delete</td>
<td>Status</td>
  <td>Change To </td>

  </tr>";
    while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table
        echo "<tr>
        <td>";
        $qryu="SELECT typename FROM clothes_type where typeno='".$row['ctype']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["typename"];
                        echo"</td>

 <td>";
        $qryu="SELECT catname FROM clothes_category where catid='".$row['ccat']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["catname"];
                        echo"</td>

     <td>".$row['csize']."</td>
                <td>".$row['cmrp']."</td>
            <td>".$row['cdes']."</td>
<td>".$row['citem_for']."</td>
            <td>".$row['cduration']."</td>    
            
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
       <td> <a href='clothesenter.php?id=".$row["cno"]."&status=update'>Edit</td>  
              <td> <a href='usersearch.php?id=".$row["cno"]."&status=delete_cloth'>Delete</td>
<td>".$row['status']."</td>
<td>" ;
        
        
      if($row['status']=='Available')
   {
echo " <a href='usersearch.php?id=".$row["cno"]."&status=ToUnavailable&type=cloth'>Unavailable</td>";
}
else
{
echo "<a href='usersearch.php?id=".$row["cno"]."&status=ToAvailable&type=cloth'>Available</td>";

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
   echo "<table border='2' class='tab' style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;'>";
 echo "<tr> <td>Type</td>
 <td> Name</td>
  
  <td>Genre</td>
  <td>Description</td>
<td>Purpose</td>
<td>Price</td>    
<td>Duration</td>
         
  <td>Photo</td>
  <td>Edit</td>
<td>Delete</td>
<td>Status</td>
  <td>Change To </td>
  </tr>";
    while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table
        echo "<tr>
 <td>";
        $qryu="SELECT typename FROM ent_type where typeno='".$row['ctype']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["typename"];
                        echo"</td>
            <td>".$row['cname']."</td>
 <td>";
        $qryu="SELECT cgenre FROM genre where cid='".$row['cgenre']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cgenre"];
                        echo"</td>
            
                      <td>".$row['cdes']."</td>
<td>".$row['citem_for']."</td>
            <td>".$row['cmrp']."</td>
                
<td>".$row['cduration']."</td>    
                        
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td> <a href='entertainment.php?id=".$row["cno"]."&status=update'>Edit</td>  
              <td> <a href='usersearch.php?id=".$row["cno"]."&status=delete_ent'>Delete</td>
   
<td>".$row['status']."</td>
<td>" ;
        
        
      if($row['status']=='Available')
   {
echo " <a href='usersearch.php?id=".$row["cno"]."&status=ToUnavailable&type=ent'>Unavailable</td>";
}
else
{
echo "<a href='usersearch.php?id=".$row["cno"]."&status=ToAvailable&type=ent'>Available</td>";

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
   echo "<table border='2' class='tab' style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;'>";
        
echo"   <td>Name</td>
         <td>Description</td>
         <td>Price</td>
         <td>Purpose</td>
<td>Price</td>
<td>Duration</td>
                  <td>Photo</td>
                                 <td>Edit</td>
<td>Delete</td>
<td>Status</td>
  <td>Change To </td>
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
                 
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td> <a href='others.php?id=".$row["cno"]."&status=update'>Edit</td>  
              <td> <a href='usersearch.php?id=".$row["cno"]."&status=delete_others'>Delete</td>
<td>".$row['status']."</td>
<td>" ;
        
        
      if($row['status']=='Available')
   {
echo " <a href='usersearch.php?id=".$row["cno"]."&status=ToUnavailable&type=others'>Unavailable</td>";
}
else
{
echo "<a href='usersearch.php?id=".$row["cno"]."&status=ToAvailable&type=others'>Available</td>";

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

<style type="text/css">
            *
            {
                padding:0;
                margin:0;
            }
            body
            {
background-image: url("images/hand1.jpg");
                              background-repeat: no-repeat;
                background-size: cover;
            }
            #window{
position:absolute;
bottom:0;
margin: 0 auto;
        background:url('images/images1.jpg');
    background-size: cover;
    width: 100%;
    height:300px ;
    background-position: center;
        background-repeat: no-repeat;
        border-radius:10px;
        text-align:center; 
        
}
td{
    padding:20px;
}
            #s
            {
                width:400px;
                margin:0 auto;
                border:1px solid #d05e3c;
                box-shadow:1px 1px 17px #d05e3c;
            }
            #s h2
            {
                text-align: center;
                background-color:#d05e3c;
                color:#ffffff;
            }
            #s td
            {
            padding:3px;    
            }
            .btn
            {
                background-color:#d05e3c;
                padding:5px;
                color:#ffffff;
                border:0;
                width:130px;
            }
            .btn:hover
            {
                cursor:pointer;
            }
            .pro
            {
                
                background-repeat:no-repeat;
                border:1px solid #000000;
                padding-left:0px;
                padding-bottom:3px;
                padding-top:3px;
            }
            
            
             .tab
            {
                
               background-size: cover;
                position: relative;
                top:200px;
                margin: 0 auto;
               background-repeat:no-repeat;
                border:0 solid #000000;
                padding-left:0px;
                padding-bottom:3px;
                padding-top:3px;
                box-shadow: #474141;
                align:center;
                padding:0px;
               text-align: "center";
               
                color:#000000;
                border:0;
                width:130px;
           column-width:150px;
            }
           
             .header {
  width: 100%;
  height:120px;
  font-size: 20px;
  z-index: 99999999999999;
  position:fixed;
  top:0;
  left:0;
  right:0;
/*  //padding:30px;*/
}
.header {
  width: 100%;
  height:120px;
  font-size: 20px;
  z-index: 99999999999999;
  position:fixed;
  top:0;
  left:0;
  right:0;
/*  //padding:30px;*/
}

</style>
    </head>

    <body >
        <div class="header">
            <?php
            include'home/head.php';
            ?>
<!--        <iframe width="100%" height="200px" src="head.php"  frameborder="0" style="border:0" allowfullscreen ></iframe>-->
     </div>

        
<div class="tab">
<!--  <a href='logout.php?status='>Logout</a>
-->
        <form action="usersearch.php" >
                <input type="submit" value="My bookshelf" name="btnshow_book" />
                <input type="submit" value="My Wardrobe" name="btnshow_cloth" />
                <input type="submit" value="My entertainment collection " name="btnshow_ent" />
                <input type="submit" value="My other stuffs" name="btnshow_others" />

                
        </form>
</div>
        <?php
        // put your code here
        ?>
    </body>
</html>


          <?php
}
 else {
    header('Location:home/homepg.php');
}

?>
