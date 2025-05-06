<?php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $sql = "DELETE FROM jobs WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: jobs.php?msg=Job deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid job ID.";
}
?>
