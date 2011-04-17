The Form
=======================
This is just an example comment/sign-up form, using PHP, jQuery and HTML.
We're using the RedBean ORM for maximum efficiency (it's pretty neat for quick dev work).

Requirements:
-----------------
PHP 5.3+
MySQL of some description
An SMTP server

Setup:
-----------------
In MySQL...  
	  
    	create database pollenizer_test;  
    	grant all on pollenizer_test.* to 'pollenizer_test'@'localhost' IDENTIFIED BY 'password';
		

You'll then need to copy config.php.default to config.php, and edit that file to enter correct values for your environment.

That should be all you need.

Notes
-----------------
*Why RedBean?*  
RedBean is great for rapid prototyping of PHP projects. You don't even have to create a db schema - it'll create one on the fly. Of course this is a double-edged sword and you'd be mad to keep developing like that forever, but for short spikes it'll do.

  
*Why SwiftMail?*  
Because using low-level SMTP functions is madness. SwiftMail gives us all sorts of nice sanity checking and error handling out of the box (not that I'm using it all).

*Why no unit tests!?*  
Normally I would, believe me, but for a project this small - it isn't even rightly MVC - it seemed like massive scary overkill. IMO, part of knowing rules is knowing when to break them.
