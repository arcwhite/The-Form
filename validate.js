$('button').live('click', function(){
	if($('input#name').val() == "") {
		alert("You must supply a name.");
		return false;
	}

	// Note: The follow regexp is kinda naive; it's provably impossible to create a regexp
	// that catches all possible email address combinations. This will work for most cases though.
   var reg = new RegExp("^[0-9a-zA-Z]+@[0-9a-zA-Z]+[\.]{1}[0-9a-zA-Z]+[\.]?[0-9a-zA-Z]+$");
   if(!reg.test($('input#email').val())) {
		alert("Your email address appears to be invalid. Please try re-entering it.");
		return false;
	}
	
});
