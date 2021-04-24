<?php

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM courses WHERE courseid=" . $_POST['courseid'];
	if($conn->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Successfully delete  course</div>";
	}
}

$sql 	= "SELECT * FROM courses";
$result = $conn->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>List of all Courses</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td>Course ID</td>
			<td>Course Name</td>
			<td width="70px">Delete</td>
			<td width="70px">EDIT</td>
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['course_id']."' name='courseid' />"; //added
		echo "<tr>";
		echo "<td>".$row['Course ID'] . "</td>";
		echo "<td>".$row['Course Name'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='edit.php?id=".$row['course_id']."' class='btn btn-info'>Edit</a></td>";
		echo "</tr>";
		echo "</form>"; //added 
	}
	?>
	</table>
<?php 
}
else
{
	echo "<br><br>No Record Found";
}
?> 
</div>



<?php 

 require_once 'footer.php';