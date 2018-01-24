<?php include('server.php') ?>
<?php 
 if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<html>
<title>FacultyDB</title>
<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <a class="navbar-brand" href='http://localhost/project/adminhome.php' style="color: white; background-color:transparent;">FEEDBACK PORTAL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">User DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href='http://localhost/project/register.php'  style="color: black; background-color: white; ">Add new user</a>
            <li><a href='http://localhost/project/userlist.php' style="color: black; background-color: white; ">User List</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admins DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href='http://localhost/project/adminregister.php' style="color: black; background-color: white; ">Add new Admin</a></li>
            <li><a  href='http://localhost/project/adminlist.php' style="color: black; background-color: white; ">Admin List</a>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Faculty DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href='http://localhost/project/facultyregister.php' style="color: black; background-color: white; ">Add Faculty</a></li>
            <li><a href='http://localhost/project/facultylist.php' style="color: black; background-color: white; ">Faculty List</a></li>
 
  
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lecturers DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href='http://localhost/project/lecturerregister.php' style="color: black; background-color: white; ">Add Lecturers</a></li>
            <li><a href='http://localhost/project/lecturerlist.php' style="color: black; background-color: white; ">Lecturers List</a></li>

          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Subjects DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href='http://localhost/project/subjectregister.php' style="color: black; background-color: white; ">Add Subjects</a></li>
           <li><a href='http://localhost/project/subjectlist.php' style="color: black; background-color: white; ">Subjects List</a></li>
  
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Feedback<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <?php
$cse='cse';
$it='it';
$ece='ece';
$eee='eee';
$mech='mech';
$civil='civil';
$sh='s&h';
?>
    <li><a href='http://localhost/project/feedbackview.php?branch=<?php echo $sh;?>' style="color: black; background-color: white; ">S & H</a></li>
	<li><a href='http://localhost/project/feedbackview.php?branch=<?php echo $cse;?>' style="color: black; background-color: white; ">CSE</a></li>
	<li><a href='http://localhost/project/feedbackview.php?branch=<?php echo $it;?>' style="color: black; background-color: white; ">IT</a></li>
	<li><a href='http://localhost/project/feedbackview.php?branch=<?php echo $ece;?>' style="color: black; background-color: white; ">ECE</a></li>
	<li><a href='http://localhost/project/feedbackview.php?branch=<?php echo $eee;?>' style="color: black; background-color: white; ">EEE</a></li>
	<li><a href='http://localhost/project/feedbackview.php?branch=<?php echo $mech;?>' style="color: black; background-color: white; ">MECH</a></li>
	<li><a href='http://localhost/project/feedbackview.php?branch=<?php echo $civil;?>' style="color: black; background-color: white; ">CIVIL</a></li>
	<li><a href='http://localhost/project/facfeedbacklist.php' style="color: black; background-color: white; ">ALL</a></li>
  
  
          </ul>
        </li>
        
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Complaints<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <?php
$class='Classrooms';
$lab='Laboratories';
$transport='College Transport';
$lib='Library';
$canteen='Canteen';
$other='Others';
?>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $class;?>' style="color: black; background-color: white; ">Classrooms</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $lab;?>' style="color: black; background-color: white; ">Laboratories</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $transport;?>' style="color: black; background-color: white; ">College Transport</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $lib;?>' style="color: black; background-color: white; ">Library</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $canteen;?>' style="color: black; background-color: white; ">Canteen</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $other;?>' style="color: black; background-color: white; ">Others</a></li>

          </ul>
        </li>
		
		
		
		<li> <a href="adminhome.php?logout='1'">Logout</a> </li>
     
      
        
      </ul>
    </div>
  </div>
</nav>
   
<body>
<?php

    $fname=$_GET['name'];
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
		echo '</br>'.'</br>';
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