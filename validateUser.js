function validateName()
{
	var name 		= document.getElementById('UserName');
	var nameOk		= document.getElementById('UserName').value;
	var regexName	= new RegExp(/([A-Za-z])/);
	var nameRegex	= new RegExp(/[a-zA-Z][0-9]/)
	var nameError	= document.getElementById('nameError');
	if (!(regexName.test(nameOk))) 
	{
		name.parentNode.classList.remove('correct');
		name.parentNode.classList.add('error');
		nameError.textContent 	= "* name should not contain a number";
		return false;
	}
	else if ((nameRegex.test(nameOk)))
	{
		name.parentNode.classList.remove('correct');
		name.parentNode.classList.add('error');
		nameError.textContent ="* name should not contain any number";
		return false;
	}
	else
	{
		name.parentNode.classList.remove('error');
		name.parentNode.classList.add('correct');
		nameError.textContent ="";
		return true;
	}
}

function validatePrename()
{
	var preName 			= document.getElementById('UserPrename');
	var prenameOk			= document.getElementById('UserPrename').value;
	var regexprename		= new RegExp(/([A-Za-z])/);
	var prenameRegex		= new RegExp(/[a-zA-Z][0-9]/)
	var prenameError		= document.getElementById('prenameError');
	if (!(regexprename.test(prenameOk))) 
	{
		preName.parentNode.classList.remove('correct');
		preName.parentNode.classList.add('error');
		prenameError.textContent 	= "* Prename should not contain a number";
		return false;
	}
	else if ((prenameRegex.test(prenameOk)))
	{
		preName.parentNode.classList.remove('correct');
		preName.parentNode.classList.add('error');
		nameError.textContent ="* Prename should not contain any number";
		return false;
	}
	else
	{
		preName.parentNode.classList.remove('error');
		preName.parentNode.classList.add('correct');
		prenameError.textContent ="";
		return true;
	}
}

function validateMail()
{
	var mail 		= document.getElementById('UserMail');
	var mailOk		= document.getElementById('UserMail').value;
	var regexMail	= new RegExp(/^[a-zA-Z]+[a-zA-Z0-9\_\-\.]*@[a-zA-Z]*.[a-zA-Z][a-zA-Z]{2,3}/);
	var mailError	= document.getElementById('mailError');
	if (!(regexMail.test(mailOk)))
	{
		mail.parentNode.classList.remove('correct');
		mail.parentNode.classList.add('error');
		mailError.textContent 	= "* Mail should be like cou.cou@cou.cou";
		return false;
	}
	else
	{
		mail.parentNode.classList.remove('error');
		mail.parentNode.classList.add('correct');
		mailError.textContent 	= "";
		return true;
	}
}

function validatePass()
{
	var pass 	= document.getElementById('UserPass'),
	 	passOk 	= document.getElementById('password');

	if (pass.value == passOk.value) {
		pass.parentNode.classList.remove('error');
		pass.parentNode.classList.add('correct');
		passError.textContent 	= "password are not matching";
		return true;
	}
	else{
		mail.parentNode.classList.remove('correct');
		mail.parentNode.classList.add('error');
		mailError.textContent 	= "* Mail should be like cou.cou@cou.cou";
		return false;
	}
}