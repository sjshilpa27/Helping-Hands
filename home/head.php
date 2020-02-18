<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Flat Horizontal Toggle Menu Demo</title>
<style class="cp-pen-styles">
* {
  -webkit-transition-timing-function: ease-out;
  /* Safari and Chrome */
  transition-timing-function: ease-out;
  box-sizing: border-box;
  text-decoration: none;
  list-style: none;
  padding: 0;
  margin: 0;
}
body{
    margin: 0;
        padding:0;
        background-color: black;
}

.toggleNav {
    border-bottom: 5px solid black;
  background-color: black;
  width: 100%;
  height: 80px;
/*  //text-align: left;*/
 /*line-height: 80px;*/
  cursor: pointer;
  color: white;
  font-size: 30px;

}

.toggleNav:hover { border-bottom: 5px solid #13ca9d; }

nav {
  width: 100%;
  min-height:50px;
  margin-top: 0;
}
/*//#2f3976*/
.toggleNavButton {
  transition-duration: 0.5s;
  width: 40px;
  height: 2px;
  background-color: white;
  position: absolute;
  right: 25px;
  top: 25px;
/*//  margin-right:-20px;*/
  border-radius: 2px;
}

.toggleNavButton:before,
.toggleNavButton:after {
  border-radius: 2px;
  transition-duration: 0.5s;
  content: "";
  position: absolute;
  top: 10px;
  right:15px;
  background-color: white;
  width: 40px;
  height: 2px;
}

.logo{
    width:100px;
    height:70px;
    position:absolute;
    left:0;
    margin-left: 0;
    
}
.toggleNavButton:after { top: 20px; }

.toggleNavButton.active { width: 0;  top:30px; }

.toggleNavButton.active:after {
  top: 10px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.toggleNavButton.active:before {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}
.toggleNav h2{
    font-size: 40px;
    line-height: -15px;
    margin-top: 0px;
}
#subnav {
  width: 100%;
  border-bottom: 0px solid #e60b3e;
  background-color: #F64870;
  transition-duration: 0.2s;
  overflow: hidden;
  height:0px;
  /*z-index: 99999999999999999999999999999999999999999999999999999;*/
}

#subnav.active {
  border-bottom: 5px solid #e60b3e;
  height: 30px;

}

#subnav ul {
  width: 700px;
  margin: 0 auto;

}

#subnav ul li {
  transition-duration: 0.3s;
  display: inline-block;
  text-align: center;
  width: 150px;
  padding: 0px 0;
  height: 30px;
}

#subnav ul li a { color: white; }

#subnav ul li:hover { background-color: #e60b3e; }
</style>
</head>

<body>
<nav>
  <div class="toggleNav">
      <div class="logo"><img src="uploads/customLogo.jpg" height="80" width="250"></div>
      <h2>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Company Company</h2>
      <div class="toggleNavButton">
      </div>
  </div>
  <div id="subnav">
    <ul>
      <li> <a href="http://localhost/cc/home/userhomepg.php">Home</a>
      </li>
      <li> <a href="../search.php">NGOs</a></li>
      <li> <a href="../search.php">Look In</a> </li>
   
      <li> <a href="header.php">FAQs</a> </li>
    </ul>
  </div>
</nav>
<div class="jquery-script-ads" align="center"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script>
$(".toggleNav").click(function () {
    $("#subnav").toggleClass("active");
    $(".toggleNavButton").toggleClass("active");
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
</body>
</html>
