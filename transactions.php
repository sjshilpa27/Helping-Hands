<?php session_start();

if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
  $uid=$_SESSION["userid"];
 $con=mysql_connect("localhost", "root","") or die("cant connect");
        mysql_select_db("cc", $con);
        
       
 //book              
 
if (($_REQUEST["status"])=="book")   
 {
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);
    echo "<div id='new2'>";
     echo "<table border='1' cellpadding='3' class='tab' cellspacing='3' >";
 echo "<tr style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;'> 
 <td>Name</td>
<td>Purpose</td>
<td>Item Type</td>
<td>Requested by</td>
<td>Current Status</td>
<td>Approve</td>
<td>Reject</td>
  </tr>";
 echo "</div>";
     $qryo="SELECT item_request.oid,item_request.item_type,item_request.uid,item_request.itemid,item_request.rno,
         book.citem_for,book.cname,book.uid,book.status,user.cusername,user.cid FROM item_request,
         book,user WHERE item_request.oid='$uid' and item_request.itemid=book.cno and book.uid='$uid' and item_request.uid=user.cid and item_request.item_type='book' and item_request.status='Pending'";
 
     
     echo $qryo;
 $result3= mysql_query($qryo,$con);
   $itemtype='book';
      while($row3 = mysql_fetch_array($result3))
      {
   echo "<tr>
 
<td>".$row3['cname']."</td>
            <td>".$row3['citem_for']."</td>
<td>".$itemtype."</td>   
<td>".$row3['cusername']."</td>
             <td>".$row3['status']."</td>
               
         <td><a href='transactions.php?status1=".$itemtype."&rno=".$row3['rno']."&status=Approved'>Approve</a></td> 
            <td><a href='transactions.php?status1=".$itemtype."&rno=".$row3['rno']."&status=Rejected'>Reject</a></td>              
  
 </tr>"  ;                          
 
   
      }
 
 echo "</table>";   
 }
 
 
//others
 if (($_REQUEST["status"])=="others")   
 {
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);    
    echo "<div>";
 echo "<table border='1' class='tab' cellspacing='3' cellpadding='3' >";
 echo "<tr style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;'> 
 <td>Name</td>
<td>Purpose</td>
<td>Item Type</td>
<td>Requested by</td>
<td>Current Status</td>
<td>Approve</td>
<td>Reject</td>
  </tr>";
 echo "</div>";

 
 
     $qryo="SELECT item_request.oid,item_request.item_type,item_request.uid,item_request.itemid,item_request.rno,
         others.citem_for,others.cname,others.uid,others.status,user.cusername,user.cid FROM item_request,
         others,user WHERE item_request.oid='$uid' and item_request.itemid=others.cno and others.uid='$uid' and item_request.uid=user.cid and item_request.item_type='others' and item_request.status='Pending'";
     echo $qryo;
 $result3= mysql_query($qryo,$con);
   $itemtype='others';
   
      while($row3 = mysql_fetch_array($result3))
      {
   echo "<tr>
 
<td>".$row3['cname']."</td>
            <td>".$row3['citem_for']."</td>
<td>".$itemtype."</td>   
<td>".$row3['cusername']."</td>
             <td>".$row3['status']."</td>
               
         <td><a href='transactions.php?status1=".$itemtype."&rno=".$row3['rno']."&status=Approved'>Approve</a></td> 
            <td><a href='transactions.php?status1=".$itemtype."&rno=".$row3['rno']."&status=Rejected'>Reject</a></td>              
  
 </tr>"  ;                          
 
   
      }
 
 echo "</table>";       
 }

 //ent              
 
if (($_REQUEST["status"])=="ent")   
 {
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);    
  echo "<table border='1' class='tab' cellspacing='3' cellpadding='3' >";
 echo "<tr style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;' > 
 <td>Name</td>
<td>Purpose</td>
<td>Item Type</td>
<td>Requested by</td>
<td>Current Status</td>
<td>Approve</td>
<td>Reject</td>
  </tr>";
 $qryo="SELECT item_request.oid,item_request.item_type,item_request.uid,item_request.itemid,item_request.rno,
         entertainment.citem_for,entertainment.cname,entertainment.uid,entertainment.status,user.cusername,user.cid FROM item_request,
         entertainment,user WHERE item_request.oid='$uid' and item_request.itemid=entertainment.cno and entertainment.uid='$uid' and item_request.uid=user.cid and item_request.item_type='ent' and item_request.status='Pending'";
 
     
     echo $qryo;
 $result3= mysql_query($qryo,$con);
   $itemtype='ent';
      while($row3 = mysql_fetch_array($result3))
      {
   echo "<tr>
 
<td>".$row3['cname']."</td>
            <td>".$row3['citem_for']."</td>
<td>".$itemtype."</td>   
<td>".$row3['cusername']."</td>
             <td>".$row3['status']."</td>
               
         <td><a href='transactions.php?status1=".$itemtype."&rno=".$row3['rno']."&status=Approved'>Approve</a></td> 
            <td><a href='transactions.php?status1=".$itemtype."&rno=".$row3['rno']."&status=Rejected'>Reject</a></td>              
  
 </tr>"  ;                          
 
   
      }
 
 echo "</table>";   
 }
 
 
 
 
 
 //cloth              
 
if (($_REQUEST["status"])=="cloth")   
 {
    $con=  mysql_connect("localhost", "root","") or die("cant connect");
    mysql_select_db("cc", $con);    
 echo "<table border='1' class='tab' cellspacing='3' cellpadding='3' >";
 echo "<tr id='row' style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;' > 
 <td>Name</td>
<td>Purpose</td>
<td>Item Type</td>
<td>Requested by</td>
<td>Current Status</td>
<td>Approve</td>
<td>Reject</td>
  </tr>";

 
     $qryo="SELECT item_request.oid,item_request.item_type,item_request.uid,item_request.itemid,item_request.rno,
         cloth.citem_for,cloth.cdes,cloth.uid,cloth.status,user.cusername,user.cid FROM item_request,
         cloth,user WHERE item_request.oid='$uid' and item_request.itemid=cloth.cno and cloth.uid='$uid' and item_request.uid=user.cid and item_request.item_type='cloth' and item_request.status='Pending'";
 
     echo $qryo;
 $result3= mysql_query($qryo,$con);
   $itemtype='cloth';
   
      while($row3 = mysql_fetch_array($result3))
      {
   echo "<tr>
 
<td>".$row3['cname']."</td>
            <td>".$row3['citem_for']."</td>
<td>".$itemtype."</td>   
<td>".$row3['cusername']."</td>
             <td>".$row3['status']."</td>
               
         <td><a href='transactions.php?status1=".$itemtype."&rno=".$row3['rno']."&status=Approved'>Approve</a></td> 
            <td><a href='transactions.php?status1=".$itemtype."&rno=".$row3['rno']."&status=Rejected'>Reject</a></td>              
  
 </tr>"  ;                          
 
   
      }
 
 echo "</table>";   
 }
 
 
 //status change
 
if (($_REQUEST["status"])=="Approved"||($_REQUEST["status"])=="Rejected" )   
 { 
 
 
         $con=  mysql_connect("localhost","root","") or die("Sorry!!!Cannot Connect");
        mysql_select_db("cc",$con);
       $qryup="UPDATE item_request SET status='" . $_REQUEST["status"] . "' WHERE rno='".$_REQUEST["rno"]."'";
           echo $qryup; 
If(mysql_query($qryup,$con))
        {
            echo"<h1>Data Updated</h1>";
        }
        else
        {
            echo"Error".mysql_error();
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
<!--    <h2>Transactions</h2>-->
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
<!--    <style>
        body
        {
            background:url('images/sss.jpg');
               // background-repeat: no-repeat;
                //background-size: cover;
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
#row
{
                    background-color:rgba(00,00,00,0.3);
                    height:20px;
}
            .tab
            {
                font-color:#ffffff;
                //font-style:Kristen ITC;
                
               background:transparent;
               background-size: cover;
                position: relative;
                margin: 0 auto;
               background-repeat:no-repeat;
                border:1 solid #000000;
                padding-left:0px;
                padding-bottom:3px;
                padding-top:3px;
                box-shadow: #474141;
                align:center;
               
                padding:0px;
               text-align: "center";
                color:#000000;
                border:0;
                width:auto;
           height: auto;
                //column-width:400px;
           row-height:30px;
          // cellspacing:0;
           cellpadding:0;
           position:relative;
           top:150px;
            }
 td
 {
     font-size:large;
     //width:300px;
    text-align:center;
 }
 #new
 {
     position: relative;
     bottom: 0;
 }
 
 #new
 {
     position: relative;
     top: 120px;
 }

    </style>-->
    </head>
    <body>
<!--        <p> Hi</p>-->
         <div class="header">
            <?php
            include'home/head.php';
            ?>
<!--        <iframe width="100%" height="200px" src="head.php"  frameborder="0" style="border:0" allowfullscreen ></iframe>-->
</div>

        <div id="new">
        <ul>
            <li><a href='transactions.php?status=book'>Books</a></li>
            <li><a href='transactions.php?status=cloth'>Clothes</a></li>
            <li><a href='transactions.php?status=ent'>Entertainment</a></li>
            <li><a href='transactions.php?status=others'>Others</a></li>
          
                    </ul>
     
<a href='myrequests.php?status=myrequests'>My Requests</a>

<a href='logout.php?status='>Log out</a>
        </div>   
    </body>
</html>
<?php
}
 else {
    header('Location:home/homepg.php');
}

?>

 