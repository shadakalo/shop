<?php  include '../classes/Adminlogin.php'; ?>
<?php
    if ($_SESSION['adminlogin'] ==  true) {
        echo "<script>window.location = 'index.php';</script>";
    }
?>
<?php
    $al = new Adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $adminUser = $_POST['adminUser'];
       $adminPass = $_POST['adminPass'];
       $loginchk = $al->adminLogin($adminUser,$adminPass);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin LogIn</title>
	  <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
     <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <style type="text/css">
    	 /*bootstrap class override for login page only*/
            .form-control{
                border-radius: 0px;
                margin: 12px 3px;
                height: 40px;
            }
                       .logo{
                margin: auto;
                text-align: center;
                padding-top: 20%;
            }
            .logo img{
                height: 70px;
            }
            /*footer*/ 
            .footer a{
                color: #000;
                text-decoration: none;
            }
            .footer{
                color: #6A6A6A;
                text-align: center;
            }
            /*footer end*/ 


            /*for logintemplate blue*/
            .grayBody{
                background-color: #E9E9E9;
            }
            .loginbox{
                margin-top: 5%;
                border-top: 6px solid #7857C0;
                background-color:#fff;
                padding: 20px;
                box-shadow: 0 10px 10px -2px rgba(0,0,0,0.12),0 -2px 10px -2px rgba(0,0,0,0.12);    
            }
            .singtext{    
                font-size: 28px;  
                color: #7857C0;
                font-weight: 500;
                letter-spacing: 1px;
            }
            .submitButton{
                background-color: #7857C0;
                color: #fff;
                margin-top: 12px;
                margin-bottom: 10px;
                padding: 10px 0px;
                width: 100%;
                margin-left: 2px;
                font-size: 16px;
                border:0px solid;
                border-radius: 0px;
                outline: none;
            }
            .submitButton:hover,.submitButton:focus{
                color: #fff;  
                outline: none;
                background-color: #7857C0;
            }
            .forGotPassword{
                background-color: #F2F2F2; 

                padding: 15px 0px;
                text-align: center;

            }
            .forGotPassword:hover{
                 box-shadow: 0 10px 10px -2px rgba(0,0,0,0.12);    
            }
            .forGotPassword a{
                color: #7857C0;
                outline: none;
            }
            .forGotPassword a:hover, .forGotPassword a:active,.forGotPassword a:focus{  
                text-decoration: none; 
                outline: none;
            }
            .copyr8{
                color: #7857C0;
            }
    </style>
</head>
<body>

	   <div class="container" >  
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="logo">
                    <img src="img/admin.png"  alt="Logo"  > 
                </div>
                <div class="row loginbox">                    
                    <div class="col-lg-12">
                        <span class="singtext" >Sign in </span><br><br>
                        <span style="color: red" >
                            <?php
                                if (isset($loginchk)) {
                                    echo "$loginchk";
                                }
                            ?>
                        </span>   
                    </div>
                <form action="login.php" method="post">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" type="text" placeholder="Please enter your user name" name="adminUser" > 
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12">
                            <input class="form-control" type="password" placeholder="Please enter password" name="adminPass" >
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12">
                            <input type="submit" name="submit" value="Login" class="btn  submitButton">
                        </div>                     

                        </div>
                 </form>
                        <div class="row forGotPassword">
                            <a href="#" >Forgot Username / Password? </a> 
                        </div>
              
                <br>                
                <br>
                <footer  class="footer">                
                    <p >© <span class="copyr8">Dvelopers Hut </span>2016  All rights reserved </p>                 
                </footer> <!--footer Section ends-->

            </div>
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
        </div>



</body>
</html>