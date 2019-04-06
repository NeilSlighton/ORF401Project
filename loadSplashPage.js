
function getCookie(c_name) {
   var i,x,y,ARRcookies=document.cookie.split(";");
   for (i=0;i<ARRcookies.length;i++){
      x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
      y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
      x=x.replace(/^\s+|\s+$/g,"");
      if (x==c_name) {
        return unescape(y);
      }
   }
}


function setCookie(c_name,value,exdays) {
   var exdate=new Date();
   exdate.setDate(exdate.getDate() + exdays);
   var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
   document.cookie=c_name + "=" + c_value;
}


function loadSplashPage(){
	var flag = getCookie("splashRides");
	if(flag != "yes"){
		setCookie("splashRides", "yes", 365)
      document.getElementById("splashImg").style.visibility = "visible";
      document.getElementById("splashImg").height = "400";
      document.getElementById("splashImg").width = "500";
      document.getElementById("splashHeader").innerText = "Welcome First-Time User!";
      document.getElementById("splashText").innerText = "Welcome to PickUpPros! Our website allows you to arrange a ride to and from various destinations in the US, click on the 'register' link to get started or search for a destination below!";


	}
	

}