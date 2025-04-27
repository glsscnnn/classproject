<?php
session_start();
include_once("../handlers/db_conn.php");
$user_type = $_SESSION["user_type"];

if ($user_type == null) {
  header("Location: ../index.php");
  exit();
}

// Retreive books from the database
$books_query = mysqli_real_escape_string($conn, "SELECT * FROM Book;");
$books = mysqli_query($conn, $books_query)->fetch_all();

/**
 * Indicies:
 * 0 = id
 * 1 = title
 * 2 = author
 * 3 = genre
 * 4 = location id
 * 5 = isbn
 */
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
<style>
.card {
  border: 1px solid var(--muted-border-color);
  border-radius: var(--border-radius);
  padding: 1rem;
}
</style>
</head>
<body>
<?php if ($user_type == "admin"): ?>
  <div class="container">
    <h1>Library Application</h1>
    <h2>Search Results:</h2>
    <?php foreach ($books as $book): ?>
    <article class="card">
      <strong><?= htmlspecialchars($book[1]) ?></strong>
      <ul>
        <li>Author: <?= htmlspecialchars($book[2]) ?></li>
        <li>Genre: <?= htmlspecialchars($book[3]) ?></li>
        <li>Location ID: <?= htmlspecialchars($book[4]) ?></li>
        <li>ISBN: <?= htmlspecialchars($book[5]) ?></li>
      </ul>
      <a href="update_book_page.php?id=<?= urlencode($book[0])?>">
      <button>Update</button>
      </a>
    </article>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <div class="container">
    <h1>Library Application</h1>
    <h2>Search Results:</h2>
    <?php foreach ($books as $book): ?>
    <article class="card">
      <h2><?= htmlspecialchars($book[1]) ?></h2>
      <ul>
        <li>Author: <?= htmlspecialchars($book[2]) ?></li>
        <li>Genre: <?= htmlspecialchars($book[3]) ?></li>
        <li>Location ID: <?= htmlspecialchars($book[4]) ?></li>
        <li>ISBN: <?= htmlspecialchars($book[5]) ?></li>
      </ul>
      <a href="../handlers/user_actions/handle_checkout.php?id=<?= urlencode($book[0])?>">
      <button>Checkout</button>
      </a>
    </article>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
</body>
</html>

