<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            width: 90%;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .card img {
            max-width: 100%;
            border-radius: 10px;
            height: 200px;
            object-fit: cover;
        }

        .card h2 {
            color: #333;
        }

        .card p {
            color: #777;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .card a:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="view_packages.php">View Packages</a>
        <a href="view_wishlist.php">Your Wishlist</a>
    </div>

    <div class="container">
        <?php
        $customer_id = 1;  // Assuming a logged-in customer
        $result = mysqli_query($conn, "SELECT * FROM wishlist INNER JOIN packages ON wishlist.package_id = packages.id WHERE wishlist.customer_id = '$customer_id'");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>";
            echo "<img src='images/".$row['image']."' alt='Package Image'>";
            echo "<h2>".$row['package_name']."</h2>";
            echo "<p>".$row['description']."</p>";
            echo "<p>Price: $".$row['price']."</p>";
            echo "<a href='delete_wishlist.php?id=".$row['id']."'>Remove from Wishlist</a>";
            echo "</div>";
        }
        ?>
    </div>
 
</body>
</html>
