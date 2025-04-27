<?php
include_once("../db_conn.php");

// Amount and ID of the Fine
$amount = $_POST["amount"];
$fine_id = $_POST["fine_id"];

// Using prepared statements here for fun
$stmt = $conn->prepare("UPDATE Fines SET Amount = ? WHERE FineID = ?");
$stmt->bind_param("di", $amount, $fine_id);
$stmt->execute();

header("Location: ../../pages/catalog_page.php");
exit();
?>