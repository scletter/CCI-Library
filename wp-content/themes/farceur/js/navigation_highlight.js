/*!
 * Navigation highlights and accordion
 * Authors: Caring Clowns International
 * Theme: farceur
 * Version: 1.1.0
 */
jQuery(document).ready(function($){
	
	// This function replaces teh suffix of the file with On if hovering over nav img
	// and then off if not hovering.  A CSS style will then be used to get a image that
	// shows the highlighted image.
	$("#navwrap img").hover(
		 function() {
		  this.src = this.src.replace("_Off","_On");
		 },
		 function() {
		  this.src = this.src.replace("_On","_Off");
		 });


	// This uses the getParam() function to extract the value of panel from the query
	// string. The active property must be an integer, so parseInt() converts the value
	// returned from getParam() before assigning it to a new variable called defaultPanel,
	// which is then passed to the accordion constructor as the value of active.
	// If there's no query string, the value is set to 0, which opens the first panel.
	// Otherwise, the value retrieved from the query string is used.	
	// To activate, at the end of the URL query string, add this:  ?panel=n. Where n is 
	// an integer to the panel.
	//
	// Use h3 as section break	
	$(function() {		 
		var defaultPanel = parseInt(getParam('panel'));
		$("#accordion").accordion({
				header: "h3",
				heightStyle: "content",
				collapsible: true,
				active: defaultPanel
		});
	});
	
	$('#menubutton').click(function() {
		var x = document.getElementById("myNavbar");
		if (x.className === "navbar") {
			x.className += " responsive";
		} else {
			x.className = "navbar";
		}
	});
	
});

//This function takes as an argument the name of a variable passed through
// the query string, and returns its value. If it can't find the variable
// (or no query string exists), it returns 0.
function getParam(name) { 
	var query = location.search.substring(1);
	if (query.length) { 
		var parts = query.split('&'); 
		for (var i = 0; i < parts.length; i++) { 
			var pos = parts[i].indexOf('=');
			if (parts[i].substring(0,pos) == name) { 
				return parts[i].substring(pos+1); }
			} 
		} 
	return 0;
};

