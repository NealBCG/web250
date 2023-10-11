<?php
abstract class Employee
{
	protected $empID;
	protected $firstName;
	protected $lastName;
	protected $jobTitle;

	public function getID()
	{
		return $this->empID;
	}
	
	public function setID($empID)	
	{
		$this->empID = $empID;
	}
	
	public function getFirstName()
	{
		return $this->firstName;
	}
	
	public function setFirstName($fName)
	{
		$this->firstName = $fName;
	}
	
	public function getLastName()
	{	
		return $this->lastName;
	}
	
	public function setLastName($lName)
	{
		$this->lastName = $lName;
	}
	
	public function getJobTitle()
	{
		return $this->jobTitle;
	}
	
	public function setJobTitle($title)
	{
		$this->jobTitle = $title;
	}	
	
abstract public function getWeeklyPay();
abstract public function addEmployee();
abstract public function findEmployee($id);
} // end of class definition

class SalariedEmployee extends Employee
{
	private $salary;

	public function addEmployee()
	{
		$empRecord = $this->empID.", ".$this->firstName.", ".$this->lastName.", ".$this->jobTitle.", ".$this->salary."\n";
		$empFile = fopen("employees.txt", "a");
		fputs($empFile, $empRecord);
		fclose($empFile);
	}

	public function findEmployee($id)
	{
		$empFile = fopen("employees.txt", "r");
		$empRecord = trim(fgets($empFile));
		$notFound = true;
		while (!feof($empFile) and $notFound)
		{
			list ($empID, $fName, $lName, $title, $salary) = explode(",", $empRecord);
			if ($id == $empID)
			{
				$this->empID = $empID;
				$this->firstName = $fName;
				$this->lastName = $lName;
				$this->jobTitle = $title;
				$this->salary = $salary;
				$notFound = false;
			}
			$empRecord = trim(fgets($empFile));
		}
		fclose($empFile);

	}
	
	public function getSalary()
	{
		return $this->salary;
	}
	
	public function setSalary($salary)
	{
		$this->salary = $salary;
	}
	
	public function getWeeklyPay()
	{
		return number_format ($this->salary/52, 2);
	}
	
} // end of class definition

class HourlyEmployee extends Employee
{
	private $hourlyWage;

	public function addEmployee()
	{
		$empRecord = $this->empID.", ".$this->firstName.", ".$this->lastName.", ".$this->jobTitle.", ".$this->hourlyWage."\n";
		$empFile = fopen("employees.txt", "a");
		fputs($empFile, $empRecord);
		fclose($empFile);
	}

	public function findEmployee($id)
	{
		$empFile = fopen("employees.txt", "r");
		$empRecord = trim(fgets($empFile));
		$notFound = true;
		while (!feof($empFile) or $notFound)
		{
			list ($empID, $fName, $lName, $title, $wage) = explode(",", $empRecord);
			if ($id == $empID)
			{
				$this->empID = $empID;
				$this->firstName = $fName;
				$this->lastName = $lName;
				$this->jobTitle = $title;
				$this->hourlyWage = $wage;
				$notFound = false;
			}
			$empRecord = trim(fgets($empFile));
		}
		fclose($empFile);

	}

	public function getHourlyWage()
	{
		return $this->hourlyWage;
	}
	
	public function setHourlyWage($hourlyWage)
	{
		$this->hourlyWage = $hourlyWage;
	}
	
	public function getWeeklyPay()
	{
		return number_format ($this->hourlyWage * 40, 2);
	}
	
} // end of class definition

?>
