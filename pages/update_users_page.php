<?php
session_start();
include_once("../handlers/db_conn.php");
if ($_SESSION["user_type"] != "admin") {
  header("Location: ../index.php");
  exit();
}

$users_query = mysqli_real_escape_string($conn, "SELECT * FROM User");
$users = mysqli_query($conn, $users_query)->fetch_all();
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<div class="container">
  <h1>Update Users Page</h1>
  <?php foreach($users as $user): ?>
  <article>
  <form action="../handlers/admin_actions/handle_update_users.php" method="POST">
    <fieldset>
      <label>
        UserLibraryID
        <input name="user_id" value="<?= htmlspecialchars($user[0]); ?>"/>
      </label>
      <label>
        UserFName
        <input name="user_fname" value="<?= htmlspecialchars($user[1] ?? ""); ?>"/>
      </label>
      <label>
        UserMName
        <input name="user_mname" value="<?= htmlspecialchars($user[2] ?? ""); ?>"/>
      </label>
      <label>
        UserLName
        <input name="user_lname" value="<?= htmlspecialchars($user[3] ?? ""); ?>"/>
      </label>
      <button type="submit">Submit</button>
    </fieldset>
  </form>
  </article>
  <?php endforeach; ?>
</div>
</body>
</html>
