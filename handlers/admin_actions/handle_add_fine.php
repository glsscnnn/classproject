<?php
include_once("../db_conn.php");

$fine_id = $_POST["fine_id"];
$user_id = $_POST["user_id"];
$book_id = $_POST["book_id"];
$amount = $_POST["amount"];

$insert_fine = mysqli_real_escape_string($conn, "INSERT INTO Fines VALUES ($fine_id, $user_id, $book_id, $amount);");
$res = mysqli_query($conn, $insert_fine);

header("Location: ../../pages/update_fines_page.php");
exit();
?>