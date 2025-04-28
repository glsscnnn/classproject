<?php
include_once("../db_conn.php");

$user_id = $_POST["user_id"];
$user_fname = $_POST["user_fname"];
$user_mname = $_POST["user_mname"];
$user_lname = $_POST["user_lname"];

$stmt = $conn->prepare("UPDATE User SET UserLibraryID = ?, UserFName = ?, UserMNAme = ?, UserLName = ?");
$stmt->bind_param("ssss", $user_id, $user_fname, $user_mname, $user_lname);
$stmt->execute();

header("Location: ../../pages/update_user_page.php");
exit();
?>