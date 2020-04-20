<?php
// start the session
require("connection.php");


if (empty($_SESSION['user'])) { 
    // If they are not, we redirect them to the login page.
    header("Location: login.php");
	
    die("Redirecting to login.php");
}

?>
<?php include("menu_admin.php"); ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://html5-templates.com/" />
    <title>Kids Corner</title>
    <meta name="description" content="Simplified Bootstrap template with sticky menu">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sticky-menu.css" rel="stylesheet">

<?php include("menu_admin.php"); ?>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
                <a class="navbar-brand page-scroll" href="#page-top">Welcome</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Maths</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#whatwedo">English</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Science</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#extra1">Arts</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#extra2">Contact</a>
                    </li>
                </ul>
            </div>	<!-- .navbar-collapse -->
        </div>		<!-- .container -->
          
	</nav>
    <!-- Welcome   -->
    <section id="welcome" class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 st>Welcome to <u>Kid's corner</u></h1>
                    <br><br>
					<font size="5" face="arial" color="black" >
					<p>"Hello there Kids and parents!"
					 <br>
					 "Bored looking after your kids books and teaching the amm all day? Take a break and let the struggle of making education fun to us" 
					</p>
					<p>The Kid's corner is of much more fun for the kids in gaining knowledge.</p>
					<p>This is a wonderful platform for your kids to study. We have a collection of subject oriented videos taken from youtube especially meant for kids....You have all at one place ...Kid's Corner.    </p>
					</font>
					<p>&nbsp;</p>
                    <a class="btn btn-primary page-scroll" href="#about">Jump into the joy of learning!</a>
               
				</div>
				
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align:left;"><u>Section of Mathematics:</u></h1>
                </div>
            </div>
        </div>
		
	 <div class="container">
    
	  <iframe align="left"width="270" height="240" src="https://www.youtube.com/embed/N0_TWQTrJ-k" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  
	  <iframe  align="center" marginwidth="10pixels"  width="270" height="240" src="https://www.youtube.com/embed/lGfWirQASMA" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	
	  <iframe  align="right" marginwidth="10pixels"  width="270" height="240" src="https://www.youtube.com/embed/1ZB5g9FMMdk" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	 
	 <br>
	 <br>
	 <iframe  align="left" marginwidth="10pixels"  width="270" height="240" src="https://www.youtube.com/embed/HrxZWNu72WI" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	 
	 <iframe  align="center" marginwidth="10pixels"  width="270" height="240" src="https://www.youtube.com/embed/kHUw3JtqeJw" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	 
	 <iframe  align="right" marginwidth="10pixels"  width="270" height="240" src="https://www.youtube.com/embed/CgkbDcSaHl0" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	 </div>
	 
	
	</section>

    <!-- What we do Section -->
    <section id="whatwedo" class="whatwedo-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align:left;"><u>Section of English:</u></h1>
                </div>
            </div>
        </div>
		<div class="container">
    	 
	 <iframe align="left"width="270" height="240" src="https://www.youtube.com/embed/hq3yfQnllfQ" frameborder="10" allow="accelerometer; autoplay; 
	 encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
     
	 
	 <iframe align="center"width="270" height="240" src="https://www.youtube.com/embed/DSQz65CzH_g" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	 
	  <iframe align="right"width="270" height="240" src="https://www.youtube.com/embed/X-BxJWWyO0E" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  <br><br>
	  
	   <iframe align="left"width="270" height="240" src="https://www.youtube.com/embed/wj0BH91FnBQ" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	   
	    <iframe align="center"width="270" height="240" src="https://www.youtube.com/embed/SUt8q0EKbms" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		
		 <iframe align="right"width="270" height="240" src="https://www.youtube.com/embed/McVQ-ssbib8" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  
    </section>
	<!-- Science Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align:left"><u>Section of Science:</u></h1>
                </div>
            </div>
        </div>
		 <iframe align="left" width="270" height="240" marginwidth="10pixels" src="https://www.youtube.com/embed/Qd6nLM2QlWw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		 
		  <iframe align="center"width="270" height="240" src="https://www.youtube.com/embed/s0bS-SBAgJI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		  
		   <iframe align="right"width="270" height="240" src="https://www.youtube.com/embed/TE6xptjgNR0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		   
		  <br><br>
		   <iframe align="left"width="270" height="240" src="https://www.youtube.com/embed/68QDZAl29oE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		   
		    <iframe align="center"width="270" height="240" src="https://www.youtube.com/embed/p51FiPO2_kQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			
			<iframe  align="right" width="270" height="240" src="https://www.youtube.com/embed/-2caC-uI7l4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	
	</section>
	
	<!-- What we do Section -->
    <section id="extra1" class="whatwedo-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align:left;"><u>Section of Art:</u></h1>
                </div>
            </div>
        </div>
		
	  <iframe align="left"width="270" height="240" src="https://www.youtube.com/embed/MIAiglTFgLk" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  
	  <iframe align="center"width="270" height="240" src="https://www.youtube.com/embed/EZ2h6W4YVz0" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  
	  <iframe align="right"width="270" height="240" src="https://www.youtube.com/embed/Xa6VsftUPZ0" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  
	 <br>
	 <br>
	 
	  <iframe align="left"width="270" height="240" src="https://www.youtube.com/embed/vY49eNceLBo" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  
	  <iframe align="center"width="270" height="240" src="https://www.youtube.com/embed/ZQUUUYifUDI" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  
	  <iframe align="right"width="270" height="240" src="https://www.youtube.com/embed/Wh-zFiYhW0M" frameborder="10" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </section>
	
	<!--Extra Section -->
	<section id="extra2" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <font size="2" face="arial" color="black" >
					<h1 ><u>Designed By:</u> SIBI ASHWAD</h1>
					<h2> <u>For any suggestions please mail <br>me at:</u> sibiashwad@gmail.com </h2>
					<br><br><br>
					<h3> Thus Kids Corner is made especially for your children to learn and develop knowledge with whole lot of fun! <br>
					I will be adding more videos for your children in the upcoming days ........   </h3>
                    </font>
				</div>
				<img align="right" width="450" height="350" src="https://s3.amazonaws.com/kids-corner/assets/images/hero/KidsCorner-cover-art.jpg"  >
            </div>
        </div>
		</section>
	
	<a id="back2Top" title="Back to top" href="#">&#10148;</a>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/sticky-menu.js"></script>

</body>

</html>
