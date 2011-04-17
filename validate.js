jQuery(document).bind('ready', function(event) {
 	jQuery('.placeholder').each(function(i) {
 
		 var item = jQuery(this);
		 var text = item.attr('rel');
		 var form = item.parents('form:first');

		 if (item.val() === '') {
		 	item.val(text);
			 item.css('color', '#888');
		 }
 
		 item.bind('focus.placeholder', function(event) {
		 	if (item.val() === text)
			 item.val('');
			 item.css('color', '');
		 });
 
		 item.bind('blur.placeholder', function(event) {
			 if (item.val() === ''){
				 item.val(text);
				 item.css('color', '#888');
			 }
		 });
 
		 form.bind("submit.placeholder", function(event) {
		 	if (item.val() === text)
			 item.val("");
		 }); 
	 });
});

$('button').live('click', function(){
	if($('input#name').val() == "") {
		alert("You must supply a name.");
		return false;
	}

	// Note: The following regexp is kinda naive; it's provably impossible to create a regexp
	// that catches all possible email address combinations. This will work for most cases though.
   var reg = new RegExp("^[0-9a-zA-Z]+@[0-9a-zA-Z]+[\.]{1}[0-9a-zA-Z]+[\.]?[0-9a-zA-Z]+$");
   if(!reg.test($('input#email').val()) || $('input#email').val() == "user@example.com") {
		alert("Your email address appears to be invalid. Please try re-entering it.");
		return false;
	}
	
});
