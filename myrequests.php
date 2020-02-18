<?php session_start();

if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
         
  $uid=$_SESSION["userid"];
 $con=mysql_connect("localhost", "root","") or die("cant connect");
        mysql_select_db("cc", $con);
        
       
 if (($_REQUEST["status"])=="myrequests")   
 {
echo "<table border='1' cellspacing='3' cellpadding='3' id='tab'>";
 echo "<tr style='background:#000000; font-weight:bold; color:#ffffff; font-size:large;'> 
 <td>Product Name</td>
<td>Item Type</td>
<td>Uploaded By</td>
<td>Status</td>
  </tr>";
     $qry="SELECT item_request.uid,item_request.oid,item_request.name,item_request.item_type,item_request.status,user.cid,user.cusername FROM item_request,user WHERE uid='$uid' and item_request.oid=user.cid";
                     echo $qry;
  $result=mysql_query($qry,$con);
      while($row = mysql_fetch_array($result))
      {
 
echo "<tr>
 <td>".$row['name']."</td>
        
<td>".$row['item_type']."</td>   
<td>".$row['cusername']."</td>
             <td>".$row['status']."</td>

        
 </tr>"  ;                          

      }

     $qry1="SELECT user.ccontact ,user.cname,item_request.name ,user.cemail,item_request.uid,item_request.oid FROM user join item_request  on user.cid=item_request.oid WHERE  user.cid='".$uid."' and item_request.status='Approved'";
                     echo $qry1; 
                     $result=mysql_query($qry1,$con);
      while($row = mysql_fetch_array($result))
      {
 $uname=$row['cname'];       
$ucon=$row['ccontact'];   
//$uuser=$row['cusername'];
 $umail=$row['cemail'];
 $itemname=$row['name'];
 echo "<div>";
 echo " Details about Owner <br>";
 echo "Product name:<br>".$itemname;
 echo "Name:<br>".$uname;
 echo "Contact No<br>:".$ucon;
 //echo "Username:".$uname;
 echo "Email-id<br>:".$umail;
 echo "</div>";
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
    </style>
    </head>-->
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

    <body>
<!--        <p> Hi</p>-->
         <div class="header">
            <?php
            include'home/head.php';
            ?>
<!--        <iframe width="100%" height="200px" src="head.php"  frameborder="0" style="border:0" allowfullscreen ></iframe>-->
</div>
                  
    </body>
</html>


  <?php
  }

 else {
    header('Location:home/homepg.php');
}

?>

