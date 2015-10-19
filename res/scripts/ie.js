window.onload=function(){
var message='This version of nanote does not support Internet Explorer. '+
	'However, there is an addon by Google called Chrome Frame that will make your more compatible with the higher web standards.'+
	'\n\nClick "OK" to check out Google Chrome Frame or "Cancel" to head back to the previous page.';
	if(confirm(message)){
		window.location="http://www.google.com/chromeframe";
	}else{
		history.go(-1);
		return 1;
	}
}