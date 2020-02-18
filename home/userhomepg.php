<?php session_start();

if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
         
  $uid=$_SESSION["userid"];
 $con=mysql_connect("localhost", "root","") or die("cant connect");
        mysql_select_db("cc", $con);
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
*{
  padding: 0;
  margin: 0;
  
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




.outer {
/*//  border-bottom: 5px solid #15e1af;*/
  /*background-color: red;*/
  width: 1350px;
  height:400px;
  text-align: center;
line-height: 50px;
  cursor: pointer;
  color: white;
  font-size: 30px;
position:relative;
    top:100px;
    left:0px;
float:left;
}



body {
  font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
  color: #000000;
  background-color: b; 

/* //background:url('uploads/d.jpg');*/
 
  height: 100%;
  width: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}


.menu {
/*//  border-bottom: 5px solid #15e1af;*/
  background-color: #54EFC9;
/* // width: 50px;*/
  height:400px;
  text-align: center;
/*//line-height: 50px;*/
/*//margin-top:100px;  */
cursor: pointer;
  color: white;
  font-size: 30px;
position:relative;
/*    //top:1000px;*/
float:left;
}


.social {
/*//  border-bottom: 5px solid black;
//  background-color: white;*/
  width: 50px;
  height: 300px;
  text-align: right;
/*//line-height: 00px;*/
  cursor: pointer;
  color: white;
  font-size: 30px;
/*//margin-top:150px; */
  position: relative;
  top:30px;
  right: 0;
float:right;
position: fixed;
}


.slider {
/*//  border-bottom: 5px solid black;
//  background-color: white;*/
  width: 100%;
  height:300px;
  text-align: center;
/*//line-height: 00px;*/
  cursor: pointer;
  color: white;
  font-size: 30px;
/*margin-top:150px; */
  position: relative;
  bottom:0px;
  left:0;
  right: 0;
  z-index: 9999;
  position: fixed;
}



.log {
/*//  border-bottom: 5px solid black;
//  background-color: white;*/
  width: 100px;
  height:50px;
  text-align: center;
/*//line-height: 00px;*/
  cursor: pointer;
  font-size: 30px;
margin-top:100px;
border-radius: 80%,80%;
  position: relative;
  bottom:50px;
  right: 0;
float: right;
}













</style>

    <link rel="stylesheet" href="lib/jquery-nicemodal-1.0/jquery-nicemodal.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    </head>

    <body>
        <div class="header">
            <?php
            include'head.php';
            ?>
<!--        <iframe width="100%" height="200px" src="head.php"  frameborder="0" style="border:0" allowfullscreen ></iframe>-->
</div>


        <div class="outer">
       <div class="menu">
s
  <?php include'menu.php';?>
       </div>

        <div class="social">
            <iframe src="social.html" width="45" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
        </div>
       <div class="slider">
            <iframe src="../flip/demo/demo2.html" width="100%" height="300" frameborder="0" style="border:0" scrolling="no" allowfullscreen></iframe>
</div>


        <?php
        // put your code here
        ?>
    </body>
</html>
<?php
}
else
{
    header('Location:homepg.php');
}



?>