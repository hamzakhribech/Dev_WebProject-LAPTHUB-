<?php
// Assuming you have established a database connection
require_once('db_connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve values from $_POST
    $pcid = $_POST['pcid'];
    $comment = $_POST['comment'];
    $user = $_POST['user'];

    
    // Perform any necessary validations or sanitization on the values
    
    // Insert values into the database table
    
    $sql = "INSERT INTO reviews (pcid, comment,ownerid) VALUES ('$pcid', '$comment','$user')";
    
    if (mysqli_query($conn, $sql)) {
        echo '<script>window.history.go(-1);</script>';
    } else {
        echo "Error inserting review: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
