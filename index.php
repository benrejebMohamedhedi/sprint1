<!doctype html>
<html>
	<head>
		<title>Login </title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		
	</head>
	
	<body>
		<?php 

//  Récupération de l'utilisateur et de son pass hashé
include '../config_base.php';
$db = config::getConnexion();
 $message = ""; 
if(isset($_POST["Login"]))  
{  
 	$query = "SELECT * FROM User WHERE UserMail = :UserMail AND UserPass = :UserPass";  
    $statement = $db->prepare($query);  
    $statement->execute(  
         array(  
              'UserMail'     =>     $_POST["UserMail"],  
              'UserPass'     =>     $_POST["UserPass"]  
         )  
    );  
    $count = $statement->rowCount();  
    if($count > 0)  
    {  
    	session_start(); 
         $_SESSION["UserMail"] = $_POST["UserMail"];  
         header("location: personalDetails.php");  
    }  
    else  
    {  
         $message = '<label>Wrong Data</label>';  
    }  
}
?>
		<div class="container">
			<div class="form-style-8">
				<h2>Login to your account</h2>
				<div class="msg"><?php echo $message; ?></div>
				<form action = "" method = "POST">
					<label>E-mail</label>
				    <input class="input" type="text" name="UserMail" id="email" placeholder="Email" />
				    <label>Password</label>
				    <input class="input" type="password" name="UserPass" placeholder="password" id="password" />
				    <input class="sub" type="submit" name="Login" value="Login" />
				    <a href="register.php"><input class="input-btn" type="button" id="link" value="Sign Up" /></a>
				</form>
			</div>
			
				 </div>
				 <div class="form-style-8">
				<a  class="lien" href="mailRecup.php">Forget Password?</a> 
				</div>

			<!--fin de container -->
		<!--<script type="text/javascript" src="popUp.js"></script>-->
	</body>
</html>	





