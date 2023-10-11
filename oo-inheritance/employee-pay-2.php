<!DOCTYPE html>
<!--	Author: Mike O'Kane
		Date:	December, 2016
		File:	employee-pay2.php
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

	$emp1 = new HourlyEmployee();
	$emp2 = new SalariedEmployee();
	$emp3 = new HourlyEmployee();
	$emp4 = new SalariedEmployee();

	$emp1->findEmployee("123456");
	$emp2->findEmployee("012345");
	$emp3->findEmployee("345678");
	$emp4->findEmployee("678901");	

	print ("<p>Weekly Pay for ".$emp1->getFirstName()." ". $emp1->getLastName().": $".$emp1->getWeeklyPay()."</p>");
	print ("<p>Weekly Pay for ".$emp2->getFirstName()." ". $emp2->getLastName().": $".$emp2->getWeeklyPay()."</p>");
	print ("<p>Weekly Pay for ".$emp3->getFirstName()." ". $emp3->getLastName().": $".$emp3->getWeeklyPay()."</p>");
	print ("<p>Weekly Pay for ".$emp4->getFirstName()." ". $emp4->getLastName().": $".$emp4->getWeeklyPay()."</p>");

?>
</body>
</html>
