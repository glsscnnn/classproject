<?php
session_start();
include_once("../handlers/db_conn.php");
if ($_SESSION["user_type"] != "patron") {
  header("Location: ../index.php");
  exit();
}
$user_id = $_SESSION["user_id"];

$get_assoc_fines_query = mysqli_real_escape_string($conn, "SELECT * FROM Fines WHERE UserLibraryID = $user_id;");
$fines = mysqli_query($conn, $get_assoc_fines_query)->fetch_all();
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
  <div class="container">
    <h1>Pay Fines Page</h1>
    <?php foreach($fines as $fine): ?>
      <article>
        <strong>Book ID </strong><?= htmlspecialchars($fine[2]); ?>
        <form action="../handlers/user_actions/handle_user_fines.php" method="POST">
          <fieldset>
            <label>
              Pay Amount ($)
              <input
               name="amount"
               placeholder="<?= htmlspecialchars($fine[3]); ?>"
              />
            </label>
            <button type="submit">Submit</button>
          </fieldset>
        </form>
      </article>
    <?php endforeach; ?>
  </div>
</body>
</html>
