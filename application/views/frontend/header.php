<!DOCTYPE html>
<html lang="en">
<head>
<title>Roktodan - A Online Blood Management Site</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Blood Management Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<meta name="author" content="Sabbir Shawon" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>assets/frontend/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>assets/frontend/css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>assets/frontend/css/font-awesome.css" rel="stylesheet">   <!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/flexslider.css" type="text/css" media="all" property="" />
<!-- //Custom Theme files -->  
<!-- web-fonts -->   
<link href="//fonts.googleapis.com/css?family=Bigshot+One" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- //web-fonts -->
</head>
<body> 
	<!-- banner -->
	<div class="w3ls-banner aboutw3ls-banner">
		<!-- header -->
		<div class="header">
			<div class="container"> 
				<div class="header-top"><!-- header-top -->
					<div class="agile-hdleft nav navbar-nav navbar-left">
						<ul>  
							<li><a href="mailto:example@mail.com"><i class="fa fa-envelope-o"></i>sabbir2cse@gmail.com</a></li>
							<li><i class="fa fa-phone"></i><a href="tel:+8801750118746">+8801750118746 </a></li> 
						</ul> 
					</div>
					<div class="agile-hdmdl nav navbar-nav">
						<form action="<?php echo base_url();?>Blood_request/search" method="post">
							<select name="donor_group" class="form-control">
								<option value="">Select your Blood Group</option>
								<option value="A(+ve)">A(+ve)</option>
								<option value="A(-ve)">A(-ve)</option>
								<option value="B(+ve)">B(+ve)</option>
								<option value="B(-ve)">B(-ve)</option>
								<option value="O(+ve)">O(+ve)</option>
								<option value="O(-ve)">O(-ve)</option>
								<option value="AB(+ve)">AB(+ve)</option>
								<option value="AB(-ve)">AB(-ve)</option>
							</select>
							
							<button type="submit" name="search" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</form>
					</div>
					<div class="agileits-hdright nav navbar-nav navbar-right">
						<div class="social-icon">
							<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
							<a href="https://www.facebook.com/roktodan2017/" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
							<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
						</div> 
					</div>
					<div class="clearfix"> </div> 
				</div>	
				<div class="header-mdl agileits-logo"><!-- header-two --> 
					<h1><a href="<?php echo base_url();?>Home">RoktoDan</a></h1> 
				</div>
				<div class="header-nav"><!-- header-three --> 	
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button> 
						</div>
						<!-- top-nav -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo base_url();?>Home">Home</a></li> 
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blood Group<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url();?>All_blood/a_positive">A(+ve)</a></li>
										<li><a href="<?php echo base_url();?>All_blood/a_negative">A(-ve)</a></li>
										<li><a href="<?php echo base_url();?>All_blood/b_positive">B(+ve)</a></li>
										<li><a href="<?php echo base_url();?>All_blood/b_negative">B(-ve)</a></li>
										<li><a href="<?php echo base_url();?>All_blood/o_positive">O(+ve)</a></li>
										<li><a href="<?php echo base_url();?>All_blood/o_negative">O(-ve)</a></li>
										<li><a href="<?php echo base_url();?>All_blood/ab_positive">AB(+ve)</a></li>
										<li><a href="<?php echo base_url();?>All_blood/ab_negative">AB(-ve)</a></li>
									</ul>
								</li>
								<li><a href="<?php echo base_url();?>All_blood">All Blood Donor</a></li>
								<li><a href="<?php echo base_url();?>Blood_request">Blood Request</a></li>
								<?php 
									if($this->session->userdata('user_status')==1){
								?>
								<li><a href="<?php echo base_url();?>Users/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>Users/logout">Log Out</a></li>
								<?php 
									}else{
								?>
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login/Registration<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url();?>Users/login">Login</a></li>
										<li><a href="<?php echo base_url();?>Users/registration">Registration</a></li>
									</ul>
								</li>
								<?php 
									}
								?>
							</ul>  
							<div class="clearfix"> </div>	
						</div>
					</nav>     
				</div>	
			</div>	
		</div>	
		<!-- //header --> 
		<!-- banner-text -->
		<div class="banner-text agileinfo"> 
			<div class="container">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner-w3lstext">
								<h2>Welcome</h2>
								<p>The donor acquisition process doesn’t end when the prospect makes their first gift.The best way to keep them involved and engaged is by continuing the introductory process after their first donation.</p>
							</div>
						</li>
						<li>
							<div class="banner-w3lstext">
								<h3>Blood transfusion</h3>
								<p>A blood transfusion is a safe, common procedure in which blood is given to you through an intravenous (IV) line in one of your blood vessels.During a blood transfusion, a small needle is used to insert an IV line into one of your blood vessels.</p>
							</div>
						</li>
						<li>
							<div class="banner-w3lstext">
								<h3>Eligibility requirment</h3>
								<p>To ensure the safety of blood donation for both donors and recipients, all volunteer blood donors must be evaluated to determine their eligibility to give blood. The final determination will be made. </p>
							</div>
						</li>
					</ul> 
				</div> 	 
			</div>
		</div>
		<!-- //banner-text --> 
	</div>	
	<!-- //banner -->