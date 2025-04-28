<?php
session_start();
include_once("../db_conn.php");

$user_id = $_SESSION["user_id"];
$amount = $_POST["amount"];
$fine_id = $_POST["fine_id"];

$stmt = $conn->prepare("UPDATE Fines SET Amount = ? WHERE UserLibraryID = ? AND FineID = ?");
$stmt->bind_param("dii", $amount, $user_id, $fine_id);
$stmt->execute();

header("Location: ../../pages/pay_fines_page.php");
exit();
?>