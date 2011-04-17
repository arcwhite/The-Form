<?php
/**
 * This file processes the user's input, stores the data and sends an email.
 * Yeah, I could have made this code OO, but there didn't seem like a lot of point.
 * 2011 Andy White (arcwhite@arcwhite.org)
 */
define("MYSQL_HOST", "localhost");
define("MYSQL_DB", 	 "pollenizer_test");
define("MYSQL_USER", "pollenizer_test");
define("MYSQL_PASS", "password");

define("EMAIL_FROM_ADDR", "admin@test.com");
define("EMAIL_FROM_NAME", "Admin User");

define("SMTP_SERVER", 	"mail.test.com");
define("SMTP_USER", 	"admin");
define("SMTP_PASSWORD", "password");

require("rb.php");
require("Swift-4.0.6/lib/swift_required.php");

// Server-side Validate

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
$user->subscribe = (isset($_POST["subscribe"]) ? 1 : 0);
$user->comments = $_POST["comments"];

$id = R::store($user);

// Now send the email

$body = "Foo";

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