<?php
include(__DIR__ . '/../config/db.php'); // Connect to DB
?>
<!DOCTYPE html>
<html lang="en">
<?php include(__DIR__ . '/partials/header.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php include(__DIR__ . '/partials/navbar.php'); ?>
<?php include(__DIR__ . '/partials/sidebar.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Admin Dashboard</h1>
    </section>

    <section class="content">
      <div class="row">

        <!-- Total Jobs -->
        <div class="col-lg-4 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php
                  $result = $conn->query("SELECT COUNT(*) AS total FROM jobs");
                  $data = $result->fetch_assoc();
                  echo $data['total'];
                ?>
              </h3>
              <p>Total Jobs</p>
            </div>
            <div class="icon"><i class="fas fa-briefcase"></i></div>
            <a href="jobs.php" class="small-box-footer">View Jobs <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Messages -->
        <div class="col-lg-4 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <?php
                  $result = $conn->query("SELECT COUNT(*) AS total FROM messages");
                  $data = $result->fetch_assoc();
                  echo $data['total'];
                ?>
              </h3>
              <p>Messages</p>
            </div>
            <div class="icon"><i class="fas fa-envelope"></i></div>
            <a href="messages.php" class="small-box-footer">View Messages <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Comments -->
        <div class="col-lg-4 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                <?php
                  $result = $conn->query("SELECT COUNT(*) AS total FROM comment");
                  $data = $result->fetch_assoc();
                  echo $data['total'];
                ?>
              </h3>
              <p>Comments</p>
            </div>
            <div class="icon"><i class="fas fa-comments"></i></div>
            <a href="comments.php" class="small-box-footer">View Comments <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
    </section>
  </div>

  <?php include(__DIR__ . '/partials/footer.php'); ?>
</div>
</body>
</html>
