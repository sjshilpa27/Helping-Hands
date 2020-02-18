<?php session_start();

if(isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
echo  $_SESSION["username"];
echo " ".$_SESSION["userid"];
$uid=$_SESSION["userid"];
include 'db.php';
include 'menu.php';
}
 else {
include 'firstmenu.php';
 }

?>
<html>
    <head>
        <style> 
            .a{
                float:right;
               font-size:50px;
            }
            </style>
<link rel="stylesheet" href="lib/jquery-nicemodal-1.0/jquery-nicemodal.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">        
  </head>
    <body>

            <div class='a'>

        
        
        
        
        <button data-url="demo-modal.html" id="demo">Register</button>
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

        
        <h3> Highasdfghjkasdfghjkasdfghjklasdfghjklasdfghjkasdfghjiiiiiiiiii</h3>
    <a class='a' href="login.php">LOg in </a>
            </div>
    </body>
    
    
</html>







