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
$con = mysqli_connect('localhost','root','','logindatabase');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT facultyid,fullname FROM facultydetails WHERE branch='".$q."'";
$result = mysqli_query($con,$sql);
?>
<table class="table table-condensed">
<thead>
<tr>
<th><strong>Faculty ID</strong></th>
<th><strong>Faculty Name</strong></th>
<th><strong>Subject ID</strong></th>
<th><strong>Subject Name</strong></th>
<th><strong>Classes Taken</strong></th>
<th><strong>Add Subjects<strong></th>
</tr>
</thead>
<tbody>
<?php
$fid=array();
$count=1;
while($row = mysqli_fetch_assoc($result)) {
  $fid=$row['facultyid'];
     $name=$row['fullname'];?>
	  <tr><td>
	   <?php echo $row['facultyid']."  ";?></td><td><?php echo $row['fullname'];?></td>
	   <?php 
	   $sq="SELECT subjects.subjectname, subjects.subjectid FROM lecturers INNER JOIN subjects ON subjects.subjectid=lecturers.subjectid WHERE facultyid='$fid' ";
	   $res = mysqli_query($con,$sq);
	   ?>
	   <td>
	   <?php
	   
	   while($data=mysqli_fetch_assoc($res))
	   {
		   $subjectid=$data['subjectid'];
		   echo $subjectid;
	  ?></br></br> <?php }?>
	   </td>
	   <td>
	   <?php
	   $sq="SELECT subjects.subjectname, subjects.subjectid FROM lecturers INNER JOIN subjects ON subjects.subjectid=lecturers.subjectid WHERE facultyid='$fid' ";
	   $res = mysqli_query($con,$sq);
	   while($data=mysqli_fetch_assoc($res))
	   {
	   $subjectname=$data['subjectname'];
	   echo $subjectname;
	    ?> </br></br><?php }
	    $sq="SELECT lecturers.id,lecturers.branch,lecturers.year,lecturers.section FROM lecturers INNER JOIN subjects ON subjects.subjectid=lecturers.subjectid WHERE facultyid='$fid' ";
	   $res = mysqli_query($con,$sq);
	   $id=array();
	   $br=array();
	   $year=array();
	   $section=array();
	    ?>
		<td>
	  <?php
       while($row = mysqli_fetch_assoc($res)) {
		   $id=$row['id'];
      $br=$row['branch'];
	  $year=$row['year'];
	  $section=$row['section'];
	   echo $br.$year.$section;?>
	    <a style="  color: black; background: white;" align="center" href="lecturerdelete.php?id=<?php echo $id ?>">x</a>
    

  
</br>
</br>
<?php } ?>
</td>
<td>
<button type="button" name="insert" id="insert" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Insert</button>
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add More Subjects</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Subject ID:</label>
     <input type="text" name="subjectid" id="subjectid" class="form-control" />
     <br />
               <div  class="form-group">
 <label for="sel1">Branch</label>
 <select class="form-control" id="name" name="branch" value="<?php echo $branch ; ?>">


<option value="cse">CSE</option>
<option value="it">IT</option>
<option value="ece">ECE</option>
<option value="eee">EEE</option>
<option value="mech">MECH</option>
<option value="civil">CIVIL</option>
</select>
</div>




	<div  class="form-group">
 <label for="sel1">Year</label>
 <select class="form-control" id="year" name="year" value="<?php echo $year ; ?>">
<option value="1">I</option>
<option value="2">II</option>
<option value="3">III</option>
<option value="4">IV</option>
</select>
</div>
<div  class="form-group">
 <label for="sel1">Section</label>
 <select class="form-control" id="section" name="section" value="<?php echo $section ; ?>">
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
</select>
</div>
	
        </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
   </div>
  </div>
 </div>
</div>

      <script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  
   $.ajax({  
    url:"branch2.php",  
    method:"POST",  
    data:$('#insert_form').serialize()+'fid='$fid, 
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
 } 
 });


</td>
</tr>

 <?php
 $count++;
}
?>
</form>
</tbody>
</body>
</html>

		


<style>
p{
	font-size:15px;
}
a{

	padding: 3px;
  font-size: 15px;
  
  border: none;
  border-radius: 5px;
  border-radius: 0px 0px 0px 0px;
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