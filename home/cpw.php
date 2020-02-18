<?php session_start();

if (isset($_REQUEST["btnsave"])) {
    $pass = $_REQUEST["txtpw"];
    $confirmpass = $_REQUEST["txtcpw"];
  $usern=$_SESSION["username"];
      if ($pass == $confirmpass && $pass!="") {
    $con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
        mysql_select_db("cc", $con);
      
        $qry="UPDATE user set cpassword='".$pass."' WHERE cusername='".$usern."'";
          //echo $qry;
        mysql_query($qry, $con);
        
        echo "<script>alert('Password Updated successfully please login with your new password!');
        window.location.href='index_2.php'</script>";
            
    } else {
        echo"Password and Confirm Password did not match!";
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
        <style>
            #demo
            {
                border-radius: 5px;
                background-color:8690ce;
                text-align: center;
            }
            #demo:hover
            {
                cursor: pointer;
                background-color: 6478ef;
            }
        </style>
    </head>
    <body>
<!--        <form action = "cpw.php">
        <table border="1">
                 <tr>
                        <td>Username:</td>
                        <td>?php echo $_SESSION["username"] ;
                             ?>
                             </td>
                    </tr>
                    <tr>
                    <td>Password:</td>
                    <td><input type="password" name="txtpw" value="" /></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td> 
                    <td><input type="password" name="txtcpw" value="" /></td>
                </tr>
                     <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="formbutton" name="btnsave" value="SAVE">
                    </td>
                </tr>
     -->           <div class="container-fluid" style="margin-top: 20px; ">
	<div class="row">
		<div class="col-lg-12">
                    <form action="cpw.php">
				<h3> Change Password</h3>
				<div class="form-group">
					<label for="nome" class="sr-only">Username</label>
					<?php echo  $_SESSION["username"];
                             ?>
                            
				</div>
					<div class="form-group">
					<label for="assunto" class="sr-only">Password</label>
					<input type="password" id="assunto" class="form-control"
                                               placeholder="Password" name="txtpw">
				</div>
    			<div class="form-group">
					<label for="assunto" class="sr-only">Re-enter Password</label>
					<input type="password" id="assunto" class="form-control" 
                                               placeholder="Re-enter Password" name="txtcpw">
				</div>
				
				<div class="form-group">
					<!--<button type="submit" class="btn btn-primary btn-block" name="btnsave">Submit</button>
		-->
                <input id="demo" type="submit" name="btnsave" value="submit">
                                </div>
                                			</form>
		</div>
	</div>
</div>
    </body>
</html>
