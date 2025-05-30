<?php 
// Get the form data 
$email = $_POST["email"];
$password = $_POST["password"];
$checkbox = $_POST["checkbox"] ?? "off";
// Check if the form is submitted
if(empty($email) || empty($password)) {
    echo "<script>alert('Please fill in all fields.');</script>";
} else {
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } else {
        // Validate password
        if (strlen($password) < 6) {
            echo "<script>alert('Password must be at least 6 characters long.');</script>";
        } else {
            // Show the form data 
            echo "<script>alert('Form submitted successfully!');</script>";
            echo "Email: $email<br>";
            echo "Password: $password<br>";
            echo "Checkbox: $checkbox<br>";
        }
}
}
?>