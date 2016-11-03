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
	$to="shane@mm4solutions.com";

	$firstName=$_POST["first-name"];
	$lastName=$_POST["last-name"];
	$email=$_POST["email"];
	$comments=$_POST["comments"];

	$from="managementoffice@swiftpetworth.com";
	$subject="I would like information about The Swift Petworth";
	$message="First Name: ".$firstName."<br>"."Last Name: ".$lastName."<br>"."Email: ".$email."<br>"."Comments: ".$comments;
	$header='From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charser=iso-8859-1'."\r\n".'X-Mailer: PHP/'.phpversion();
	@mail($to,$subject,$message,$header);
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Thank You | The Swift Petworth</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0">
<link href="swift-landing-page/css/styles.css" type="text/css" rel="stylesheet">
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-84651071-1', 'auto');
ga('send', 'pageview');

</script>
</head>

<body>

<header>
    <div class="flex-header">
        <div id="logo-header">
            <img src="swift-landing-page/images/swift-logo.png" alt="The Swift Petworth logo">
        </div>
        <div id="callout">Schedule your tour today<br/>
            <a href="tel:2028035047">202.803.5047</a>
        </div>
        <div id="social">
            <a href="https://www.facebook.com/TheSwiftApts/"><img src="swift-landing-page/images/swift-facebook-80.png" alt="link to Swift Petworth Facebook page"></a><a href="https://www.instagram.com/theswiftpetworthapts/"><img src="swift-landing-page/images/swift-instagram-80.png" alt="link to Swift Petworth instagram page"></a>
        </div>
    </div>
</header>
<section id="thank-you">
    <div class="wrapper">
        <article>
            <h1>Thank you for your inquiry.</h1>
            <h2>One of our representatives will contact you shortly.</h2>
        </article>
    </div>
</section>
<section id="pre-footer">
    <div class="wrapper">
        <div id="map-canvas"></div>
    </div>
</section>
<footer>
    <div class="wrapper">
        <article id="address-wrapper"> <span id="street-address">3828 Georgia Avenue, NW</span> <span id="city-zip">Washington, DC 20011</span></article><br>
        <article id="number-wrapper"> <span id="phone"><a href="tel:2028035047">202.803.5047</a></span></article>
        <article id="aux-content"><img src="swift-landing-page/images/logo-eho.svg" alt="Equal Housing Oppurtunity logo"/> <img src="swift-landing-page/images/logo-handicap.svg" alt="International Symbol of Access (ISA) logo"/></article>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/min/map-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbj6Rg5tTpunhvIqd4R47gEExvHNiwhAM&callback=initMap"></script>

</body>
</html>