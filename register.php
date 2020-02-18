<html>
     <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            #firstdiv
{
    //background-color: #e74c3c;
    height: 300px;
    width: 300px;
    float: left;
    
}
 #seconddiv
{
    //background-color: #e74c3c;
    height: 500px;
    width: 300px;
 float: left;   
}

            
        </style>
    </head>
    <body>
   

<div class="container-fluid" style="margin-top: 20px; ">
    <div class="row">
        <div class="col-lg-12">
            <form action="registeration.php">
                <div id="firstdiv">
                    <legend>Register</legend>
                <div class="form-group">
                    <!--<label for="nome" class="sr-only">Userid:</label>-->
                    <input type="text" name="txtuid" id="nome" class="form-control" placeholder="Name" 
                        hidden
                           readonly value="us<?php
                           $con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
                           mysql_select_db("cc", $con);
                           $qry1 = "SELECT MAX(CAST(SUBSTRING(cid,3) AS unsigned)) AS maxid FROM user";
                           mysql_query($qry1, $con);
                           //     echo $qry1;
                           $result = mysql_query($qry1, $con);
                           $row = mysql_fetch_array($result);
                           $id = $row["maxid"] + 1;
                           echo $id
                                   ?>" />
                </div>
                    <div class="form-group">
                    <label for="nome" class="sr-only">Name:</label>
                    <input type="text" id="nome" class="form-control" placeholder="Name" name="txtname">
                            </div>
                 <div class="form-group">
                    <label for="nome" class="sr-only">Username</label>
                    <input type="text" id="nome" class="form-control" placeholder="Username" name="txtuser">
                                    </div>
                <div class="form-group">
                     <label for="nome" class="sr-only">E-mail id</label>
                    <input type="text" id="nome" class="form-control" placeholder="E-mail id" name="txtemail">
                                   </div>        
                <div class="form-group">
                     <label for="nome" class="sr-only">Profession</label>
                    <input type="text" id="nome" class="form-control" placeholder="Profession" name="txtpro">
                                   </div>
                        <div class="form-group">
                     <label for="nome" class="sr-only">Date of Birth</label>
                     <input type="date" id="nome" class="form-control" placeholder="Date of Birth" name="txtdob">      
                </div>        
                <div class="form-group">
                     <label for="nome" class="sr-only">Gender</label>
                     <input type="radio" id="nome" class="form-control"  
                            name="gender" value="Female" checked="checked">Female
                     <input type="radio" id="nome" class="form-control"  
                            name="gender" value="Male" checked="checked">Male
                   </div>
                        <div class="form-group">
                     <label for="nome" class="sr-only">City</label>
                 <select name="txtcity">
                            <option value="">City</option>
<?php
$con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
mysql_select_db("cc", $con);
$qry = "Select  * from city";
$result = mysql_query($qry, $con);
while ($row = mysql_fetch_array($result)) {
    echo "<option value=" . $row[cityno] . ">" . $row[1] . "</option>";
}
?>                </select>
                </div>    
        
 
      
        
                <div class="form-group">
                     <label for="nome" class="sr-only">State</label>
                 <select name="txtstate">
                            <option value="">State</option>
                            <?php
$con = mysql_connect("localhost", "root", "") or die("Sorry! Cannot Connect");
mysql_select_db("cc", $con);
$qry = "Select  * from state";
$result = mysql_query($qry, $con);
while ($row = mysql_fetch_array($result)) {
    echo "<option value=" . $row[csno] . ">" . $row[1] . "</option>";
}
?>  </select>
                </div>
        </div>
                <div id="seconddiv">
                <div class="form-group">
                     <label for="nome" class="sr-only">Address</label>
                     <textarea id="nome" class="form-control" placeholder="Address" name="txtadd" rows="4" cols="20">
                        </textarea>
                     </div>
            <div class="form-group">
                    <label for="nome" class="sr-only">Contact</label>
                    <input type="text" id="nome" class="form-control" placeholder="Contact No" name="txtmobile">
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
					<label for="assunto" class="sr-only">Security Question</label>
					<select name="securityque">
                                <option value="0">--Security Question--</option>
                                <option value="1">My favorite school teacher?</option>
                                <option value="2">My first Phone: </option>
                                <option value="3">My favorite Destination:</option>
                                <option value="4">My biggest dream:</option>
                                <option value="5">My Inspiration:</option>
                            </select></div>
	               <div class="form-group">
					<label for="assunto" class="sr-only">Your Answer</label>
					<input type="password" id="assunto" class="form-control" 
                                               placeholder="Re-enter Password" name="txtans">
				</div>
                    <div>
                </div>
                        <div class="form-group" >
                    <button  type="submit" class="btn btn-primary btn-block" name="btnsave">Submit</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
    </body>
</html>