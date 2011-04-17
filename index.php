<?php
	$name 		= isset($_GET['name']) ? $_GET['name']: "";
	$address 	= isset($_GET['address']) ? $_GET['address']: "";
	$email 		= isset($_GET['email']) ? $_GET['email']: "";
	$comments 	= isset($_GET['comments']) ? $_GET['comments']: "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>The Form - It's For Filling Out</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="./validate.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen,print"/>
</head>

<body>
	<div class="main">
		<h1>The Form</h1>
		<p>Please fill out the following form. It will sign you up to our amazing newsletter, a move that you will never in a million years regret.</p>
		<form action="process.php" method="POST">
			<label for="name">Name:</label>
			<input class="placeholder" rel="Your Name" id="name" name="name" value="<?php echo $name; ?>"/>
			<label for="address">Address:</label>
			<input class="placeholder" rel="Your Address" name="address" value="<?php echo $address; ?>"/>
			<label for="email">Email:</label>
			<input class="placeholder" rel="user@example.com" id="email" name="email" value="<?php echo $email; ?>"/>
		
			<label for="comments">Comments</label>
			<textarea name="comments" class="placeholder" rel="Comments?"><?php echo $comments; ?></textarea>
			
			<label for="subscribed">Subscribe to newsletter?</label>		
			<input class="radio" type="radio" name="subscribed" value="Yes"/>Yes<br/>
			<input class="radio" type="radio" name="subscribed" value="No"/>No
			<button>Submit</button>
		</form>
	</div>
</body>
</html>
