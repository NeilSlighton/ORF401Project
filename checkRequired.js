function checkRequired(){
	var fnameBlank = isBlank(document.getElementById("fnameInput").value)
	var lnameBlank = isBlank(document.getElementById("lnameInput").value)
	var emailBlank = isBlank(document.getElementById("emailInput").value)
	var passwordBlank = isBlank(document.getElementById("passwordInput").value)

	var validEmail = isEmail(document.getElementById("emailInput").value)
	var validPassword = isPassword(document.getElementById("passwordInput").value)

	var totBlank = 0
	if(fnameBlank == true)
	{
		totBlank = totBlank + 1
		document.getElementById("fnamePost").innerText = "Can't leave this blank!"
	}
	else
	{
		document.getElementById("fnamePost").innerText = ""

	}

	if(lnameBlank == true)
	{
		totBlank = totBlank + 1
		document.getElementById("lnamePost").innerText = "Can't leave this blank!"
	}
	else
	{
		document.getElementById("lnamePost").innerText = ""

	}

	if(emailBlank == true)
	{
		totBlank = totBlank + 1
		document.getElementById("emailPost").innerText = "Can't leave this blank!"
	}
	else if (validEmail != true) //need to do != true because sting is not false!
	{
		document.getElementById("emailPost").innerText = "Not a valid email!"
	}
	else 
	{
		document.getElementById("emailPost").innerText = ""		
	}


	if(passwordBlank == true)
	{
		totBlank = totBlank + 1
		document.getElementById("passwordPost").innerText = "Can't leave this blank!"
	}
	else if (validPassword != true) //need to do false because string is != True!
	{
		document.getElementById("passwordPost").innerText = validPassword
	}
	else
	{
		document.getElementById("passwordPost").innerText = ""

	}

	if( fnameBlank  == true || lnameBlank  == true || emailBlank == true || validEmail != true || passwordBlank == true || validPassword != true)
	{
		if(totBlank != 0){
			alert("You have " + totBlank + " required fields blank! Please see below")
		}
		return false
	}
	else
	{
		return true		
	}


}
