<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM wishlist WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Item removed from wishlist!');
            window.location.href = 'view_wishlist.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
