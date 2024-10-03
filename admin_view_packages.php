<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Packages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="navbar">
        <a href="admin_view_packages.php">View Packages</a>
        <a href="add_package.php">Add New Package</a>
    </div>

    <div class="container">
        <h1>Manage Hotel Packages</h1>
        <table>
            <tr>
                <th>Hotel Name</th>
                <th>Package Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM packages");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['hotel_name']."</td>";
                echo "<td>".$row['package_name']."</td>";
                echo "<td>".$row['description']."</td>";
                echo "<td>$".$row['price']."</td>";
                echo "<td><img src='images/".$row['image']."'></td>";
                echo "<td>
                        <a class='action-btn' href='update_package.php?id=".$row['id']."'>Update</a>
                        <a class='action-btn delete-btn' href='delete_package.php?id=".$row['id']."'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
