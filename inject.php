<?php
include_once("handlers/db_conn.php");

$prep = $_POST["prep"] ?? false;

$sel_res = null;

if ($prep) {
    // SELECT statement
    $stmt = $conn->prepare("SELECT BookTitle FROM Book WHERE BookTitle = ? AND Genre = ?");
    $stmt->bind_param("ss", $_POST["book_title"], $_POST["genre"]);
    $stmt->execute();
    $sel_res = $stmt->get_result()->fetch_all();

    // UPDATE statement
    $up_stmt = $conn->prepare("UPDATE Book SET BookTitle = ? WHERE BookID = ? AND Genre = ?");
    $up_stmt->bind_param("", $_POST["book_title"], $_POST["book_id"], $_POST["genre"]);
    $up_stmt->execute();
    $up_res = $up_stmt->get_result()->fetch_all();
}
else {
    // elems
    $book_title = $_POST["book_title"];
    $genre = $_POST["genre"];
    $book_id = $_POST["book_id"];

    // SELECT statement
    $sel_res = mysqli_query($conn,"SELECT BookTitle FROM Book WHERE BookTitle = $book_title AND Genre = $genre");

    // UPDATE statement
    $up_res = mysqli_query($conn,"UPDATE Book SET BookTitle = $book_title WHERE BookID = $book_id AND Genre = $genre");
}

?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
  <div class="container">
    <form method="POST">
        <label>
        Injectable?
        <input name="prep" checkbox/>
        </label>
    </form>

    <!--retrieve all books matching-->
    <h1>SELECT Form</h1>
    <form method="POST">
        <input name="book_title" placeholder="Enter a title..."/>
        <input name="genre" placeholder="Enter a genre"/>
        <button type="submit">Submit</button>
    </form>
    <?php if ($sel_res != null): ?>
    <?php endif; ?>

    <!--update user fines-->
    <h1>UPDATE Form</h1>
    <form method="POST">
        <input name="book_title" placeholder="Enter a title..."/>
        <input name="genre" placeholder="Enter a genre..."/>
        <input name="book_id" placeholder="Enter a book id..."/>
        <button type="submit">Submit</button>
    </form>
    <?php if ($up_res != null): ?>
    <?php endif; ?>

  </div>
</body>
</html>
