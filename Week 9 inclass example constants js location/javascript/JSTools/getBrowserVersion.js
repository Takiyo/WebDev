//Version: 2011-11-17

//See boolean functions below.

//This function returns the browser name and version number (cleaned up).
//
//Sample call: browserVersion = getBrowserVersion();
function getBrowserVersion() {
	var name = navigator.appName;
	var version = navigator.appVersion;
	var agent = navigator.userAgent;
	
	if (inFirefox()) {
		name = "Firefox";
		version = agent.substr(agent.lastIndexOf("/") + 1);
	} else if (inInternetExplorer()) {
		var verStart = agent.indexOf("MSIE ") + 5;
		var verEnd = agent.indexOf(";",verStart);
		version = agent.substring(verStart, verEnd);
	} else if (inChrome()) {
		name = "Chrome";
		var verStart = version.indexOf("Chrome/") + 7;
		var verEnd = version.indexOf(" ", verStart);
		version = version.substring(verStart, verEnd);
	}else if (inOpera()) {
		version = agent.substr(agent.lastIndexOf("/")+1);
	} else {
		name = "Unknown Browser";
		version = "0.0";
	}//end if
	
	return name + " Version: " + version;
}//end getBrowserVersion

//This function determines if the current browser is Firefox
function inFirefox(){
	return navigator.userAgent.indexOf("Firefox") != -1;
}//end inFirefox

//This function determines if the current browser is Internet Explorer
function inInternetExplorer(){
	return navigator.appName=="Microsoft Internet Explorer";
}//end inFirefox

//This function determines if the current browser is Chrome
function inChrome(){
	return navigator.appVersion.indexOf("Chrome") != -1;
}//end inFirefox

//This function determines if the current browser is Opera
function inOpera(){
	return navigator.appName=="Opera";
}//end inFirefox
