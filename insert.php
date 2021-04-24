<?php 

require_once 'connect.php';

require_once 'header.php';


?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['CourseID']) || empty($_POST['CourseName'])   ){
			echo "Please fillout all required fields"; 
		}else{	
			$Course_id = $_POST['Course_id'];
			$CourseID  = $_POST['Course ID'];
			$CourseName 	= $_POST['Course Name'];
			$sql = "INSERT INTO courses(Course_id,Course ID,Course Name); 
		    VALUES('$Course_id','$CourseID','$CourseName')";

			if( $conn->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully added new course</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while adding new course</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Course</h3> 
			<form action="" method="POST">
				<label for="CourseID">Course ID</label>
				<input type="text" id="courseid"  name="courseid" class="form-control"><br>
				<label for="CourseName">Course Name</label>
				<input type="text"  name="CourseName" id="coursename" class="form-control"><br>
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Add New">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';




