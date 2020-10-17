
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="" method="post">
    <p>
        <label for="name">Event Name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="venue">Event Venue:</label>
        <input type="text" name="venue" id="venue">
    </p>
     <p>
        <label for="date_time">Event Date:</label>
        <input type="date" name="date_time" id="date_time">
    </p>
    <p>
        <label for="description">Event Details:</label>
        <textarea type="text" name="description" id="description">
        	
        </textarea>
    </p>
    <input type="submit" value="Submit" name="add-event">
</form>
</body>
</html>

<?php
	include('db.php');
	global $connnect;
 	if (isset($_POST['add-event'])) {
 		# code...

		// Escape user inputs for security
		$name = mysqli_real_escape_string($connnect, $_POST['name']);
		$venue = mysqli_real_escape_string($connnect, $_POST['venue']);
		$date_time = mysqli_real_escape_string($connnect, $_POST['date_time']);
		$description = mysqli_real_escape_string($connnect, $_POST['description']);
		 
		// Attempt insert query execution
		$sql = "INSERT INTO event (name, venue, date_time, description) VALUES ('$name', '$venue', '$date_time', '$description')";
		if(mysqli_query($connnect, $sql)){
		    echo "Records added successfully.";
		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connnect);
		}
		 
		// Close connection
		mysqli_close($connnect);
 	}
?>