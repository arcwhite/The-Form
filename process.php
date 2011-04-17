<?php

define("MYSQL_HOST", "localhost");
define("MYSQL_DB", "pollenizer_test");
define("MYSQL_USER", "pollenizer_test");
define("MYSQL_PASS", "password");

require("rb.php");

// Activate RedBean
R::setup("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB, MYSQL_USER, MYSQL_PASS);

// Server-side Validate

// Store data
$user = R::dispense("user");
$user->name = $_POST["name"];
$user->address = $_POST["address"];
$user->email = $_POST["email"];
$user->subscribe = (isset($_POST["subscribe"]) ? 1 : 0);
$user->comments = $_POST["comments"];

$id = R::store($user);
// Now send the email

header("Location: index.php");

?>