<?php
include(__DIR__ . '/../config/db.php'); // Connect to DB

// Fetch messages ordered by latest
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<?php include('partials/header.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include('partials/navbar.php'); ?>
  <?php include('partials/sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Contact Form Messages</h1>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Sent At</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['Name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['subject']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                <td><?= $row['created_at'] ?></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <?php include('partials/footer.php'); ?>

</div>
</body>
</html>
