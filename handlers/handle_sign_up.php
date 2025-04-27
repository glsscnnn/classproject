<?php
include_once("db_conn.php");

// Retrieve the user details from the request
$user_id = $_POST["user_id"];
$password = $_POST["password"];

// Compose sign up query
$sign_up_query = mysqli_real_escape_string($conn, "INSERT INTO User (UserLibraryID) VALUES ($user_id);");
$patron_query = mysqli_real_escape_string($conn, "INSERT INTO Patron VALUES ($user_id);");

// Gross disgusting way of handling key errors
try {
  mysqli_query($conn, $sign_up_query);
  mysqli_query($conn, $patron_query);
}
catch (Exception) {
  echo "User already exists please return to the sign up page!";
  exit();
}

// Handle response
header("Location: ../index.php");
exit();
?>
