<?php
session_start();
include_once("db_conn.php");

// Retreive the user details from the request
$user_id = $_POST["user_id"];
$password = $_POST["password"];

$_SESSION["user_id"] = $user_id;

$login_query = mysqli_real_escape_string($conn, "SELECT UserLibraryID FROM User WHERE UserLibraryID=$user_id;");
$result = mysqli_query($conn, $login_query);

// If the user doesn't exist in the database then return to login page
if ($result->fetch_all() == []) {
  // DEBUG echo "Invalid Username or Password";
  header("Location: ../index.php");
  exit();
}

$user_type_query = mysqli_real_escape_string($conn, "SELECT UserLibraryID FROM Staff WHERE UserLibraryID=$user_id;");
$result = mysqli_query($conn, $user_type_query);

// Handle user type
if ($result->fetch_all() != []) {
  $_SESSION["user_type"] = "admin"; // TODO this is definitely a security venerability
  header("Location: ../pages/catalog_page.php");
  exit();
}
else {
  $_SESSION["user_type"] = "patron";
  header("Location: ../pages/catalog_page.php");
  exit();
}
?>
