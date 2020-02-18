<?php session_start();

if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
$uid=$_SESSION["userid"];
include 'db.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_REQUEST["id"]))
{
    
    $id=$_REQUEST["id"];
    $status=$_REQUEST["status"];
    echo $id;
    echo $status;

    if($status=="book")
    {
        
        $qry1="SELECT uid,cduration,cname FROM book where cno=".$id;
        $result= mysql_query($qry1,$con);
        $row = mysql_fetch_array($result);        
        $oid=$row['uid'];
        $cdur=$row['cduration'];
        $name=$row['cname'];
        
        //echo $qry1;
        $qry="INSERT INTO item_request(item_type, uid, date, itemid, cduration,oid,name)
                VALUES ('".$status."','".$uid."', now(),'".$id."','".$cdur."','".$oid."','".$name."')";
        mysql_query($qry,$con);
        //echo $qry;
        echo"<script>alert('Your Request Has Been Processed.You will be notified shortly. Thank you!');window.location.href='home/userhomepg.php';</script>";
    }
    
if($status=="cloth")
    {
        
        $qry1="SELECT uid,cduration,cdes FROM cloth where cno=".$id;
        $result= mysql_query($qry1,$con);
        $row = mysql_fetch_array($result);        
        $oid=$row['uid'];
        $cdur=$row['cduration'];
        $name=$row['cdes'];
        
        //echo $qry1;
        $qry="INSERT INTO item_request(item_type, uid, date, itemid, cduration,oid,name)
          VALUES ('".$status."','".$uid."', now(),'".$id."','".$cdur."','".$oid."','".$name."')";
        mysql_query($qry,$con);
        echo"<script>alert('Your Request Has Been Processed.You will be notified shortly. Thank you!');window.location.href='home/userhomepg.php';</script>";
        
    }
    

    
if($status=="ent")
    {
        
        $qry1="SELECT uid,cduration,cname FROM entertainment where cno=".$id;
        $result= mysql_query($qry1,$con);
        $row = mysql_fetch_array($result);        
        $oid=$row['uid'];
        $cdur=$row['cduration'];
        $name=$row['cname'];

        echo $uid;
        echo $cdur;
        //echo $qry1;
        $qry="INSERT INTO item_request(item_type, uid, date, itemid, cduration,oid,name)
                VALUES ('".$status."','".$uid."', now(),'".$id."','".$cdur."','".$oid."','".$name."')";
        mysql_query($qry,$con);
        echo"<script>alert('Your Request Has Been Processed.You will be notified shortly. Thank you!');window.location.href='home/userhomepg.php';</script>";
        
    }
    
    
    
if($status=="others")
    {
        
        $qry1="SELECT uid,cduration,cname FROM others where cno=".$id;
        $result= mysql_query($qry1,$con);
        $row = mysql_fetch_array($result);        
        $oid=$row['uid'];
        $cdur=$row['cduration'];
                $name=$row['cname'];

        //echo $qry1;
        $qry="INSERT INTO item_request(item_type, uid, date, itemid, cduration,oid,name)
                VALUES ('".$status."','".$uid."', now(),'".$id."','".$cdur."','".$oid."','".$name."')";
        mysql_query($qry,$con);
        echo"<script>alert('Your Request Has Been Processed.You will be notified shortly. Thank you!');window.location.href='home/userhomepg.php';</script>";
        
    }
    
    
    
}

?>
    <?php
}
 else {
    header('Location:home/homepg.php');
}

?>
