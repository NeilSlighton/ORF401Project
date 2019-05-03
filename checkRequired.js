function checkRequired(fName,lName,Email,Pass) {


var FN= isBlank(fName);

var LN= isBlank(lName);

var EMI= isEmail(Email);

var Pass= isBlank(Pass);



var text = "The following item(s) must be completed:";

var countErrors = 0;



	
if (FN == true) {
	countErrors++;
	text += "  First Name."

	}	
	
if (LN == true) {
	countErrors++;
	text += "  Last Name."
	}		


	
if (Pass == true) {
	countErrors++;
	text += "  Password."
	}	
	

if (EMI == false) {
	countErrors++;
	text += "  valid Email."
	}	




if (countErrors > 0) {
	document.getElementById("blanks").innerHTML = text;
	return false
}



}