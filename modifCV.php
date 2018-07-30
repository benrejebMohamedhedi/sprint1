<?php
include '../config_base.php';
session_start();
$db = config::getConnexion();
$query = "SELECT * FROM User WHERE UserMail =  '".$_SESSION['UserMail']."'";  
    $statement = $db->prepare($query);  
    $statement->execute();
    $UserName = $statement->fetch();
    $UserName = $UserName['UserName'];

?>
<?php

$db = config::getConnexion();
$query = "SELECT * FROM profile WHERE email =  '".$_SESSION['UserMail']."'";  
    $statement = $db->prepare($query);  
    $statement->execute();
    $user   = $statement->fetch(PDO::FETCH_ASSOC);


?>
<!doctype html>
<html>
	<head>
		<title> MON CV </title>
		<link rel="stylesheet" type="text/css" href="stylecv.css"/>
		<link rel="stylesheet" type="text/css" href="popupModal.css"/>
		<link rel="stylesheet" type="text/css" href="cvAcreer.css"/>
		
	</head>
	
	<body>
		<div class="container">
			<div class="navbar">
				<ul>
				  <li><a class="active" href="profil.php">Mon compte</a></li>
				  <li><a href="cvAcreer.php">Créer mon CV</a></li>
				  <li><a href="#">Modifier mon CV</a></li>
				  <li style="float:right"><a href="logout.php">Logout</a></li>
				</ul>
			</div>	

			<div class="container-top">
				<fieldset class="fieldset-top">
					<button id="myBtn" name="edit"><img src="edit.png"></button>
				<legend>Personal Details</legend>
				<form method="POST" action="addProfile.php" name="form" onsubmit="return validation ();">
					<table id="tab"> 
						
						<tr>
							<td><label>Name <em>*</em> : </label></td>
							<td><input class="input-formModif" type="text" disabled="disabled" value="<?php if(isset($_SESSION["UserMail"])) { echo $UserName; }?>" name = "name" id="name" ></td>
							
							<td><label>Date of birth <em>*</em> : </label></td>
							<td><input class="input-formModif" type="date" disabled="disabled" name="dateBirth" value="<?php echo $user['dateBirth']; ?>"></td>

							<td rowspan="6"><label>Photo <em>*</em> : </label></td>
							<td rowspan="6"><img src="../images/<?PHP echo $user['image']; ?>" class="pro-image-front"></td>
						</tr>
						<tr>
							<td><label>Place of birth <em>*</em> : </label></td>
							<td><input class="input-formModif" type="text" disabled="disabled" name="placeBirth" id="place" value="<?php echo $user['placeBirth']; ?>"></td>
						
							<td><label>Adress <em>*</em> : </label></td>
							<td><input class="input-formModif" type="text" disabled="disabled" name="adress" id="adress" value="<?php echo $user['adress']; ?>"></td>
						</tr>
						<tr>
							<td><label>Phone <em>*</em> : </label></td>
							<td><input class="input-formModif" type="text" disabled="disabled" name="Phone" id="phone" value="<?php echo $user['Phone']; ?>"></td>
						
							<td><label>E-mail <em>*</em> : </label></td>
							<td><input class="input-formModif" type="text" disabled="disabled" name="email" value="<?php if(isset($_SESSION["UserMail"])) { echo $_SESSION["UserMail"]; }?>" id="email"></td>
						</tr>
						<tr>
							<td><label>GitHub profil <em>*</em> : </label></td>
							<td><input class="input-formModif" type="text" name="gitProfile" value="<?php echo $user['gitProfile']; ?>" id="gitprofil"></td>
						
							<td><label>Personality <em>*</em> : </label></td>
							<td><textarea name="personality" value="<?php echo $user['personality']; ?>" id="personality"></textarea></td>
						</tr>
					</table>
				</form>
				
			</fieldset>
			</div>
			

			

			<div class="container-left">
				
			</div>

			<div class="container-right">
				
			</div>
		</div>


		<div id="myModal" class="modal">
						<div class="modal-content">
							<span class="close">&times;</span>
							<form method="POST" action="UpdateDetails.php">
			   				 <table id="tab"> 
						
						<tr>
							<td><label>Name <em>*</em> : </label></td>
							<td><input class="input-form" type="text" value="<?php  if(isset($_SESSION["UserMail"])) { echo $UserName; } ?>" name = "name" id="name" ></td>
							
							<td><label>Date of birth <em>*</em> : </label></td>
							<td><input class="input-form" type="date" value="<?php echo $user['dateBirth']; ?>" name="dateBirth"></td>

							<td rowspan="6"><label>Photo <em>*</em> : </label></td>
							<td rowspan="6"><input class="input-form"  type="file" name="photo"></td>
						</tr>
						<tr>
							<td><label>Place of birth <em>*</em> : </label></td>
							<td><input class="input-form" type="text" name="placeBirth" id="place" value="<?php echo $user['placeBirth']; ?>"></td>
						
							<td><label>Adress <em>*</em> : </label></td>
							<td><input class="input-form" type="text" name="adress" id="adress" value="<?php echo $user['adress']; ?>" ></td>
						</tr>
						<tr>
							<td><label>Phone <em>*</em> : </label></td>
							<td><input class="input-form" type="text" name="Phone" id="phone" value="<?php echo $user['Phone']; ?>"></td>
						
							<td><label>E-mail <em>*</em> : </label></td>
							<td><input class="input-form" type="text" name="email" value="<?php if(isset($_SESSION["UserMail"])) { echo $_SESSION["UserMail"]; }?>" id="email"></td>
						</tr>
						<tr>
							<td><label>GitHub profil <em>*</em> : </label></td>
							<td><input class="input-form" type="text" name="gitProfile" value="<?php echo $user['gitProfile']; ?>" id="gitprofil"></td>
						
							<td><label>Personality <em>*</em> : </label></td>
							<td><textarea name="personality" value="<?php echo $user['personality']; ?>" id="personality"></textarea></td>
						</tr>
						<tr>
							<td colspan="3"><input type="submit" value="Enregistrer" id="enregistrer" name="Enregistrer"></td>
						</tr>
					</table>	
					</form>
						</div>
					</div>
	<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	</script>

	</body>
</html>