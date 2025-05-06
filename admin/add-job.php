<?php include('../config/db.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $location = $conn->real_escape_string($_POST['location']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO jobs (title, location, description)
            VALUES ('$title', '$location', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: jobs.php?msg=Job added successfully");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<?php include('partials/header.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('partials/navbar.php'); ?>
    <?php include('partials/sidebar.php'); ?>

    <div class="content-wrapper">
        <section class="content-header"><h1>Add Job</h1></section>
        <section class="content">
            <form method="POST">
                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Job</button>
            </form>
        </section>
    </div>

    <?php include('partials/footer.php'); ?>
</div>
</body>
</html>
