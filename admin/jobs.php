<?php
// Include the database connection
include(__DIR__ . '/../config/db.php'); // Connect to DB

// Fetch jobs using MySQLi
$result = $conn->query("SELECT * FROM jobs");

// Initialize an empty array for jobs
$jobs = [];
if ($result && $result->num_rows > 0) {
  // Loop through the results and store each row in the jobs array
  while ($row = $result->fetch_assoc()) {
    $jobs[] = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('partials/header.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Include the Navbar and Sidebar -->
  <?php include('partials/navbar.php'); ?>
  <?php include('partials/sidebar.php'); ?>

  <!-- Main Content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Job Listings</h1>
    </section>
    
    <section class="content">
      <!-- Job Table -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Location</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Loop through the $jobs array and display each job -->
          <?php foreach ($jobs as $job): ?>
          <tr>
            <td><?= $job['id'] ?></td>
            <td><?= htmlspecialchars($job['title']) ?></td>
            <td><?= htmlspecialchars($job['location']) ?></td>
            <td>
              <!-- Edit and Delete Links -->
              <a href="edit-job.php?id=<?= $job['id'] ?>">Edit</a> | 
              <a href="delete-job.php?id=<?= $job['id'] ?>">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </div>

  <!-- Include the Footer -->
  <?php include('partials/footer.php'); ?>
</div>
</body>
</html>
