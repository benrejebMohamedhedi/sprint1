<?php
require_once '../entities/profile.php';
require_once '../core/profileC.php';

$errorInputs = [];
$requireElements = array(
	"placeBirth", "Phone", "dateBirth", "adress", "gitProfile", "personality", "name", "email"
);
if($_POST)
{
//$phone = $_POST['phone'];

	foreach ($requireElements as $key => $inputName) 
	{
		if(!isset($_POST[$inputName]) || $_POST[$inputName] == "") 
		{
			$errorInputs[] = $inputName;
		}
	}

	if (count($errorInputs)==0) 
	{
		$profile1=new profile($_POST['name'],$_POST['dateBirth'],$_POST['placeBirth'],$_POST['adress'],$_POST['Phone'],$_POST['email'],$_POST['gitProfile'],$_POST['personality'],$_POST['image']);


		$profileC= new profileC();
		$profileC->addProfile($profile1);
		
		header("location: MonCv.php");
	}
}
?>