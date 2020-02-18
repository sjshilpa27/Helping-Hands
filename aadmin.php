<?php session_start();

if(isset($_SESSION["ausername"]))
{
echo  $_SESSION["ausername"];
//$con=mysql_connect("localhost", "root","") or die("cant connect");
//mysql_select_db("cc", $con);
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,600" rel="stylesheet" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="contentWrapper">

    <div id="contentLeft">

        <ul id="leftNavigation">

            <li class="active">
                <a href="#"><i class="fa fa-coffee leftNavIcon"></i> Manage Accounts</a>
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-angle-right leftNavIcon"></i> Admin's Account</a>
                    </li>
                    <li>
                        <a href='manageacc.php?status=show'><i class="fa fa-angle-right leftNavIcon"></i> User's Account</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-flask leftNavIcon"></i> Manage Uploads</a>
                <ul>
                    <li>
                        <a href="adminsearch.php??btnshow_book=Show+All"><i class="fa fa-angle-right leftNavIcon"></i> Bookshelf</a>
                    </li>
                    <li>
                        <a href="adminsearch.php?btnshow_cloth=Show+All"><i class="fa fa-angle-right leftNavIcon"></i> Wardrobe</a>
                    </li>
                    <li>
                        <a href="adminsearch.php??btnshow_ent=Show+All"><i class="fa fa-angle-right leftNavIcon"></i> Entertaining Stuffs</a>
                    </li>
                 <li>
                        <a href="adminsearch.php??btnshow_others=Show+All"><i class="fa fa-angle-right leftNavIcon"></i> Others</a>
                    </li>
                
                
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-truck leftNavIcon"></i> Manage Transactions</a>
                <ul>
                    <li>
                        <a href="transactions.php"><i class="fa fa-angle-right leftNavIcon"></i> Bookshelf</a>
                    </li>
                    <li>
                        <a href="transactions.php"><i class="fa fa-angle-right leftNavIcon"></i> Wardrobe</a>
                    </li>
                    <li>
                        <a href="transactions.php"><i class="fa fa-angle-right leftNavIcon"></i> Entertaining Stuffs</a>
                    </li>
                     <li>
                        <a href="transactions.php"><i class="fa fa-angle-right leftNavIcon"></i> Others</a>
                    </li>
                
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope-o leftNavIcon"></i> My Portal</a>
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-angle-right leftNavIcon"></i> Queries</a>
                    </li>
                <li>
                        <a href="#"><i class="fa fa-angle-right leftNavIcon"></i> Settings</a>
                    </li>
                       </ul>
            </li>
    
            <li>
            <a href="#"><i class="fa fa-envelope-o leftNavIcon"></i> Logout</a>
            <ul>
                  <li>
                        <a href="logoutadmin.php"><i class="fa fa-angle-right leftNavIcon"></i> logout</a>
                    </li>
            </ul>
            </li>
        </ul>
            </div>


</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery.ssd-vertical-navigation.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>







          <?php
}
 else {
    header('Location:adminlogin.php');
}

?>








