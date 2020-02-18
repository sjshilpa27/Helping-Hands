<?php session_start();


if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
//Update Code STart Here
    if (isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
    {
    
         $con=  mysql_connect("localhost","root","") or die("Sorry!!!Cannot Connect");
        mysql_select_db("cc", $con);
        $qry = "SELECT * FROM others WHERE cno=".$_REQUEST["id"];
         echo $qry;
        $result=mysql_query($qry, $con);
        $row1=mysql_fetch_array($result);
           
    }                


if (isset($_REQUEST["btnsave"])) {
   
    $name = $_REQUEST["txtname"];
    
    $desc = $_REQUEST["txtdesc"];
    $mrp = $_REQUEST["txtmrp"]; 
   $rd = $_REQUEST["rd"];
    $dur=$_REQUEST["txtdur"];
   
    $source_file = $_FILES["upfile"]["tmp_name"];
        $target_file = "uploads/" . $_FILES["upfile"]["name"];
        if (move_uploaded_file($source_file, $target_file)) {
            $imagename = $_FILES["upfile"]["name"];
            $con = mysql_connect("localhost", "root", "") or dir("cant connect");
            mysql_select_db("cc", $con);
            $qry = "INSERT INTO others (cname,cdes,cpic,cmrp,citem_for,cduration,ctime,uid)
                   VALUES ('" . $name . "','" . $desc . "','" . $imagename ."','" . $mrp ."','" . $rd . "','" . $dur . "',now(),'" . $_SESSION["userid"] . "')";
            echo $qry;
            if (mysql_query($qry, $con)) {
    echo"<script>alert('Data Saved Successfully!');window.location.href='home/userhomepg.php';</script>";
        } else {
                echo "Error" . mysql_error();
            }
 }
}
if(isset($_REQUEST["btnupdate"]))
{
    $name = $_REQUEST["txtname"];
    
    $desc = $_REQUEST["txtdesc"];
    $mrp = $_REQUEST["txtmrp"]; 
   $rd = $_REQUEST["rd"];
    $dur=$_REQUEST["txtdur"];
     $imagename = $_FILES["upfile"]["name"];  
        $con=  mysql_connect("localhost","root","") or die("Sorry!!!Cannot Connect");
        mysql_select_db("cc",$con);
       $qry="UPDATE others SET cname='" . $name . "',
               cmrp='" . $mrp . "',cdes='" . $desc . "''
               . ',cpic='" . $imagename . "',citem_for='" . $rd . "',cduration='" . $dur . "',ctime=now() WHERE cno='".$_REQUEST["txthidden"]."'";
           echo $qry; 
If(mysql_query($qry,$con))
        {
    echo"<script>alert('Data Updated Successfully!');window.location.href='home/userhomepg.php';</script>";
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
        
        <style type="text/css">
            *
            {
                padding:0;
                margin:0;
            }
            body
            {
                background:url('images/sss.jpg');
                
               // background-repeat: no-repeat;
              //  background-size: cover;
              
           font-family:Script MT Bold;
           font-style: italic;
           font-size:medium;
           font-weight: 400;
           
            }
            #window{
position: relative;
top: 200px;
margin: 0 auto;
                 background-color:rgba(00,00,00,0.2);
  //background-size:cover;
  //background: none;
  width: 520px;
    height:auto;
 //   background-position: center;
      //  background-repeat: no-repeat;
        border-radius:10px;
        text-align:center; 
        
}
#butn
{
  background-color:none;
    border:1px solid #ffffff;
    
}
#butn:hover
{
    background-color:#474141;
    text-color:#ffffff;
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
                width:520px;
           height: 600px;
                //column-width:400px;
           row-height:30px;
           cellspacing:0;
           cellpadding:0;
            }
            .it 
            {
                width:200px;
                border:1px solid #ffffff;
                background:transparent;
                
                padding:5px;
                border-radius:5px;
                
            }
           
 td
 {
     font-size:large;
     width:300px;
    text-align:center;
 } .header {
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

    <body>
        <div class="header">
            <?php
            include'home/head.php';
            ?>
<!--        <iframe width="100%" height="200px" src="head.php"  frameborder="0" style="border:0" allowfullscreen ></iframe>-->
</div>
              <div id="window"> 
                    <a href="home/userhomepg.php"> <img src="images/close.png" style="float:right; 
                                           margin-top:10px;  margin-right:10px;"/></a>
        
        <form name="others" action="others.php" method="POST" enctype="multipart/form-data">
            <table border="0" class="tab">
                  <tr>
                    <td colspan="2">
                        <h2>OTHERS</h2>
                    </td>
                </tr>         
              
         
        <tr>
                        <td>Name:</td>
                        <td><input type="text" name="txtname" class="it"               <?php
                            if (isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
                    {
                           echo "value='".$row1["cname"]."'";
                    }
                else 
                    {
                    echo "value=''";
                    
                    }
                    ?>
                       /></td>
                    </tr>
                              <tr>
                                <td>Image:</td>
                                <td><input type="file" class="it" name="upfile"  /> 
                                                                   <?php
                  if (isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
                    {
                    echo"<img src='uploads/".$row1["cpic"]."' width='50' height='50'>";
                    }
                    ?>
         </tr>
                            <tr>
                                <td>Description:</td>
                               
                                <td><textarea name="txtdesc" rows="4" cols="20" class="it">
 <?php
                            if (isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
                    {
                           echo $row1["cdes"];
                    }
                else 
                    {
                    echo " ";
                    
                    }
                    ?>

                            </textarea></td>
                    </tr> 

                                            <td>MRP:</td>
                                            <td><input type="text" name="txtmrp" class="it"<?php
                            if (isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
                    {
                           echo "value='".$row1["cmrp"]."'";
                    }
                else 
                    {
                    echo "value=''";
                    
                    }
                    ?> /></td>
                    </tr>
                      <tr>
                        <td>Want to:</td>
                        <td><input class="it" type="radio" name="rd" value="Donate" checked="checked" />Donate
                            <input class="it" type="radio" name="rd" value="Rent" />Rent
                        </td>
                    </tr>

                    <tr>
                        <td>Duration:</td>
                        <td><input type="text" name="txtdur"  class="it"<?php
                            if (isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
                    {
                           echo "value='".$row1["cduration"]."'";
                    }
                else 
                    {
                    echo "value=''";
                    
                    }
                    ?> /></td>
                    </tr>
                    
                    
                    <tr>
                    <td colspan="2" align="center">
                        <?php
                    if (isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
                    {
                 echo" <input type='submit' class='it' name='btnupdate' value='Update'>";
                  
                    }
                    else
                    {
                                  
                   echo" <input type='submit' class='it' name='btnsave' value='Save'>";
                    }
                 ?>
                        <input type="text" name="txthidden" class="it"
                            <?php
                            if (isset($_REQUEST["id"]) && isset($_REQUEST["status"]))
                    {
                           echo "value='".$_REQUEST["id"]."'";
                    }
                else 
                    {
                    echo "value=''";
                    
                    }
                    ?>
                               hidden />
                    </td>
                </tr>

            </table>
        </form>
                  </div>
        </body>
        </html>
        <?php
}
 else {
        header('Location:home/homepg.php');

}

?>
