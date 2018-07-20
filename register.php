<!doctype html>
<html>
	<head>
		<title>Login </title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	</head>
	
	<body>
		<?php include "addUser.php";?>
		<div class="container">
			<div class="form-style-8">
				<h2>Login to your account</h2>
				<form method="POST" action="">
					<?php if (count($errorInputs)){  ?>
					<?php }   ?>
					<div <?php 
						if((in_array("UserName", $errorInputs)) || (in_array("UserName", $invalidName) ))
						{	echo " class='error'" ;	}
						else
							{	echo " class='correct'" ;	}
						?>>
						<input class="input" type="text" name="UserName" id="UserName" onkeypress="validateName();"  value="<?php if (isset($_POST['UserName'])){echo $_POST['UserName'];} ?>" placeholder="Enter your name" />
						<span id="nameError"></span>
					</div>

					<div <?php 
						if(in_array("UserPrename", $errorInputs))
						{
							echo " class='error'" ;
						}
						else
						{
							echo " class='correct'" ;
						}
						?>>
						<input class="input" type="text" name="UserPrename" id="UserPrename" onkeypress="validatePrename();"  value="<?php if (isset($_POST['UserPrename'])){echo $_POST['UserPrename'];} ?>" placeholder="Enter your prename" />
						<span id="prenameError"></span>
					</div>

					<div <?php 
						if((in_array("UserMail", $errorInputs))|| (in_array("UserMail", $mailInput) ))
						{
							echo " class='error'" ;
						}
						else
						{
							echo " class='correct'" ;
						}
						?>>
						<input class="input" type="text" name="UserMail" id="UserMail" onkeypress="validateMail();" value="<?php if (isset($_POST['UserMail'])){echo $_POST['UserMail'];} ?>"  placeholder="Enter your email" />
						<span id="mailError"></span>
					</div>

					<div <?php 
						if(in_array("UserPass", $errorInputs))
						{
							echo " class='error'" ;
						}
						else
						{
							echo " class='correct'" ;
						}
						?>>
				   		<input class="input" type="password" name="UserPass" id="UserPass" placeholder="password" />
				   	</div>
				   	<div <?php 
						if(in_array("UserPass", $errorInputs))
						{
							echo " class='error'" ;
						}
						else
						{
							echo " class='correct'" ;
						}
						?>>
				    	<input class="input" type="password" name="password" placeholder="confirm password" id="password" />
				    	<span id="passError"></span>
				    </div>
				    <input class="sub" type="submit" value="Register" />
				</form>
			</div>
		</div>
		<script type="text/javascript" src="validateUser.js"></script>
	</body>
</html>