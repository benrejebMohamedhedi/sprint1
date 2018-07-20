<?php
require_once '../entities/user.php';
require_once '../core/userC.php';


$errorInputs = [];
$invalidName = [];

$requireElements = array(
	"UserName", "UserPrename", "UserMail", "UserPass"
);

$invalidElements = array("UserName");
$invalidMail = array("UserMail");
$mailInput = [];

//$invalidPass = array("UserPass");
//$passInput =[];

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

	foreach ($invalidElements as $key => $inputId) 
	{
		if((ctype_digit($_POST['UserName'])))
		{
			$invalidName[] = $inputId;
		}
	}

	foreach ($invalidMail as $key => $inputId) 
	{
		$mailOk = preg_match("/^[a-zA-Z]+[a-zA-Z0-9\_\-\.]*@[a-zA-Z]*.[a-zA-Z][a-zA-Z]{2,3}/", $_POST['UserMail']);
		if(!$mailOk)
		{
			$mailInput[] = $inputId;
		}
	}

	/*foreach ($invalidPass as $key => $inputId) 
	{
		if($_POST['UserPass'] =! $_POST['password'] )
		{
			$passInput[] = $inputId;
		}
	}*/

	
	if ((count($errorInputs)==0) && (count($invalidName)==0) && (count($mailInput)==0) ) 
	{
		$User1=new User($_POST['UserName'],$_POST['UserPrename'],$_POST['UserMail'],$_POST['UserPass']);

		$UserC= new UserC();
		$UserC->addUser($User1);
		//header('location:listeProfiles.php');
	}

}

?>