<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotel_name = $_POST['hotel_name'];
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO packages (hotel_name, package_name, description, price, image)
                VALUES ('$hotel_name', '$package_name', '$description', '$price', '$image')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Package added successfully!');
                    window.location.href = 'admin_view_packages.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image!";
    }
}
    
?>
