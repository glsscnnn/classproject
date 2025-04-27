<?php
session_start();
$user_type = $_SESSION["user_type"];
if ($user_type != "admin") {
  header("Location: ../index.php");
  exit();
}
include_once("../handlers/db_conn.php");

$book_id = $_GET["id"];
$book_query = mysqli_real_escape_string($conn, "SELECT * FROM Book WHERE BookID=$book_id;");
$book = mysqli_query($conn, $book_query)->fetch_row();
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<div class="container">
  <h1>Update Book Page</h1>
  Handling book with ID: <?= htmlspecialchars($book[0]); ?>
  <form action="../handlers/admin_actions/handle_update_book.php" method="POST">
    <fieldset>
      <input type="hidden" name="book_id" value="<?= htmlspecialchars($book[0]); ?>"/>
      <label>
        Book Title
        <input
         name="title"
         value="<?= htmlspecialchars($book[1])?>"
        />
      </label>
      <label>
        Author
        <input
         name="author"
         value="<?= htmlspecialchars($book[2])?>"
        />
      </label>
      <label>
        Genre
        <input
         name="genre"
         value="<?= htmlspecialchars($book[3])?>"
        />
      </label>
      <label>
        Location ID
        <input
         name="location_id"
         value="<?= htmlspecialchars($book[4])?>"
        />
      </label>
      <label>
        ISBN
        <input
         name="isbn"
         value="<?= htmlspecialchars($book[5])?>"
        />
      </label>
      <button type="submit">Submit</button>
    </fieldset>
  </form>
</div>
</body>
</html>
