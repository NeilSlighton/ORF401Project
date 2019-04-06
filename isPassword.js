function isPassword(input)
{
	if (input.length == 0)
	{
		return "password field blank";
	}
	if(input.length < 6)
	{
		return "password must be at least 6 characters!"
	}
	containsNum = /\d/.test(input)
	if(!containsNum)
	{
		return "password must have at least one number!"
	}
	containsCap = /[A-Z]/.test(input)
	if(!containsCap)
	{
		return "password must contain at least one uppercase letter!"
	}
	return true


	//got help from w3schools.com on how to use regex
}