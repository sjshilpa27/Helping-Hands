<?php session_start();
if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
$uid=$_SESSION["userid"];
echo $uid;
include 'db.php';
}
 else {
$uid="";    
}


if(isset($_REQUEST["status"]))
{
    if($_REQUEST["status"]=="book")
    {
        $status=$_REQUEST["status"];
    }
}



//OTHERS SEARCH
if(isset($_REQUEST["btnsearch_others"]))
     
    {
    $status=$_REQUEST['txtstatus'];
              $name=$_REQUEST["txtname"];
    
    //echo $status;

              if($uid!="")
              {       
                      $qry="SELECT * FROM others WHERE cname LIKE '%".$name."%' and uid!='".$uid."'";
                     echo $qry;
             
                   }
              else
              {
                  
                  $qry="SELECT * FROM others WHERE cname LIKE '%".$name."%'";
                     echo $qry;
             
                       }        
                     
              include 'db.php'; 
                   
        
                      if($name!=null)  
                 {
        $result=mysql_query($qry,$con);
        echo"<table class='tab'>";
        echo "<tr>
         <td>Name</td>
         <td>Description</td>
         <td>Price</td>
         <td>Purpose</td>
         <td>Duration</td>
         <td>Uploaded by</td>
                  <td>Photo</td>
                           <td>GET</td>
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
 <td>";
        $qryu="SELECT cusername FROM user where cid='".$row['uid']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cusername"];
                        echo"</td>
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td><a href='get.php?id=".$row["cno"]."&status=".$status."'>GET</a></td>
</tr>";
        }
        echo "</table>";
        
                 }
                 
              else
                 {
                  echo"Detail required";   
                 $qry="";
                 $result="";
                  
                 }
        
     }
        
         if(isset($_REQUEST["btnshow_others"]))
        {
     $status=$_REQUEST["txtstatus"];
        
              $con=  mysql_connect("localhost","root","") or die("Sorry! Cannot Connect");
                   mysql_select_db("cc",$con);
              
                  //echo "Code".$pcode;
                   //echo "Cat".$cat;
              if($uid!="")
              {   
                          $qry="SELECT * FROM others WHERE  uid!='".$uid."'";
                  
                  echo $qry;
              }
              else
              {
                             $qry="SELECT * FROM others";
                 echo $qry;
              }        
                     
          $result=mysql_query($qry,$con);
        echo"<table  class='tab'>";
        echo "<tr>
        
   <td>Name</td>
         <td>Description</td>
         <td>Price</td>
         <td>Purpose</td>
         <td>Duration</td>
         <td>Uploaded by</td>
                  <td>Photo</td>
                           <td>GET</td>
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
 <td>";
        $qryu="SELECT cusername FROM user where cid='".$row['uid']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cusername"];
                        echo"</td>
                 
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td><a href='get.php?id=".$row["cno"]."&status=".$status."'>GET</a></td>                
</tr>";
        }
        echo "</table>";
        }
        
//ENTERTAINMENT SEARCH
        
        if(isset($_REQUEST["btnsearch_ent"]))
{
     $status=$_REQUEST["txtstatus"];
   
    $type=$_REQUEST["txtype"];
    $genre=$_REQUEST["txtgenre"];
   // $cat=$_REQUEST["pcat"];
    $con=mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
  //  echo "Code".$pcode;
    //echo "Cat".$cat;
 
    
    
    
    
    
              if($uid!="")
              {       
       if($type!="" && $genre=="")
    {
    $qry="SELECT * FROM entertainment WHERE ctype='".$type."' and uid!='".$uid."'";
    echo $qry;
    }
    else if($type=="" && $genre!="")
    {
    $qry="SELECT * FROM entertainment WHERE cgenre= ".$genre." and uid!='".$uid."'";
        echo $qry;
    }    
    else if($type=!"" && $genre!="")
    {
    $qry="SELECT * FROM entertainment WHERE cgenre= ".$genre." and uid!='".$uid."' and ctype='".$type."'";
        echo $qry;
    }    

    
    else
    {
    echo "Enter some value in the field";
    $qry="";    
    }
              }
     
              
              else
      {
       if($type!="" && $genre=="")
    {
    $qry="SELECT * FROM entertainment WHERE ctype=".$type;
    echo $qry;
    }
    else if($type=="" && $genre!="")
    {
    $qry="SELECT * FROM entertainment WHERE cgenre= ".$genre;
        echo $qry;
    }    
    else if($type=!"" && $genre!="")
    {
    $qry="SELECT * FROM entertainment WHERE cgenre= ".$genre."  and ctype='".$type."'";
        echo $qry;
    }    


    
    
    else
    {
    echo "Enter some value in the field";
    $qry="";    
    } 
        
      }
        
        
if($qry!="")
{
        $result= mysql_query($qry,$con);
 echo "<table class='tab'>";
 echo "<tr>
   <td>Type</td>
 <td> name</td>
  
  <td>genre</td>
  <td>Description</td>
<td>Purpose</td>
<td>Price</td>
<td>Duration</td>
         <td>Uploaded by</td>
         
  <td>Photo</td>
  <td>GET</td>
  </tr>";
     while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table$row[0]; and so on
     //   if($row[0]==$pcode && $row[1]!=$pname && $row[3]!=$pcat)
        
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
 <td>";
        $qryu="SELECT cusername FROM user where cid='".$row['uid']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cusername"];
                        echo"</td>
            
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
            <td><a href='get.php?id=".$row["cno"]."&status=".$status."'>GET</a></td>
</tr>";     
     }

   echo "</table>";
}
    
    }

if(isset($_REQUEST["btnshow_ent"]))
{
     $status=$_REQUEST["txtstatus"];
   
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    
    
              if($uid!="")
              {       
      
    $qry="SELECT * FROM entertainment where uid!='".$uid."'";
              }
              else
              {   
     $qry="SELECT * FROM entertainment";
              }
    
    $result= mysql_query($qry,$con);
   echo "<table class='tab'>";
 echo "<tr> <td>Type</td>
 <td> name</td>
  
  <td>genre</td>
  <td>Description</td>
<td>Purpose</td>
<td>Price</td>    
<td>Duration</td>
         <td>Uploaded by</td>
         
  <td>Photo</td>
  <td>GET</td>
  
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
 <td>";
        $qryu="SELECT cusername FROM user where cid='".$row['uid']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cusername"];
                        echo"</td>
                        
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td><a href='get.php?id=".$row["cno"]."&status=".$status."'>GET</a></td>
   
</tr>"  ;    
    }
    echo "</table>";

 
    }
    
        
        
        



//BOOK SEARCH

if(isset($_REQUEST["btnsearch_book"]))
{
    $status=$_REQUEST["txtstatus"];
    $name=$_REQUEST["txtname"];
    $genre=$_REQUEST["txtgenre"];
   // $cat=$_REQUEST["pcat"];
    $con=mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
  //  echo "Code".$pcode;
    //echo "Cat".$cat;

        
              if($uid!="")
              {       


    if($name!="" && $genre=="")
    {
  $qry="SELECT *,genre.cgenre AS cgen FROM book JOIN genre ON book.cgenre=genre.cid  WHERE cname LIKE '%".$name."%'and uid!='".$uid."'" ;
 
//        $qry="SELECT * FROM book WHERE cname LIKE '%".$name."%' and uid!='".$uid."'";
    echo $qry;
    }
    else if($name=="" && $genre!="")
    {
        $qry="SELECT *,genre.cgenre AS cgen FROM book JOIN genre ON book.cgenre=genre.cid  WHERE book.cgenre=".$genre." and uid!='".$uid."'" ;
 //     $qry="SELECT * FROM book WHERE cgenre= " .$genre." and uid!='".$uid."'";
            echo $qry;
    }  
     else {
        echo "Details required"; 
        $qry="";
    }
} 
    
else
{
    

    if($name!="" && $genre=="")
    { $qry="SELECT *,genre.cgenre AS cgen FROM book JOIN genre ON book.cgenre=genre.cid  WHERE cname LIKE '%".$name."%'" ;
    echo $qry;
    }
    else if($name=="" && $genre!="")
    { //"SELECT *,genre.cgenre AS cgen FROM book,genre where book.cgenre=genre.cid";
        $qry="SELECT *,genre.cgenre AS cgen FROM book JOIN genre ON book.cgenre=genre.cid  WHERE book.cgenre=".$genre; ;
    
        echo $qry;
    }  
     else {
        echo "Details required"; 
        $qry="";
    }
    
}
    if($qry!="")
    {
$result= mysql_query($qry,$con);
    echo "<table class='tab'>";
    echo "<tr>
     <td>Book name</td>
<td>Author</td>
<td>Genre</td>
<td>edition</td>
<td>Price</td>
<td>Pages</td>   
<td>Description</td>
<td>Purpose</td>
         <td>Duration</td>
         <td>Uploaded by</td>
         
<td>Photo</td>
<td>Publication</td>
<td>Get</td></tr>";
 
    
    while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table$row[0]; and so on
     //   if($row[0]==$pcode && $row[1]!=$pname && $row[3]!=$pcat)
        
        echo "<tr>
            <td>".$row['cname']."</td> 
                
            <td>".$row['cauthor']."</td>
            <td>".$row['cgen']."</td>
            <td>".$row['cedition']."</td>
            <td>".$row['cmrp']."</td>
                    <td>".$row['cpages']."</td>
                            <td>".$row['cdes']."</td>
                                                <td>".$row['citem_for']."</td>
                <td>".$row['cduration']."</td>
                <td>";
        $qryu="SELECT cusername FROM user where cid='".$row['uid']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cusername"];
                        echo"</td>
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
    <td>".$row['cpub']."</td>     
        <td><a href='get.php?id=".$row["cno"]."&status=".$status."'>GET</a></td>
</tr>";     
     }
    echo "</table>";
}
}
if(isset($_REQUEST["btnshow_book"]))
{
     $status=$_REQUEST["txtstatus"];
   
        $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    
              if($uid!="")
              {       
      
    $qry="SELECT *,genre.cgenre AS cgen FROM book,genre where uid!='".$uid."' and book.cgenre=genre.cid";
              }
              else
              {   
     $qry="SELECT *,genre.cgenre AS cgen FROM book,genre where book.cgenre=genre.cid";
              }
    
    $result= mysql_query($qry,$con);
    echo "<table class='tab'>";
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
<td>Get</td>
</tr>";
   $c=0;
  while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table
//      if($c%2==0)
//      {
//        echo "<tr style='background:#dadada;'>";
//            }
// else { 
//        echo "<tr style='background:#0086cf;'>";
//            }
           echo" <td>".$row['cname']."</td>
            <td>".$row['cauthor']."</td>
            <td>".$row['cgen']."</td>
            <td>".$row['cedition']."</td>
            <td>".$row['cmrp']."</td>
                 <td>".$row['cpages']."</td>
                      <td>".$row['cdes']."</td>
<td>".$row['citem_for']."</td>
            <td>".$row['cduration']."</td>    
    <td>";
        $qryu="SELECT cusername FROM user where cid='".$row['uid']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cusername"];
                        echo"</td>
            
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
 <td>".$row['cpub']."</td>              
           <td><a href='get.php?id=".$row['cno']."&status=".$status."'>GET</a></td>
   
</tr>"  ;    
// $c++;
    }
      echo "</table>";
}


//CLOTH SEARCH

if(isset($_REQUEST["btnsearch_cloth"]))
{
     $status=$_REQUEST["txtstatus"];
   
    $type=$_REQUEST["txtype"];
    $cat=$_REQUEST["txtcat"];
  
    $con=mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);

    if($uid!="")
    {
        
            if($type!="" && $cat=="")
    {
    $qry="SELECT * FROM cloth WHERE ctype=".$type." and uid!='".$uid."'";
    echo $qry;
    }
    else if($type=="" && $cat!="")
    {
    $qry="SELECT * FROM cloth WHERE ccat=".$cat." and uid!='".$uid."'";
        echo $qry;
    }    
    else if($type!="" && $cat!="")
    {
    $qry="SELECT * FROM cloth WHERE ccat=".$cat." and ctype=".$type." and uid!='".$uid."'";
        echo $qry;
    }    
    
    else
    {
        echo "Enter some value in the field";
       $qry="";    
        }

        
        
        
    }    
    
    
    
    
    else{
    
    if($type!="" && $cat=="")
    {
    $qry="SELECT * FROM cloth WHERE ctype=".$type;
    echo $qry;
    }
    else if($type=="" && $cat!="")
    {
    $qry="SELECT * FROM cloth WHERE ccat=".$cat;
        echo $qry;
    }    
    else if($type!="" && $cat!="")
    {
    $qry="SELECT * FROM cloth WHERE ccat=".$cat." and ctype=".$type ;
        echo $qry;
    }    
    
    else
    {
        echo "Enter some value in the field";
       $qry="";    
        }
        
        
    }
if($qry!="")
{
        $result= mysql_query($qry,$con);
 echo "<table class='tab'>";
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
<td>GET</td>
  </tr>";
     while($row = mysql_fetch_array($result))
    {
       // echo $row[0]; data will not appear in table form 
        //so create table$row[0]; and so on
     //   if($row[0]==$pcode && $row[1]!=$pname && $row[3]!=$pcat)
        
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
 <td>";
        $qryu="SELECT cusername FROM user where cid='".$row['uid']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cusername"];
                        echo"</td>
                        
            <td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
            <td><a href='get.php?id=".$row["cno"]."&status=".$status."'>GET</a></td>
</tr>";     
     }

   echo "</table>";
}
}    
    

if(isset($_REQUEST["btnshow_cloth"]))
{
     $status=$_REQUEST["txtstatus"];
   
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    
    
    
              if($uid!="")
              {       
      
    $qry="SELECT * FROM cloth where uid!='".$uid."'";
    echo $qry;        
    }
              else
              {   
     $qry="SELECT * FROM cloth";
   echo $qry;        
   
     }
    $result= mysql_query($qry,$con);
   echo "<table class='tab'>";
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
<td>GET</td>
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
 <td>";
        $qryu="SELECT cusername FROM user where cid='".$row['uid']."'";
        
        $resultu=  mysql_query($qryu, $con);
        $rowu=  mysql_fetch_array($resultu);
        echo $rowu["cusername"];
                        echo"</td>
            
<td><img src='uploads/".$row['cpic']."' height=200 width=200></td>
        <td><a href='get.php?id=".$row["cno"]."&status=".$status."'>GET</a></td>
   
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
    
          <style type="text/css">
            *
            {
                padding:0;
                margin:0;
            }
            body
            {
                background:url('images/tt.jpg');
                background-repeat: no-repeat;
                background-size: cover;
            }
            #window{
position: relative;
top: 200px;
margin: 0 auto;
    background-size: cover;
    width: 500px;
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

</style>
    </head>

    <body >
        <div class="header">
            <?php
            include'home/head.php';
            ?>
<!--        <iframe width="100%" height="200px" src="head.php"  frameborder="0" style="border:0" allowfullscreen ></iframe>-->
</div>

        
      
             
           
<?php 
//OTHERS
if(isset($_REQUEST["status"]) && ($_REQUEST["status"]=="others"))
{?>
                    
        <div id="window">
            <h2>Search</h2> 
        <form name="searchform_others" action="search.php" method="GET" >
          
            <table class="tab" border="0" align="center" width="400" >
                   
                     <tr>
                        <td>Name</td>
                        <td><input type="text" name="txtname" class="pro" value="" placeholder="Product Name"/></td>
                    </tr>
                        
                    
                    <tr align=center>
                        <td  ><input type="submit" class="formbutton" value="Search" name="btnsearch_others" /></td>
                        <td  ><input type="submit" class="formbutton" value="Show All" name="btnshow_others" /></td>
                       
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <input type='text' value='<?php echo $_REQUEST["status"];?>' name='txtstatus' hidden>
                        </td>
                    </tr>
                    </tbody>    
            </table>
       
        </form> 
                    </div>
        <?php
}?>
        
        
        
        
<?php 

//BOOK
if(isset($_REQUEST["status"]) && ($_REQUEST["status"]=="book"))
{?>  
                    
        <div id="window">
            <h2>Search</h2> 
            <form name="searchform_books" action="search.php" method="GET" >     
                     
                <table class="tab" border="0" width="400px" align="center">
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
                        <td><input type="submit" value="Search"  name="btnsearch_book"/></td>
                        <td><input type="submit" value="Show All" name="btnshow_book" /></td>
                    </tr>
                    <tr>
                    <td colspan='2'>
                        <input type='text' value='<?php echo $_REQUEST["status"];?>' name='txtstatus' hidden>
                        </td></tr>
            </table>
             
              </form>
        </div>
        <?php
}?>
        
        

                
<?php 

//entertainment
if(isset($_REQUEST["status"]) && ($_REQUEST["status"]=="ent"))
{?> 
            
        <div id="window">
            <h2>Search</h2> 
              <form action="search.php" >

                  <table class="tab" border="0" width="400px" align="center">
                    <tr>
                        <td>Type:</td>
                        <td>
                            <select name="txtype">
                            <option value="">--select--</option>
                               <?php
                           $con=  mysql_connect("localhost", "root","") or die("cant connect");
                            mysql_select_db("cc", $con);
                            $qry="SELECT * FROM ent_type";
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
                                 echo  "<option value=".$row[0].">".$row[1]."</option>";
                             }
                             ?>
                         
                            </select></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Search" name="btnsearch_ent"/></td>
                        <td><input type="submit" value="Show All" name="btnshow_ent" /></td>
                    </tr>
   
                                               <tr>
                    <td colspan='2'>
                            <input type='text' value='<?php echo $_REQUEST["status"];?>' name='txtstatus' hidden>
                        </td></tr>
   
                              
                              
            </table>

        </form>
        </div>
        <?php
}?>

        <?php 
//Apparels
if(isset($_REQUEST["status"]) && ($_REQUEST["status"]=="cloth"))
{?>
             
        <div id="window">
            <h2>Search</h2> 
        <form action="search.php" >
            <table class="tab" border="0" width="400px" align="center">
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
                        <td><input type="submit" value="Search" name="btnsearch_cloth"/></td>
                        <td><input type="submit" value="Show All" name="btnshow_cloth" /></td>
                    </tr>

            
                                               <tr>
                    <td colspan='2'>
                            <input type='text' value='<?php echo $_REQUEST["status"];?>' name='txtstatus' hidden>
                        </td></tr>

                                             
           
            </table>

        </form>
        </div>
        <?php
}
  ?>  
        </div></body>
</html>






