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
  height:80px;
  font-size: 30px;
}



.outer {
/*//  border-bottom: 5px solid #15e1af;*/
  /*background-color: red;*/
  width: 1350px;
  height:400px;
  text-align: center;
/*//line-height: 50px;*/
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
  color: #F2F2F2;
  
/* // background:url('uploads/d.jpg');*/
  height: 100%;
  width: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}


.menu {
  border-bottom: 5px solid #15e1af;
  background-color: #54EFC9;
  width: 50px;
  height: 400px;
  text-align: center;
/*line-height: 50px;*/
  cursor: pointer;
  color: white;
  font-size: 30px;
/* //margin-top:50px; */
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
  top:0px;
  right: 0;
float:right;
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
/*//margin-top:150px; */
  position: relative;
  bottom:50px;
  right: 0;
}



.log {
   
  width: 100px;
  height:50px;
  text-align: center;
//line-height: 00px;
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
<?php        include 'head.php';
?>
        </div>
            
            
        <div class="outer">
                 <div class="menu"><marquee bgcolor=black width=250 height=300 direction=up><img src="uploads/child1.png" width=250 height=200 >
                     <img src="uploads/download.jpg" width=250 height=200><img src="uploads/d.jpg" width=250 height=200></marquee>            
                </div>
      
            
            
            
            
            
            
</div>
        <div class="social">
            <iframe src="social.html" width="45" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div> 
    </div>
   <div class='log'>
<button data-url="demo-modal.html" id="demo">Log In</button>
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
<div class="slider">

        <iframe src="../flip/demo/demo2.html" width="100%" height="300" frameborder="0" style="border:0" scrolling="no" allowfullscreen></iframe>

 </div>

        <?php
        // put your code here
        ?>
    </body>
</html>
