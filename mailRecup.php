<!doctype html>
<html>
	<head>
		<title>Login </title>
		<link rel="stylesheet" type="text/css" href="style.css"/>		
	</head>	
<body>
		<div class="container">
			<div class="form-style-8">
				<h3>Get your new password</h3>
				<?php include 'mailPass.php'; ?>
				<form style="margin-top: -60px" action = "" method = "POST">
					<div class="message">
					<?php  if (isset($error)) {
					echo"<div class='alert-danger' style='text-align: center;'><span class='closebtn' onclick=this.parentElement.style.display='none'>&times;</span><strong>".$error."</strong></div>";
					}
					else {
				 	echo "<br />";
				 	} 
				?>
				</div>
				    <input class="input" type="text" name="recupEmail" id="recupEmail" placeholder="Email" />
				    <input class="sub" type="submit" name="validation" value="validate" />
				    <a href="index.php"><input class="input-btn" type="button" value="back" /></a>
				</form>
			</div>
		</div>
</body>
</html>