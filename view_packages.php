<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hotel Packages</title>
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
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .card a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="view_wishlist.php" class="cart-icon">🛒 Wishlist</a>
    </div>

    <div class="container">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM packages");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>";
            echo "<img src='images/".$row['image']."' alt='Package Image'>";
            echo "<h2>".$row['package_name']."</h2>";
            echo "<p>".$row['description']."</p>";
            echo "<p>Price: $".$row['price']."</p>";
            echo "<a href='add_to_wishlist.php?id=".$row['id']."'>Add to Wishlist</a>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>
