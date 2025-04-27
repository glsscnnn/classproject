<?php
include_once("../db_conn.php");

// Book schema
$book_id = $_POST["book_id"];
$title = $_POST["title"];
$author = $_POST["author"];
$genre = $_POST["genre"];
$location_id = $_POST["location_id"];
$isbn = $_POST["isbn"];

// Prepared statement for update
$stmt = $conn->prepare(
    "UPDATE Book 
    SET BookTitle = ?, Author = ?, Genre = ?, LocationID = ?, ISBN = ? 
    WHERE BookID = ?"
);
$stmt->bind_param("ssssii", 
$title,
$author,
$genre,
$location_id,
$isbn,
$book_id
);
$stmt->execute();

header("Location: ../../pages/catalog_page.php");
exit();
?>