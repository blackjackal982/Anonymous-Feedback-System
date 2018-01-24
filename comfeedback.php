<?php 
  session_start(); 
 if (!isset($_SESSION['username2'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username2']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>FACULTY HOME</title>
<link rel="stylesheet" type="text/css" href="style.css">

	
	 
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" style="color: white; background-color:transparent;">FEEDBACK PORTAL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="http://localhost/project/facultyhome.php">Home</a></li>
        <li class="active" ><a >View your Feedback</a></li>
       <li><a href="facultyhome.php?logout='1'">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
  <?php

    $fname=$_GET['fname'];
    $subid=$_GET['subid'];
    $year=$_GET['year'];
    $section=$_GET['section'];
	$db=mysqli_connect('localhost', 'root', '', 'feedback');
    $getinfo="SELECT extra FROM faculty WHERE  subjectid='$subid' AND year='$year' AND section='$section'";
	$res=mysqli_query($db,$getinfo);
	echo "Faculty Name : ".$fname.'</br>'.'</br>';
	
	while($row=mysqli_fetch_array($res))
	{ 
?>
	<a><?php	
	echo $row['extra'];
	if(!empty($row['extra']))
		echo '</br>';
	?> </a>
	<?php
	}
	?>
	
	</body>
	</html>
<style>
a{
	align:center;
	font-size:20px;
	background-color:  #1E1413 ;
	padding:4px;
	color: white;
	cursor:pointer;
	
}
table{
	
background-color: white;
color:black;
}

h2{ 
width:100%;
 padding: 20px;
   font-style:arial;
   font-size:33px;
    color: white;
	background-color: #1E1413 ;
}

h1{ 
  	font-family:arial;
background-color:  #1E1413;
   font-size:25px;
    color: white;
	
}



body,
html{
	min-height:100%;
}
body {
  font-size: 120%;
  background-image:url(http://localhost/project/pizap.jpg);
  background-repeat:no-repeat;
  background-size:cover;
  background-position: sticky;
}
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
}
</style>
<div class="footer">
 <p>Developed By Sai Sirisha & Paruchuri Madhurima</p>
</div>