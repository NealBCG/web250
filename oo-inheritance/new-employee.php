<!DOCTYPE html>
<!--	Author: Mike O'Kane
		Date:	December, 2016
		File:	new-employee.php
		Purpose: OOP Example
-->

<html>
<head>
	<title>OOP Example</title>
	<link rel ="stylesheet" type="text/css" href="sample.css"  />
</head>

<body>
<?php

	include("inc-employee-object.php");

	$id = $_POST["id"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$title = $_POST["jobTitle"];
	$income = $_POST["income"];
	$empType = $_POST["empType"];

	if ($empType == "Salaried")
	{
		$emp = new SalariedEmployee();
		$emp->setSalary($income);
	}
	else
	{
		$emp = new HourlyEmployee();
		$emp->setHourlyWage($income);
	}

	$emp->setID($id);
	$emp->setFirstName($firstName);
	$emp->setLastName($lastName);
	$emp->setJobTitle($title);
	$emp->addEmployee();

	print("The new $empType employee ($id) has been added to the employee file.");
?>
</body>
</html>