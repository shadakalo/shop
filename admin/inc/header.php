<?php
    session_start();
    if ($_SESSION['adminlogin'] == false) {
        echo "<script>window.location = 'login.php';</script>";
    }
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>



    <!--     Fonts and icons     -->
    <link href="assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" />
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dtable').dataTable();
        });
    </script>

    <script type="text/javascript">
      tinymce.init({
        selector:"textarea.tinymce"
      });

    </script>
   
  <style type="text/css">
      
      .sidebar-menu{
               width: 90%;
               margin: 10px 12px;
               border: 1px solid #A689DA;
      }

      .sidebar-menu .panel-heading{
          background-color: #A689DA;
          color: white;
          margin: auto;

      }
      .sidebar-menu .panel-heading :hover{

          color: white;
          font-size: 20px;
          transition: .2s;
      }
      .sidebar-menu .panel-body a{
          color: #7F5DC5;
          font-weight: bolder;
          font-family: times;
      }

      a:hover, a:focus {
          color: white;
          text-decoration: none;
      }
      .mybutton{
        width: auto;
        height: 100%;
        
      }
     .error{
          color: red;
      }
      .success{
          color: green;
      }
     
      table.dataTable thead th{
        border-bottom: 2px solid #7858C0;
      }
       table.dataTable tfoot th {
        border-top: 2px solid #7858C0;
      }
      .linkedit{
        color: #7858C0;
        font-weight: bold;
        font-family: times;
      }
      .linkedit:hover{
        color: #7858C0;
      }
      .linkdelete{
        color: red;
        font-weight: bold;
        font-family: times;
      }
      .linkdelete:hover, .linkdelete:focus{
        color: red;
      }
    
      #dtable td, th{
        text-align: center;
      }
      .mytable td{
        text-align: center;
      }
      .mytable th {
        padding: 10px;
      }
      
      .mytable2 td{
        text-align: center;
      }
  </style>
</head>