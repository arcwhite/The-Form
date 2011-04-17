<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>An XHTML 1.0 Strict standard template</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" src="./validate.js"></script>
	<style>
		input {
			clear: right;
			display: block;
		}
		
		label {
			display: block;

		}
		
	</style>
</head>

<body>
	<h1>The Form</h1>
	<form>
		<label for="name">Name:</label>
		<input name="name"/>
		<label for="address">Address:</label>
		<input name="address"/>
		<label for="email">Email:</label>
		<input name="email"/>

		<input type="checkbox" name="subscribed" value="1"/>
		<label for="subscribed">Subscribe to newsletter?</label>
		
		<textarea name="comments"></textarea>
		
		<button>Submit</button>
	</form>
</body>
</html>