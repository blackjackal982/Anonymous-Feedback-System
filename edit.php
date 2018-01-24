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
  $id="";
$name = "";
$username = "";
$rollno = "";
$branch = "";
$year = "";
$section = "";
$profession="";
$semester="";
$email    = "";
$photo = "";
$error=array();

function valid($id, $photo, $name, $username, $rollno, $branch, $year, $section, $semester, $profession, $email, $password)
{
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Records</title>
</head>
<body>
<?php


?>

<form method="post" action="edit.php">
  	<?php include('errors.php'); ?>
	<form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
		 <input type="file" name="photo" value="<?php echo $photo; ?>">
		 <div class="input-group">
    
  	    <label>ID</label>
  	  <input type="text" name="id" value="<?php echo $id; ?>">
  	</div>
  	<div class="input-group">
    
  	    <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
		<div class="input-group">
	<label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
		<div class="input-group">
	<label>Roll No</label>
  	  <input type="text" name="rollno" value="<?php echo $rollno; ?>">
  	</div>
	<div class="input-group">
	<label>Branch</label>
  	  <input type="text" name="branch" value="<?php echo $branch ; ?>">
  	</div>
	<div class="input-group">
	<label>Year</label>
  	  <input type="text" name="year" value="<?php echo $year ; ?>">
  	</div>
	<div class="input-group">
	<label>Section</label>
  	  <input type="text" name="section" value="<?php echo $section ; ?>">
  	</div>
	<div class="input-group">
	<label>Semester</label>
  	  <input type="text" name="semester" value="<?php echo $semester ; ?>">
  	</div>
	<div class="input-group">
	<label>Profession</label>
  	  <input type="text" name="profession" value="<?php echo $profession; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password" value="<?php echo $password; ?>">
  	</div>

	<div class="input-group">
  	  <button type="submit" class="btn" name="update" value="Edit Records">UPDATE</button>
	  
  	</div>
	

</form>
</form>
</body>
</html>
<?php
}


if (isset($_POST['update']))
{

if (is_numeric($_POST['id']))
{
$id = mysqli_real_escape_string($db, $_POST['id']);
$photo = mysqli_real_escape_string($db, $_POST['photo']);
 $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $rollno = mysqli_real_escape_string($db, $_POST['rollno']);
$branch = mysqli_real_escape_string($db, $_POST['branch']);
$year = mysqli_real_escape_string($db, $_POST['year']);
$section = mysqli_real_escape_string($db, $_POST['section']);
$semester = mysqli_real_escape_string($db, $_POST['semester']);
 $profession = mysqli_real_escape_string($db, $_POST['profession']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
if ( $id=='' || $name == '' || $photo  == '' || $username == '' || $rollno == '' || $branch == '' || $year == '' || $section == '' || $semester == '' || $profession == '' || $email=='' ||$password=='')
{

$error = 'ERROR: Please fill in all required fields!';


valid($id, $photo, $name, $username, $rollno, $branch, $year, $section, $semester, $profession, $email, $password);
}
else
{

$password = md5($password);//encrypt the password before saving in the database
  	$query = "INSERT INTO adminusers ( photo, name, username, rollno, branch, year, section, semester, profession, email, password) 
  			  VALUES( '$photo', '$name', '$username', '$rollno', '$branch', '$year', '$section', '$semester', '$profession', '$email', '$password')"
or die(mysql_error());

header("Location: userlist.php");
}
}
else
{

echo 'Error!';
}
}
else

{

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM adminusers WHERE id=$id")
or die(mysql_error());
$row = mysqli_fetch_array($result);

if($row)
{

$name = $row['name'];
$username = $row['username'];
$rollno = $row['rollno'];
$branch = $row['branch'];
$year = $row['year'];
$section = $row['section'];
$semester = $row['semester'];
$profession = $row['profession'];
$password = $row['password'];
$email = $row['email'];
$photo = $row['photo'];

valid($id, $photo, $name, $username, $rollno, $branch, $year, $section, $semester, $profession, $email, $password,'');
}
else
{
echo "No results!";
}
}
else

{
echo 'Error!';
}
}
?>