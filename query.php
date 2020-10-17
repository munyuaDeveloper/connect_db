<?php
include "./db.php";
function getEvents(){
	global $connnect;
	$getEvents="select * from event";
	$runGetEvents=mysqli_query($connnect,$getEvents);
	while ($row=mysqli_fetch_array($runGetEvents)) {
		$event_id=$row['id'];
		$event_name=$row['name'];
		$event_venue=$row['venue'];
		$event_time=$row['date_time'];

		// echo $event_name;
	echo "<li style='display:inline; padding:10px; margin:auto; font-size:20px; '> <a href='event-details.php?event_id=$event_id' style='text-decoration:none;'>$event_name</a></li> <br>";
	}
	
}


function eventDetails(){
	global $connnect;
	if(!isset($_GET['event_id'])){
		echo "welcome to our events";
	}
	else{

		$event_id=$_GET['event_id'];
		$getdept=" select * from event where id='$event_id'";
		$rungetdept=mysqli_query($connnect,$getdept);
		while($row=mysqli_fetch_assoc($rungetdept)){
			$event_name=$row['name'];
			$event_venue=$row['venue'];
			$event_time=$row['date_time'];
			$event_desc=$row['description'];
		
			echo "
			<div width='500' height='auto;' align='left;'>
			<h2 style='text-align:center;'>$event_name</h2>
			<p> Event: $event_name</p>
			<p> The venue: $event_venue</p>
			<p style='width:400'>Event start at: $event_time</p>
			<h3>Event Deails</h3>
			<p>$event_desc</p>
			</div>
			";
		}
	}

}

?>