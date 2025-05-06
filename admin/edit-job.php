<?php include('../config/db.php'); ?>

<?php
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $location = $conn->real_escape_string($_POST['location']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "UPDATE jobs SET title='$title', location='$location', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: jobs.php?msg=Job updated");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM jobs WHERE id=$id");
$job = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<?php include('partials/header.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('partials/navbar.php'); ?>
    <?php include('partials/sidebar.php'); ?>

    <div class="content-wrapper">
        <section class="content-header"><h1>Edit Job</h1></section>
        <section class="content">
            <form method="POST">
                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control" value="<?= $job['title'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="<?= $job['location'] ?>">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5"><?= $job['description'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-success">Update Job</button>
            </form>
        </section>
    </div>

    <?php include('partials/footer.php'); ?>
</div>
</body>
</html>
