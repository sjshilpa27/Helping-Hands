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
    <h2>Welcome</h2>
    </head>
    <body>
        <p> Hii</p>
        <ul>
            <li><a href='search.php?status=book'>Books</a></li>
            <li><a href='search.php?status=cloth'>Clothes</a></li>
            <li><a href='search.php?status=ent'>Entertainment</a></li>
            <li><a href='search.php?status=others'>Others</a></li>
            
                    </ul>

<?php session_start();

if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
         

 $con=mysql_connect("localhost", "root","") or die("cant connect");
        mysql_select_db("cc", $con);
       
        ?>
 <ul>
        
            <li><a href='bookenter.php?status=book'>Bookenter</a></li>
            <li><a href='clothesenter.php?status=cloth'>Clothesenter</a></li>
            <li><a href='entertainment.php?status=ent'>Entertainmententer</a></li>
            <li><a href='others.php?status=others'>Othersenter</a></li>
            
                    </ul>

<a href='usersearch.php?status='>My Profile</a>
<a href='logout.php?status='>Log out</a>
        
<?php }      
        ?>
    </body>
</html>
