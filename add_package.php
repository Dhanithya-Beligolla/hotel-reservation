<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel Package</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #imageInputWrapper {
            position: relative;
            width: 100%; /* Set the width to 100% to make it fit the container */
        }

        #imageInput {
            width: 100%; /* Make the input fit the width of the container */
            box-sizing: border-box; /* Ensure padding and borders are included in the width */
            padding-right: 40px; /* Adjust padding to make space for the X button */
        }

        #clearImageButton {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #f44336;
            font-size: 18px;
            cursor: pointer;
            outline: none;
            display: none;
        }

        #clearImageButton:hover {
            color: #d32f2f;
        }

        #imagePreviewContainer {
            display: none;
            margin-top: 15px;
        }

        #imagePreview {
            width: 200px;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="admin_view_packages.php">View Packages</a>
        <a href="add_package.php">Add New Package</a>
    </div>

    <div class="container">
        <h1>Add Hotel Package</h1>
        <form action="insert_package.php" method="post" enctype="multipart/form-data">
            <label>Hotel Name:</label>
            <input type="text" name="hotel_name" required>

            <label>Package Name:</label>
            <input type="text" name="package_name" required>

            <label>Description:</label>
            <textarea name="description" required></textarea>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" required>

            <label>Image:</label><br>

            <!-- Input wrapper with file input and clear button -->
            <div id="imageInputWrapper">
                <input type="file" name="image" id="imageInput" accept="image/*" onchange="previewImage(event)" required>
                <button type="button" id="clearImageButton" onclick="removeImage()">✕</button>
            </div>
            <br><br>

            <!-- Image preview and delete option -->
            <div id="imagePreviewContainer">
                <img id="imagePreview" src="#" alt="Image Preview"><br>
            </div>
            <br>

            <button type="submit">Add Package</button>
        </form>
    </div>

    <script>
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
