<?php
include 'db.php';

$package_id = $_GET['id'];
$customer_id = 1;  // Assuming a logged-in customer

$sql = "INSERT INTO wishlist (package_id, customer_id) VALUES ('$package_id', '$customer_id')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Product successfully added to wishlist!');
            window.location.href = 'view_wishlist.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
