<?php

session_start();

// PREVENT DIRECT ACCESS TO THANK YOU PAGE
if (!isset($_POST['email'])) {
	echo 'This page cannot be accessed directly.';
	exit();
}
	
/* // FOR VISIBLE MATH QUESTION
$rnumTotal_answer = $_SESSION['rnumTotal'];
$rnumTotal_given = $_POST['rnumTotal'];
		
$_SESSION['rnumTotal'] = "";
	
if ($rnumTotal_answer != $rnumTotal_given) {
	$_SESSION['invalidCaptcha'] = 1;
	print "<script>history.go(-1);</script>";
	exit;
}*/
	
// HIDDEN HONEYPOT
$spa = $_POST["spam"];
	
if (!empty($spa) && !($spa == "4" || $spa == "four")) {
	echo "We're sorry, but you appear to be a spambot";
    exit ();
}
	
if($_SERVER['REQUEST_METHOD']=="POST") {
	$to="leasingoffice@highlandhouseapts.net,highlandhouse@propemail.com,eron@mm4solutions.com";
	//$to='highlandhouse@propemail.com,eron@mm4solutions.com';
	$firstName=$_POST["first-name"];
	$lastName=$_POST["last-name"];
	$email=$_POST["email"];
	$comments=$_POST["comments"];
	
	$from="admin@highlandhouseapts.net";
	$subject="I would like information about Highland House Apartments";
	$message="First Name: ".$firstName."<br>"."Last Name: ".$lastName."<br>"."Email: ".$email."<br>"."Comments: ".$comments;
	$header='From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charser=iso-8859-1'."\r\n".'X-Mailer: PHP/'.phpversion();
	@mail($to,$subject,$message,$header);
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Thank You | Highland House Apartments</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0">
<link href="css/styles-resp.css" type="text/css" rel="stylesheet">
<!-- GOOGLE ANALYTICS /-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12733168-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
(function(a,e,c,f,g,b,d){var h={ak:"994852471",cl:"nwJiCN79_loQ9_yw2gM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[f]||(a[f]=h.ak);b=e.createElement(g);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(g)[0];d.parentNode.insertBefore(b,d);a._googWcmGet=function(b,d,e){a[c](2,b,h,d,null,new Date,e)}})(window,document,"_googWcmImpl","_googWcmAk","script");
</script>

</head>

<body>

<header>
    <div class="wrapper">        
        <svg id="logo-header" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 251.6 97.2" enable-background="new 0 0 251.6 97.2" xml:space="preserve">
        <g>
            <defs>
                <rect id="SVGID_1_" x="-0.4" y="0" width="252" height="97.2"/>
            </defs>
            <clipPath id="SVGID_2_">
                <use xlink:href="#SVGID_1_"  overflow="visible"/>
            </clipPath>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M52.9,62.4v6.7c0,2.8,0.7,3.6,2.6,3.6v0.7h-8.3v-0.7c1.8,0,2.6-0.6,2.6-3.6

		V54.8c0-2.7-0.6-3.6-2.6-3.6v-0.7h8.3v0.7c-1.8,0-2.6,0.7-2.6,3.6v6.5h12.5v-6.5c0-2.8-0.6-3.6-2.6-3.6v-0.7h8.2v0.7

		c-2,0-2.6,0.9-2.6,3.6v14.3c0,2.7,0.6,3.6,2.6,3.6v0.7h-8.2v-0.7c1.8,0,2.6-0.6,2.6-3.6v-6.7H52.9z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M84.1,69.1c0,2.8,0.7,3.6,2.6,3.6v0.7h-8.3v-0.7c1.9,0,2.6-0.7,2.6-3.6V54.8

		c0-2.9-0.6-3.7-2.6-3.7v-0.7h8.3v0.7c-1.9,0-2.6,0.9-2.6,3.7V69.1z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M112.5,73.4c-1.3,0.4-5.4,0.6-6.4,0.6C96,74,92.6,67.9,92.6,62.6

		c0-8.1,6.2-12.7,11.8-12.7c3.2,0,4.5,1.1,6.3,1.1c0.7,0,1-0.2,1.3-0.8h0.7V57H112c-0.6-4.4-4.5-6.2-7.6-6.2

		c-4.7,0-8.3,4.1-8.3,10.4c0,6.7,4,11.7,9.5,11.7c1.6,0,3.8-0.4,3.8-2.4V68c0-2.8-0.6-3.8-2.5-3.8H106v-0.7h9.3v0.7

		c-2.2,0-2.8,1.1-2.8,3.1V73.4z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M126.8,62.4v6.7c0,2.8,0.7,3.6,2.6,3.6v0.7h-8.3v-0.7c1.8,0,2.6-0.6,2.6-3.6

		V54.8c0-2.7-0.6-3.6-2.6-3.6v-0.7h8.3v0.7c-1.8,0-2.6,0.7-2.6,3.6v6.5h12.5v-6.5c0-2.8-0.6-3.6-2.6-3.6v-0.7h8.2v0.7

		c-2,0-2.6,0.9-2.6,3.6v14.3c0,2.7,0.6,3.6,2.6,3.6v0.7h-8.2v-0.7c1.8,0,2.6-0.6,2.6-3.6v-6.7H126.8z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M168.1,73.4h-16.6v-0.7c1.8,0,2.6-1,2.6-3.8V54.4c0-2.6-0.8-3.3-2.6-3.3v-0.7

		h8.2v0.7c-1.9,0-2.6,1.2-2.6,3.6v15.4c0,1.8,0.7,2.2,2.6,2.2h4.6c2.8,0,3.5-0.6,4.5-3.9h0.7L168.1,73.4z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M182.2,53L182.2,53l-3.3,9.7h6.5L182.2,53z M185.9,64.1h-7.4l-1.6,4.6

		c-0.8,2.2-1.2,4,1.2,4v0.7h-5.9v-0.7c2.2-0.3,2.7-1.5,3.4-3.6l6.3-18.9h2.4L191,70c0.7,2.1,1.2,2.8,3.3,2.8v0.7h-8.1v-0.7

		c1.6,0,2.3-0.7,1.8-2.2L185.9,64.1z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M219,73.4h-0.7l-16.2-20h-0.1v16.1c0,2.3,0.9,3.2,3,3.2v0.7h-7v-0.7

		c1.9,0,2.8-0.6,2.8-3.9V55.4c0-2.6-0.7-4-3.4-4.3v-0.7h5.9l14.4,17.9h0.1V54.9c0-3-0.8-3.8-2.8-3.8v-0.7h6.9v0.7

		c-2.2,0-3,0.9-3,3.6V73.4z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M233.6,68.3c0,3.6,0.8,4.3,2.9,4.3h2.4c5.7,0,9.1-3.9,9.1-10.2

		c0-5.5-2.8-11-10-11h-4.4V68.3z M230.6,54.8c0-2.8-0.7-3.6-2.6-3.6v-0.7h10.6c8.8,0,13,5.9,13,11.9c0,5.8-3.6,11.1-12.7,11.1H228

		v-0.7c1.8,0,2.6-0.8,2.6-3.6V54.8z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M72.3,88v4.9c0,2,0.5,2.7,1.9,2.7V96h-6.1v-0.5c1.3,0,1.9-0.4,1.9-2.7V82.4

		c0-2-0.4-2.7-1.9-2.7v-0.5h6.1v0.5c-1.3,0-1.9,0.5-1.9,2.7v4.8h9.2v-4.8c0-2.1-0.4-2.7-1.9-2.7v-0.5h6v0.5c-1.4,0-1.9,0.7-1.9,2.7

		v10.5c0,2,0.5,2.7,1.9,2.7V96h-6v-0.5c1.3,0,1.9-0.4,1.9-2.7V88H72.3z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M99.2,95.8c4.2,0,6.4-4,6.4-8.1c0-5.3-2.8-8.3-6.3-8.3c-4,0-6.5,3.3-6.5,8.1

		C92.8,92.5,95.4,95.8,99.2,95.8 M99.3,78.8c5,0,8.9,3.9,8.9,8.8c0,5-4,8.9-9,8.9s-9-3.9-9-8.9S94.1,78.8,99.3,78.8"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M125.5,93.7c-1.6,1.9-3.4,2.8-5.6,2.8c-4.1,0-5.7-2.9-5.7-5.8v-8.3

		c0-2.2-0.6-2.7-1.9-2.7v-0.5h6.1v0.5c-1.4,0-1.9,0.5-1.9,2.6v8.5c0,2.6,1.4,4.4,4.3,4.4c1.9,0,3.6-1,4.8-2.8V82.4

		c0-1.9-0.4-2.6-1.8-2.7v-0.5h5.9v0.5c-1.4,0-1.9,0.6-1.9,2.7v10.5c0,2.2,0.6,2.7,1.9,2.7V96h-4.1V93.7z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M144.7,82.9h-0.5c-0.3-2.5-2-3.5-3.7-3.5c-1.8,0-3,1-3,2.5

		c0,3.1,4.3,3.9,6.7,6.4c1.2,1.2,1.5,2.2,1.5,3.4c0,2.6-2.1,4.8-4.8,4.8c-1.8,0-3.3-0.9-3.9-0.9c-0.3,0-0.5,0.2-0.6,0.6h-0.5v-4.6

		h0.5c0,3.1,2.6,4.1,4.1,4.1c2,0,3.4-1.2,3.4-3c0-2.9-4.5-4.3-6.4-6.1c-1-1-1.4-2.2-1.4-3.5c0-2.6,1.9-4.4,4.6-4.4

		c1.8,0,2.6,0.6,3.3,0.6c0.3,0,0.3-0.1,0.4-0.5h0.5V82.9z"/>
            <path clip-path="url(#SVGID_2_)" fill="#67000C" d="M162.2,89.7h-0.5c-0.4-1.4-0.6-1.6-2.4-1.6h-4.2v6c0,0.8,0.3,1.1,1.2,1.1h2.9

		c2.5,0,3.1-0.1,4.1-2.3h0.5l-0.8,3.1H151v-0.5c1.3,0,1.9-0.4,1.9-2.6V82.4c0-2.1-0.5-2.7-1.9-2.7v-0.5h12.1V82h-0.3

		c-0.4-1.9-1-2-2.8-2h-4.9v7.2h4.7c1.1,0,1.6-0.2,1.8-1.6h0.5V89.7z"/>
            <path clip-path="url(#SVGID_2_)" fill="#004A80" d="M52.4,30.4c-21.9,12.9-21.9,47.6,0,60.5c-0.4-0.2,1-4.4,0-5

		c-8.8-5.2-15.4-14.6-15.9-25c-0.4-10.4,7.4-20.4,15.9-25.5C53.4,34.8,52,30.6,52.4,30.4"/>
            <path clip-path="url(#SVGID_2_)" fill="#004A80" d="M52.5,29c1.2-0.7-0.5-6,0-6.3C46,26.5,40.7,32,37,38.6c-3.7,6.8-4.9,14.4-5,22

		c-0.1,13.5,5.1,26,15.3,34.3c1.9-0.7,3.7-1.5,5.4-2.4c-0.1-0.1-0.1-0.2-0.2-0.2c-11-6.4-19.8-18.6-19.9-31.7

		C32.5,47.6,41.8,35.3,52.5,29"/>
            <path clip-path="url(#SVGID_2_)" fill="#004A80" d="M52.3,13.5c-8,4.7-14.6,11.4-19.1,19.5c-4.8,8.5-6.3,18-6.4,27.6

		C26.7,74.3,31,87.3,39.6,97.2c2.2-0.4,4.3-1,6.3-1.7C35.4,87,27.7,74.2,27.6,60.6c-0.1-8,3.3-16.3,7.5-23

		c4.3-6.8,10.3-12.3,17.2-16.3c0.7-0.4,0.4-3.3,0.4-3.9C52.7,17.2,52.4,13.4,52.3,13.5"/>
            <path clip-path="url(#SVGID_2_)" fill="#004A80" d="M16.6,30.5C17,41.1,8.9,51.3,0.1,56.3c-1,0.5,0.4,4.8,0,5

		C20.5,49.8,22.6,19.8,6.3,4.6C5,5.2,3.9,6,2.7,6.7C10.5,12.1,16.2,20.8,16.6,30.5"/>
            <path clip-path="url(#SVGID_2_)" fill="#004A80" d="M20.7,30.7C20.8,44,11.2,56.6,0,62.8c-1.2,0.7,0.5,6,0,6.3

		c6.8-3.8,12.3-9.2,16.1-16c3.9-6.9,5.1-14.6,5.2-22.4C21.4,20,18.1,9.9,11.7,2.1c-1.4,0.6-2.8,1.2-4.2,1.9

		C15.1,10.8,20.6,20.4,20.7,30.7"/>
            <path clip-path="url(#SVGID_2_)" fill="#004A80" d="M25.9,30.7c0.1,8.2-3.4,16.7-7.8,23.4C13.7,61,7.4,66.6,0.2,70.5

		c-0.7,0.4-0.4,3.3-0.4,3.9c0,0.2,0.3,4,0.4,3.9C8.5,73.7,15.3,67,20,58.8c4.9-8.6,6.6-18.3,6.7-28.1C26.8,19.6,23.9,8.9,18.3,0

		c-1.6,0.4-3.2,0.9-4.8,1.4C20.8,9.5,25.8,19.8,25.9,30.7"/>
        </g>
        </svg>
        <article><span>Schedule your tour today<br/>
            <a href="tel:866-981-3507" id="header-ph" class="googlenumber" onClick="ga('send', 'event', 'Telephone Call', 'Telephone Link Thank You Page', 'Telephone Link');">866-981-3507</a></span></article>
    </div>
</header><!--header-->

<section id="feature-top">
	<div class="wrapper">
    	<div class="feature-image-container">
    		<img src="images/HH-building-shot.jpg" alt="Highland House" />
        </div>
        <article>
        	<h1>Thank you for your inquiry.<br/>
            One of our representatives will contact you shortly.</h1>
        </article>
    </div>
</section><!--feature-top-->
<footer>
    <div class="wrapper">
        <article id="address-wrapper"> <span id="street-address">5480 Wisconsin Avenue</span> <span id="city-zip">Chevy Chase, MD 20815</span> </article>
        <article id="number-wrapper"> <span id="phone"><a href="tel:866-981-3507" id="footer-ph" class="googlenumber" onClick="ga('send', 'event', 'Telephone Call', 'Telephone Link', 'Telephone Link');">866-981-3507</a></span></article>
        <article id="aux-content"> <!--<span><a href="https://www.pslapartments.com"><i class="fa fa-caret-right"></i> See More DC Metro Apartments</a></span> <span><a href="https://www.polingerco.com"><i class="fa fa-caret-right"></i> Managed by Polinger Shannon & Luch</a></span>--> <img src="images/logo-eho.svg" alt="Equal Housing Oppurtunity logo"/> <img src="images/logo-handicap.svg" alt="International Symbol of Access (ISA) logo"/> </article>
    </div>
</footer><!--pre-footer-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> 
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="scripts/map.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/jquery-imagefill.js"></script>
<script src="js/equal-heights.js"></script>
<script>
	var ww = document.body.clientWidth;
	console.log(ww);
		
	$('.feature-image-container').imagefill();

</script>

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: https://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 994852471;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/994852471/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

 <!--Google Call Tracking-->
 <script type="text/javascript">
     var callback = function(formatted_number, mobile_number) {
       var e = jQuery('.googlenumber');
for(var i=0; i<e.length;i++)
   { e[i].href = "tel:" + mobile_number; 
       e[i].innerHTML = ""
       e[i].appendChild(document.createTextNode(formatted_number));}
     };
     window.onload=function() {_googWcmGet(callback,'888-905-5459');};
</script> 

<!-- Google Code for HH Form Fill Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 994852471;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "WpnmCNH83AQQ9_yw2gM";
var google_conversion_value = 1.00;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/994852471/?value=1.00&amp;label=WpnmCNH83AQQ9_yw2gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>