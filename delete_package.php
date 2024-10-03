
<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM packages WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Package deleted successfully!');
            window.location.href = 'admin_view_packages.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
