<?php
include 'db.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM packages WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Package</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #imagePreviewContainer {
            position: relative;
            display: inline-block;
            margin-top: 15px;
        }

        #imagePreview {
            width: 200px;
            height: auto;
            border-radius: 10px;
        }

        /* Position the "X" button at the top-right corner of the image */
        #removeCurrentImageButton {
            position: absolute;
            top: 5px;
            right: 5px;
            background: none;
            border: none;
            color: #f44336;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            outline: none;
        }

        #removeCurrentImageButton:hover {
            color: #d32f2f;
        }

        /* File input styles */
        #imageInput {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="admin_view_packages.php">View Packages</a>
        <a href="add_package.php">Add New Package</a>
    </div>

    <div class="container">
        <h1>Update Hotel Package</h1>
        <form action="update_package_process.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <label>Hotel Name:</label>
            <input type="text" name="hotel_name" value="<?php echo $row['hotel_name']; ?>" required>

            <label>Package Name:</label>
            <input type="text" name="package_name" value="<?php echo $row['package_name']; ?>" required>

            <label>Description:</label>
            <textarea name="description" required><?php echo $row['description']; ?></textarea>

            <label>Price:</label>
            <input type="number" name="price" value="<?php echo $row['price']; ?>" step="0.01" required>

            <!-- Current Image Preview with "X" Icon -->
            <label>Current Image:</label><br>
            <div id="imagePreviewContainer">
                <img id="imagePreview" src="images/<?php echo $row['image']; ?>" alt="Current Image">
                <button type="button" id="removeCurrentImageButton" onclick="removeCurrentImage()">✕</button>
            </div><br>

            <label>Upload New Image (Optional):</label>
           

            <!-- Input wrapper with file input and clear button -->
            <div id="imageInputWrapper">
                <input type="file" name="image" id="imageInput" accept="image/*" onchange="previewImage(event)" required>
                
            </div>
            <br><br>


            <button type="submit">Update Package</button>
        </form>
    </div>

    <script>
        function removeCurrentImage() {
            const previewContainer = document.getElementById('imagePreviewContainer');
            const inputFile = document.getElementById('imageInput');

            // Hide the current image preview
            previewContainer.style.display = 'none';

            // Optional: If you want to force the user to upload a new image after removing
            inputFile.required = true;
        }
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const clearButton = document.getElementById('clearImageButton');
            
            // Check if a file is selected
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                // Set the preview image when the file is loaded
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';  // Show the image preview
                    clearButton.style.display = 'inline';      // Show the clear button
                }
                
                // Read the selected file as a Data URL
                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.style.display = 'none';  // Hide the preview if no file is selected
                clearButton.style.display = 'none';       // Hide the clear button if no file is selected
            }
        }

        function removeImage() {
            const input = document.getElementById('imageInput');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const clearButton = document.getElementById('clearImageButton');

            // Reset the input field
            input.value = '';
            
            // Hide the preview and clear button
            previewContainer.style.display = 'none';
            clearButton.style.display = 'none';
        }
    </script>

</body>
</html>
