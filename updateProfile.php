<?php
require 'profil.php';
$UserName=$_POST['UserName'];
$UserPrename=$_POST['UserPrename'];
$UserMail=$_POST['UserMail'];
$UserPass=$_POST['UserPass'];

	$sql = 'UPDATE User SET UserName=?, UserPrename=?, UserMail=?, UserPass=? WHERE UserMail ="'.$_SESSION['UserMail'].'" ';
        $stmt = $db->prepare($sql);    
        $stmt->execute(
            [$UserName,$UserPrename,$UserMail,$UserPass]
        );
        header("location: MonCv.php");
	?>