<?php 
if(isset($_REQUEST["post"]))
{

echo"<script>alert('Your Query Has Been Posted! Thank You!');window.location.href='userhomepg.php';</script>";

}
?>



<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
   
    
    
    
     <style type="text/css">
            *
            {
                padding:0;
                margin:0;
            }
            body
            {
                background:url('uploads/q.jpg');
                background-repeat: no-repeat;
                background-size: cover;
            }
            #window{
position: relative;
bottom:0;
margin: 400px 300px 0 70px;
font-size: 30px;
font-style:Monotype Cursiva;
background-size: cover;
    width: 500px;
    height:200px ;
    background-position: center;
        background-repeat: no-repeat;
        border-radius:10px;
        text-align:center; 
        
}
            
        </style>

    
    
    
    
    
    </head>
    <body>
        <?php include 'head.php' ?>
        <div id='window'>
            <h2>Post your Query Here</h2> 
        <form name="query" action="query.php" method="GET" >
          
            <table class="tab" border="0" align="center" width="400" >
                   
                     <tr>
                        <td>Name</td>
                        <td><textarea row="20" cols="20"   name="txtname" class="pro" value="" placeholder=""></textarea></td>
                    </tr>
                    <tr>
                        <td>Email Id</td>
                         <td>  <input type="email" name="email" value="" /></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                         <td>  <input type="number" name="phno" value="" /></td>
                    </tr>
                    
                    <tr align=center>
                        <td colspan='2'>

                    <input type="submit" class="formbutton" value="Post" name="post" /></td>
                       
                    </tr>
                    <tr>
                     </tbody>    
            </table>
       
        </form> 
                    </div>



 <?php
        // put your code here
        ?>
    </body>
</html>
