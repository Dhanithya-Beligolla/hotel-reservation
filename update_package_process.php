<?php
include 'db.php';

$id = $_GET['id'];
$hotel_name = $_POST['hotel_name'];
$package_name = $_POST['package_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['image']['name'];

if ($image) {
    // If a new image is uploaded, update the image
    $target = "images/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $sql = "UPDATE packages SET hotel_name='$hotel_name', package_name='$package_name', description='$description', price='$price', image='$image' WHERE id='$id'";
} else {
    // If no new image is uploaded, don't update the image
    $sql = "UPDATE packages SET hotel_name='$hotel_name', package_name='$package_name', description='$description', price='$price' WHERE id='$id'";
}

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Package updated successfully!');
            window.location.href = 'admin_view_packages.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
 
