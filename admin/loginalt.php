<!DOCTYPE html>
<html>
<head>	
	<title>Login</title>
	<!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	 <style type="text/css">
	 		body{
			background-color: #DCDDDF;
		}

		#box{
			height: 2px;
			width: 1px;
			
			background-color: #7857C0;
			border-radius: 10px;
			line-height:90px;
			box-shadow: 0 0 15px #7857C0;
		}
	
		#in{
			width: 90%;
			height: 50px;
			border-radius: 10px;
			padding: 8px;
			border : 4px solid #A689DA;
			background-color: #333333;
			color: white;
		}
		#in:focus{
			border:6px solid #A689DA;
		}
		#inBtn{
			width: 90%;
			height: 50px;
			border-radius: 10px;
			line-height:10px;
			border : 4px solid #A689DA;
			background-color: #333333;
			color:white;
			cursor: pointer;
		}
		#copy{
			color: #00cccc;
			text-align: center;
			font-style: italic;
		}
		footer{
			position:fixed;		    
		    bottom:0px;
		    left:0px;
		    right:0px;
		    margin-bottom:0px;
		}
		hr{
			color: #00cccc;
		}
		.main-div{
			background-color: #333333;
			padding-bottom: 30px;
			border-radius: 10px;
			margin-top: 50px;
		}
	 </style>

	<script type="text/javascript">
			$(document).ready(function(){
			$("#circle").hide();
			$("#box").animate({height:"300px"},"slow");
			$("#box").animate({width:"400px"},"slow");
			$("#circle").fadeIn(1000);

		});
		function blinker(){
			$('#blinking').fadeOut("slow");
			$('#blinking').fadeIn("slow");
		}
		setInterval(blinker, 2500);

	</script> 

</head>
<body>
	<div  class="col-md-offset-4 col-md-4 main-div" >
		<form>
			<center>
			
					<h3 id="blinking" style="color: #A689DA;">Please Login Here</h3>
					<div id="box">
						<form>
							<input type="text" name="uname" id="in" placeholder="Username"><br>
							<input type="password" name="pwrd" placeholder="Password" id="in">
							<input type="submit" name="login" value="Login" id="inBtn" style="color:white;">
					    </form>
					</div>
				
			</center>
			
		</form>
	</div>
	<br><br><br><br>

</body>
</html>
