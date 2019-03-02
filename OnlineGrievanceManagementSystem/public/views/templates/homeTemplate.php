<head>
	<title>login page</title> 
	<link rel="stylesheet" type="text/css" href="css/homeTemplate.css">
	<style type="text/css">
		a{
		
			color: #fff;
			text-decoration: none !important;
		}
		a:hover{
			color: #fff;
		}
		#video{
			min-height: 100vh;
			width: 100vw;
			position: absolute;
			top: 0;
			left: 0;
			z-index: -50;
		}
		.bg-overlay{
			position: absolute;
			width: 100%;
			height: 100%;
			background: rgb(0,0,0,0.8);
			z-index: -1;
		}
		#box{
			z-index: 100000;
			color: #fff;
		}
		.landing{
			width: 100vw;
			height: 100vh;
			position: relative;
			overflow: hidden;
		}
		#box h1{
			font-weight: 700;
			font-size: 2.5em;
			color: #ddd;

		}
	</style>
</head>
<div class="landing">
<div class="bg-overlay"></div>
	<div id="box">
		<div class="container responsive-cont" style="margin-top: 9vw">
			<div class="row" id="row2">
			<img src="assets/logos/aicte.png" height="100"><h1><b>AICTE Grievance Management System</b></h1>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-around" id="row1">
				<div class="col-lg-2" id="student" ><a href="#!/login"><img src="assets/images/students.jpg" height="100" class="stakeholder-template-image" width="188" style="border-top-left-radius: 1vw;border-top-right-radius: 1vw;"><img src="assets/icons/studenticon.png" height="30" style="float: left;" class="vertical-icon"> Student<img src="assets/icons/n.png" height="30" style="float: right" class="go-template-icon"></a> </div>

				<div class="col-lg-2" id="committee" ><a href="#!/login"><img src="assets/images/committee.jpg" class="stakeholder-template-image" height="100" width="188" style="border-top-left-radius: 1vw;border-top-right-radius: 1vw;"><img src="assets/icons/commicon.png" height="30" style="float: left;" class="vertical-icon"> Committee<img src="assets/icons/n.png" height="30" style="float: right" class="go-template-icon"></a></div>

				<div class="col-lg-2" id="principal" ><a href="#!/login"><img src="assets/images/principal.png" height="100" class="stakeholder-template-image" width="187" style="border-top-left-radius: 1vw;border-top-right-radius: 1vw;"><img src="assets/icons/principalicon.png" height="30" style="float: left;" class="vertical-icon"> Principal<img src="assets/icons/n.png" height="30" style="float: right" class="go-template-icon"></a></div>

				<div class="col-lg-2" id="ombudsman" ><a href="#!/login"><img src="assets/images/ombudsman.jpg" height="100" class="stakeholder-template-image" width="188" style="border-top-left-radius: 1vw;border-top-right-radius: 1vw;"><img src="assets/icons/information.png" height="30" style="float: left;" class="vertical-icon"> Ombudsman<img src="assets/icons/n.png" height="30" style="float: right" class="go-template-icon"></a></div>

				<div class="col-lg-2" id="aicte" ><a href="#!/login"><img src="assets/images/aicte.jpg" height="100" width="188" style="border-top-left-radius: 1vw;border-top-right-radius: 1vw;" class="stakeholder-template-image"><img src="assets/icons/aicteicon.png" height="30" style="float: left;" class="vertical-icon"> AICTE<img src="assets/icons/n.png" height="30" style="float: right" class="go-template-icon"></a></div>
			</div>
		</div>
	</div>
<video autoplay muted loop id="video">
<source src="./assets/video/homebg.mov" type="video/mp4">
</video>
</div>