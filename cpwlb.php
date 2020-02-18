<?php session_start();
           $user1=$_SESSION["username"]; 
if(isset($_REQUEST["btnsave"]))
{
   
$ans=$_REQUEST["txtans"];
$user=$_REQUEST["txtuser"];
$que=$_REQUEST["securityque"];
    $con = mysql_connect("localhost", "root", "") or die("Sorry cant connect");
 mysql_select_db("cc", $con);
    $sql = "Select security_que,cusername,security_ans from user where 
            security_ans='".$ans."' and security_que='".$que."' and 
            cusername='".$user."'";
    echo $sql;
    $result = mysql_query($sql, $con);
    $row = mysql_fetch_array($result);
     if (mysql_affected_rows() > 0)
     {
          $_SESSION["username"] = $user; 
       header("Location:cpw.php"); 
     }
}
?>
<div class="container-fluid" style="margin-top: 20px; ">
	<div class="row">
		<div class="col-lg-12">
                    <form action="login.php">
				<legend> Change Password</legend>
				<div class="form-group">
					<label for="nome" class="sr-only">Username</label>
					<?php echo $user1;
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
                <button data-url="demo-modal.html" id="demo">Submit</button>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="lib/jquery-nicemodal-1.0/jquery-nicemodal.js"></script>
<script>
$(function(){

    $('button#demo').nicemodal({
        width: '500px',
        keyCodeToClose: 27,
        defaultCloseButton: true,
        closeOnClickOverlay: true,
        closeOnDblClickOverlay: false,
        // onOpenModal: function(){
        //     alert('Opened');
        // },
        // onCloseModal: function(){
        //     alert('Closed');
        // }
    });
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

                                </div>
                                			</form>
		</div>
	</div>
</div>
    </html>