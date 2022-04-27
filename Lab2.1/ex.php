<?php 
	$name = $_POST["name"];
	$class = $_POST["class"];
	$university = $_POST["university"];
	$hobbies = array();

	$listening = $_POST["listening"];
	if($listening == "Yes") array_push($hobbies,"Listening");

	$game = $_POST["game"];
	if($game == "Yes") array_push($hobbies,"Game");

	$film = $_POST["film"];
	if($film == "Yes") array_push($hobbies,"Film");

	$football = $_POST["football"];
	if($football == "Yes") array_push($hobbies,"Football");

	

	print "Hello, $name <br />";
	print "You are studing at $class, $university <br />";
	print "Your hobby is :  <br />";
	foreach ($hobbies as $i) {
		print "- $i <br />";
	}
 ?>