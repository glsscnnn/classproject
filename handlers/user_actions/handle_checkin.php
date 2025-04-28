<?php
session_start();
include_once("../db_conn.php");

$user_id = $_SESSION["user_id"];
$book_id = $_POST["book_id"];

// execute statement
$stmt = $conn->prepare("DELETE FROM Checkouts WHERE UserLibraryID = ? AND BookID = ?");
$stmt->bind_param("ii", $user_id, $book_id);
$stmt->execute();

// redirect back to where we came from
header("Location: ../../pages/search_results_page.php");
exit();
?>