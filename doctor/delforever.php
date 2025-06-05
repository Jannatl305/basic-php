<?php 
include 'config.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $sql ="DELETE FROM dm WHERE id = $id";
    if ($conn->query($sql) === true) {
        if (file_exists("uploads/".$id.".jpg")) {
            // If the photo file exists, delete it
            unlink("uploads/".$id.".jpg");
        }
        // Redirect to index.php with a success message
        header("Location: index.php?msg=deleted-permanently");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>