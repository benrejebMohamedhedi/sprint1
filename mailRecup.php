<!doctype html>
<html>
	<head>
		<title>Login </title>
		<link rel="stylesheet" type="text/css" href="style.css"/>		
	</head>	
<body>
		<div class="container">
			<div class="form-style-8">
				<h2>Get your new password</h2>
				<?php include 'mailPass.php'; ?>
				<form action = "" method = "POST">
					<label>E-mail</label>
				    <input class="input" type="text" name="recupEmail" id="recupEmail" placeholder="Email" />
				    <input class="sub" type="submit" name="validation" value="validate" />
				</form>
				<?php  if (isset($error)) {
					echo'<span>'.$error.'</span>';
				}
				else {
				 	echo "<br />";
				 } 
				?>
			</div>
		</div>
</body>
</html>