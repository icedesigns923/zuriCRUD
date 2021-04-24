<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if( empty($_POST['courseid']) || empty($_POST['coursename']) )
		{
			echo "Please fill out all required fields"; 
		}else{		
			$courseid  = $_POST['courseid'];
			$coursename 	= $_POST['coursename'];
			
			$sql = "UPDATE courses SET courseid='{$courseid}', coursename = '{$coursename}'
						WHERE course_id=" . $_POST['courseid'];

			if( $conn->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully updated  course</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while updating course</div>";
			}
		}
	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM courses WHERE course_id={$id}";
	$result = $conn->query($sql);

	if($result->num_rows < 1){
		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY Course</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['course_id']; ?>" name="courseid">
				<label for="courseid">Course ID</label>
				<input type="number" id="courseid"  name="courseid" value="<?php echo $row['courseid']; ?>"><br>
				<label for="coursename">Course Name </label>
				<input type="text"  name="coursename" id="coursename" value="<?php echo $row['coursename']; ?>"><br>
				<br>sw
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';