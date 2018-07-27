function validateForm()
{
	var nameVide = document.getElementById('UserName').value,
		prenameVide = document.getElementById('UserPrename').value,
		mailVide = document.getElementById('UserMail').value,
		passVide = document.getElementById('UserPass').value,

		vide = document.getElementById('vide');
	if ((nameVide == "") || (prenameVide == "") || (mailVide == "") || (passVide == "") )
	{
		vide.parentNode.classList.add('error');
		vide.parentNode.classList.add('vide');
		vide.style.display 	= "block";
		vide.textContent 	= "les champs ne doivent pas etre vide";
		//elt.addEventListener('keydown', removeValidateProfile(elt));
		return false;
	}
	else
	{
		return true;
	}
}

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
		nameError.style.display = "block";
		nameError.textContent 	= "* name should not contain a number";
		return false;
	}
	else if ((nameRegex.test(nameOk)))
	{
		name.parentNode.classList.remove('correct');
		name.parentNode.classList.add('error');
		nameError.style.display = "block"
		nameError.textContent ="* name should not contain any number";
		return false;
	}
	else
	{
		name.parentNode.classList.remove('error');
		name.parentNode.classList.add('correct');
		nameError.style.display = "none"
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
		prenameError.style.display = "block"
		prenameError.textContent 	= "* Prename should not contain a number";
		return false;
	}
	else if ((prenameRegex.test(prenameOk)))
	{
		preName.parentNode.classList.remove('correct');
		preName.parentNode.classList.add('error');
		prenameError.style.display = "block"
		nameError.textContent ="* Prename should not contain any number";
		return false;
	}
	else
	{
		preName.parentNode.classList.remove('error');
		preName.parentNode.classList.add('correct');
		prenameError.style.display = "none"
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
		mailError.style.display = "block"
		mailError.textContent 	= "* Mail should be like cou.cou@cou.cou";
		return false;
	}
	else if (regexMail.test(mailOk)){
		mail.parentNode.classList.remove('error');
		mail.parentNode.classList.add('correct');
		mailError.style.display = "none"
		mailError.textContent 	= "";
		return true;
	}
}

var validatePass=function()
{
	var pass 		= document.getElementById('UserPass'),
	 	passOk 		= document.getElementById('password'),
	 	passError	= document.getElementById('passError');

	if (pass.value == passOk.value)
	{
		pass.parentNode.classList.remove('error');
		pass.parentNode.classList.add('correct');
		passOk.parentNode.classList.remove('error');
		passOk.parentNode.classList.add('correct')
		passError.style.display = "inline-block"
		passError.textContent 	= "matching";
	} 
	else {
		pass.parentNode.classList.remove('correct');
		pass.parentNode.classList.add('error');
		passOk.parentNode.classList.remove('correct');
		passOk.parentNode.classList.add('error');
		passError.style.display = "block"
		passError.textContent 	= "password are not matching";
	}
	
}

function CloseWindow() {
    var obj_window = window.open('', '_self');
    obj_window.opener = window;
    obj_window.focus();
    opener=self;
    self.close();
}