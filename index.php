<!doctype html>
<html>
	<head>
		<title>Login </title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		
	</head>
	
	<body>
		<?php 
//  Récupération de l'utilisateur et de son pass hashé
include_once '../config_base.php';
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
        $_SESSION["UserMail"] = $_POST['UserMail']; 
        header("location: MonCv.php");  
    }  
    else  
    {  
         $message = '<label style="margin: 0px 210px; color: red;">Invalid Mail Or Password</label>';  
    }  
}
?>

	
		<div class="container">
		<h1>JLDTKC/2018</h1>
		
			<div class="form-style-8">
				<?php
                	session_start();
                    if (isset($_SESSION["message"])) 
                    	{ 
                    		echo "<div class='alert-success' style='text-align: center;'><span class='closebtn' onclick=this.parentElement.style.display='none'>&times;</span><strong>Bienvenue cher client </br>Votre compte a été crée avec succes</strong></div>";
                            session_unset();
                        }
                ?>
                <?php 
                	include_once 'mailPass.php';
                	if (isset($_POST["validation"])) {
                		
                        echo "<div class='alert-success' style='text-align: center;'><span class='closebtn' onclick=this.parentElement.style.display='none'>&times;</span><strong>Un mail contenant votre nouveau mot de passe a été envoyé avec succes</strong></div>";  
                	}
                ?>
				<h2>Login to your account</h2>
				<div class="msg"><?php echo $message; ?></div>
				<form action = "" method = "POST">
				    <input class="input" type="text" name="UserMail" id="email" placeholder="Email" />
				     <input class="input" type="password" name="UserPass" placeholder="password" id="password" />
				   	<div class="deuxBoutons">
				    	<input class="sub" type="submit" name="Login" value="Login" />
				    	<a href="register.php"><input class="input-btn" type="button" id="link" value="Sign Up" /></a>
					</div>
				</form>
			</div>
			<div class="form-style-8">
				<a  class="lien" href="mailRecup.php">Forget Password?</a> 
			</div>
		</div>
		<!--fin de container -->
		<!--<script type="text/javascript" src="popUp.js"></script>-->
	</body>
</html>	





