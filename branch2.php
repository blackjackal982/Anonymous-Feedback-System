<?php 
  include('server.php') ;
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
<!DOCTYPE html>
<html>
<head>
<style>
table {
	background-color:white;
    width: 100%;
    border-collapse: collapse;
}


th {text-align: left;}
</style>
</head>
<body>

<?php
if( intval($_GET['q'])==1){
$q ='s&h';
}
else if(intval($_GET['q'])==2){
$q ='cse';
}
else if(intval($_GET['q'])==3){
$q ='it';
}
else if(intval($_GET['q'])==4){
$q ='ece';
}
else if(intval($_GET['q'])==5){
$q ='eee';
}
else if(intval($_GET['q'])==6){
$q ='mech';
}
else if(intval($_GET['q'])==7){
$q ='civil';
}

	


$db = mysqli_connect('localhost','root','','logindatabase');
if (!$db) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($db,"ajax_demo");
?>

<h1 align="center">Sub-Fac Records</h1>
</br>
<table class="table table-condensed">
<thead>
<tr>
<th><strong>ID</strong></th>
<th><strong>Subject ID</strong></th>
<th><strong>Faculty ID</strong></th>
<th><strong>Subject Name</strong></th>
<th><strong>Faculty Name</strong></th>
<th><strong>Branch</strong></th>
<th><strong>Year</strong></th>
<th><strong>Section</strong></th>
</tr></thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM `lecturers` WHERE branch='$q'";
$result=mysqli_query($db,$sel_query);
while($row=mysqli_fetch_assoc($result)){
?><tr><td ><?php echo $id=$row["id"];?></td>

<td ><?php echo $subjectid=$row["subjectid"];?></td>
<td ><?php echo $facultyid=$row["facultyid"];?></td>
<?php 
$branch=$row["branch"];
$year=$row["year"];
$section=$row["section"];
$query="SELECT subjects.subjectname,facultydetails.fullname FROM subjects,facultydetails WHERE facultydetails.facultyid='$facultyid' AND subjects.subjectid='$subjectid'  ";
$res=mysqli_query($db,$query);
while($row=mysqli_fetch_assoc($res)){
	?>
	<td><?php echo $row['subjectname'];?></td>
	<td><?php echo $row['fullname'];?></td>
	<?php
}?>
<td ><?php echo $branch?></td>
<td ><?php echo $year?></td>
<td ><?php echo $section?></td>

<td>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Add More Subjects</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header" id="bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Sign Up</h4>
      </div>
      <div class="modal-body" id="bg">


<form method="post" action="insert.php"> // change to yours
            <div class="form-group">
                <label for="facultyid">Faculty ID</label>
                <input type="text" class="form-control" id="facultyid" placeholder="facultyid" name="facultyid">
            </div>
            <div class="form-group">
                <label for="subjectid">Subject ID</label>
                <input type="text" class="form-control" id="subjectid" placeholder="subjectid" name="subjectid">
            </div>
            <div class="form-group">
                <label for="branch">Branch</label>
                    <select id="branch" class="size form-control" name="selectType">
                       <option value="cse">CSE</option>
                          <option value="it">IT</option>
                         <option value="ece">ECE</option>
						<option value="eee">EEE</option>
						<option value="mech">MECH</option>
						<option value="civil">CIVIL</option>
                    </select>
            </div>
			<div class="form-group">
                <label for="year">Year</label>
                    <select id="year" class="size form-control" name="selectType">
                        <option value="1">I</option>
						<option value="2">II</option>
						<option value="3">III</option>
						<option value="4">IV</option>
                    </select>
            </div>
			<div class="form-group">
                <label for="section">Section</label>
                    <select id="section" class="size form-control" name="selectType">
                       <option value="a">A</option>
                       <option value="b">B</option>
                       <option value="c">C</option>
                       <option value="d">D</option>
                    </select>
            </div>

            <div class="well modal-footer" id="bg">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" name="save" value="Save changes" />
        </div>
        </form>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</td>
<td align="center">

<a href="lecturerdelete.php?id=<?php echo $id ?>">Delete</a>

</td>
</tr>
<?php $count++;
 }	  
mysqli_close($db);
?>
</tbody>
</table>
</body>
</html>
<style>
a{
	padding: 10px;
  font-size: 15px;
  color: white;
  background: #1E1413;
  border: none;
  border-radius: 5px;
}
.button:hover {background-color:none}

.button:active {
  background-color: black;
 
 
}

form, .content {
	
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #1E1413;
  background: 1px solid gray;
  border-radius: 10px 10px 10px 10px;
}
</style>