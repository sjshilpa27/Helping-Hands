<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flipster Demo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=550, initial-scale=1">
    
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="../src/css/jquery.flipster.css">
    <link rel="stylesheet" href="css/flipsternavtabs.css">
</head>
<body>
<header id="Main-Header">
	<a href="index.html" class="Button Small Float-Right">Return to Overview</a>

</header>
<div id="Main-Content">
	<div class="Container">
<!-- Flipster List -->	
		<div class="flipster">
		  <ul>
		  	<li>
		  		<img src="img/Sport-1.jpeg">
		  	</li>
		  	<li>
		  		<img src="img/Sport-2.jpeg">
		  	</li>
		  	<li>
		  		<img src="img/Sport-3.jpeg">
		  	</li>
		  	<li>
		  		<img src="img/Sport-4.jpeg">
		  	</li>
		  	<li>
		  		<img src="img/Sport-7.jpeg">
		  	</li>
		  	<li>
		  		<img src="img/Sport-5.jpeg">
		  	</li>
		  	<li>
		  		<img src="img/Sport-6.jpeg">
		  	</li>
		  </ul>
		</div>
<!-- End Flipster List -->

	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../src/js/jquery.flipster.js"></script>
<script>
 $jQuery = $.noConflict();
    // Other library code here which uses '$'
	$(function(){ 
		$(".flipster").flipster({
			style: 'carousel'
$(document).ready(function){
    
}
    	});


</script>
</body>
</html>
