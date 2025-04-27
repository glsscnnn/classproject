<?php
session_start();
include_once("../handlers/db_conn.php");
if ($_SESSION["user_type"] != "admin") {
  header("Location: ../index.php");
  exit();
}

$fine_query = mysqli_real_escape_string($conn, "SELECT * FROM Fines;");
$fines = mysqli_query($conn, $fine_query)->fetch_all();
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
<div class="container">
  <h1>Update Fines Page</h1>

  <!--ADD FINE FORM-->
  <h2>Add Fine:</h2>
  <form action="../handlers/admin_actions/handle_add_fine.php" method="POST">
    <fieldset>
      <label>
        FineID
        <input
         name="fine_id"
         placeholder="Enter a Fine ID..."
        />
      </label>
      <label>
        UserLibraryID
        <input
         name="user_id"
         placeholder="Enter a User ID..."
        />
      </label>
      <label>
        Book ID
        <input
         name="book_id"
         placeholder="Enter a Book ID..."
        />
      </label>
      <label>
        Amount ($)
        <input
         name="amount"
         placeholder="Enter an Amount..."
        />
      </label>
      <button type="submit">Submit</button>
    </fieldset>
  </form>

  <!--UPDATE ACTIVE FINES-->
  <h2>Active Fines:</h2>
  <?php foreach($fines as $fine): ?>
    <article class="card">
      <strong>Fine ID</strong> <?= htmlspecialchars($fine[0]); ?>
      <strong>For User</strong> <?= htmlspecialchars($fine[1]); ?>
      <form action="../handlers/admin_actions/handle_update_fine.php" method="POST">
        <fieldset>
          <input type="hidden" name="fine_id" value="<?= htmlspecialchars($fine[0]); ?>" />
          <label>
            Amount ($):
            <input
             name="amount"
             placeholder="<?= htmlspecialchars($fine[3]); ?>"
            />
          </label>
        </fieldset>
      </form>
    </article>
  <?php endforeach?>
</div>
</body>
</html>
