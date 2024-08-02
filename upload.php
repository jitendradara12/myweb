<?php
// Configuration
$upload_dir = 'uploads/'; // Directory to store uploaded images

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get file information
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];

        // Validate file type (adjust allowed types as needed)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($type, $allowed_types)) {
            echo 'Invalid file type.';
            exit;
        }

        // Generate a unique filename to prevent overwrites
        $filename = uniqid() . '_' . $name;
        $target_file = $upload_dir . $filename;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($tmp_name, $target_file)) {
            echo 'File uploaded successfully!';
            // You can add code here to display the uploaded image or save it to a database
        } else {
            echo 'Error uploading file.';
        }
    } else {
        echo 'Please select an image to upload.';
    }
}
```
```

## Explanation of upload.php

- **Configuration:**
  - Sets the `$upload_dir` variable to specify the directory where uploaded images will be stored.

- **Form Submission Check:**
  - Checks if the form was submitted using the `POST` method.

- **File Upload Check:**
  - Checks if a file was uploaded and if there were no upload errors.

- **File Information:**
  - Extracts information about the uploaded file (temporary name, original name, size, and type).

- **File Type Validation:**
  - Validates the file type to ensure it's an allowed image format (adjust `$allowed_types` as needed).

- **Unique Filename:**
  - Generates a unique filename using `uniqid()` to avoid overwrites.

- **File Move:**
  - Attempts to move the uploaded file to the specified directory using `move_uploaded_file()`.

- **Success/Error Messages:**
  - Displays appropriate messages based on the upload result.

**Note:**
- This script provides basic functionality. You should implement additional error handling, security measures, and image processing as needed.
- Consider using a more robust image validation library or function to improve security.
- For production environments, it's recommended to use prepared statements and parameterized queries to prevent SQL injection vulnerabilities if you're storing image information in a database.

**Remember:**

- Replace `'uploads/'` with the actual path to your desired upload directory.
- Adjust `$allowed_types` to match the image formats you want to allow.
- Implement error handling to provide informative messages to the user.
- Consider additional security measures like file size limits and input sanitization.
