<?php
if (!isset($_SESSION)) {
    session_start();
}
// Include your database connection file
include '../php/koneksi.php';
$koneksi = new Connection();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // You may want to perform additional validation and security checks here
    $userId = $_SESSION['nim']; // Replace 'user_id' with your actual session variable

    // Fetch the current password from the database
    $query = "SELECT password FROM user WHERE nim = '$userId'";
    $result = mysqli_query($koneksi->koneksi, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $dbPassword = $row['password'];

        // Verify the current password
        if (password_verify($currentPassword, $dbPassword)) {
            // Hash the new password before updating the database
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $updateQuery = "UPDATE user SET password = '$hashedNewPassword' WHERE nim = '$userId'";
            $updateResult = mysqli_query($koneksi->koneksi, $updateQuery);

            if ($updateResult) {
                // Display success message using JavaScript alert and redirect to index.php
                echo '<script>alert("Password updated successfully!"); window.location.href = "../index.php";</script>';
                exit(); // Ensure that the script stops executing after the redirect
            } else {
                // Display error message using JavaScript alert
                echo '<script>alert("Error updating password: ' . mysqli_error($koneksi->koneksi) . '"); window.location.href = "../index.php?page=ubah";</script>';
            }
        } else {
            // Display error message using JavaScript alert
            echo '<script>alert("Current password is incorrect"); window.location.href = "../index.php?page=ubah";</script>';
        }
    } else {
        // Display error message using JavaScript alert
        echo '<script>alert("Error fetching current password: ' . mysqli_error($koneksi->koneksi) . '"); window.location.href = "../index.php?page=ubah";</script>';
    }

    // Close the database connection
    mysqli_close($koneksi->koneksi);
}
