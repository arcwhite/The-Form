<?php
/**
 * This file processes the user's input, stores the data and sends an email.
 * Yeah, I could have made this code OO, but there didn't seem like a lot of point.
 * 2011 Andy White (arcwhite@arcwhite.org)
 */
require("config.php");
require("rb.php");
require("Swift-4.0.6/lib/swift_required.php");

// Server-side Validate

if(!isset($_POST["email"]) || !isset($_POST["name"]) ) {
	// Throw back to the form with an error message displayed
	// Also check email format
}

// Activate RedBean
R::setup("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB, MYSQL_USER, MYSQL_PASS);

/**
 * We use ReadBean to store the data. It even does the tedious table-creation
 * magic for us. However, you really need to get those member variable names right
 * or you add an extra column to your table!
 */
$user = R::dispense("user");
$user->name = $_POST["name"];
$user->address = $_POST["address"];
$user->email = $_POST["email"];
$user->subscribe = (isset($_POST["subscribed"]) && $_POST["subscribed"] == "Yes" ? 1 : 0);
$user->comments = $_POST["comments"];

$id = R::store($user);

// Now send the email
$body = <<<EOF
   Name: $user->name
  Email: $user->email
Address: $user->address
	
Your Comments:
$user->comments
EOF;

//Create the message
$message = Swift_Message::newInstance()
  		->setSubject('Successful Form Submission')
  		->setFrom(array(EMAIL_FROM_ADDR => EMAIL_FROM_NAME))
  		->setTo(array($user->email => $user->name))
  		->setBody($body);

//Create the Transport
$transport = Swift_SmtpTransport::newInstance(SMTP_SERVER, 25)
  ->setUsername(SMTP_USER)
  ->setPassword(SMTP_PASSWORD);

//Create the Mailer
$mailer = Swift_Mailer::newInstance($transport);

//Send the message
$result = $mailer->send($message);

header("Location: index.php");

?>