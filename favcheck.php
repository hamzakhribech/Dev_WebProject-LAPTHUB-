<?php
require_once('db_connect.php');

$id = $_GET['id'];
$userid = $_GET['userid'];

// Check if the favorite entry already exists
$sqlCheck = "SELECT id FROM favorite_laptops WHERE laptop_id = ? AND user_id = ?";
$stmtCheck = mysqli_prepare($conn, $sqlCheck);
mysqli_stmt_bind_param($stmtCheck, "ii", $id, $userid);
mysqli_stmt_execute($stmtCheck);
$resultCheck = mysqli_stmt_get_result($stmtCheck);

if (mysqli_num_rows($resultCheck) > 0) {
    // Entry already exists, remove it
    $sqlDelete = "DELETE FROM favorite_laptops WHERE laptop_id = ? AND user_id = ?";
    $stmtDelete = mysqli_prepare($conn, $sqlDelete);
    mysqli_stmt_bind_param($stmtDelete, "ii", $id, $userid);
    if (mysqli_stmt_execute($stmtDelete)) {
        // echo "Laptop removed from favorites.";
    } else {
        echo "Error removing laptop from favorites: " . mysqli_error($conn);
    }
} else {
    // Entry doesn't exist, insert it
    $sqlInsert = "INSERT INTO favorite_laptops (laptop_id, user_id) VALUES (?, ?)";
    $stmtInsert = mysqli_prepare($conn, $sqlInsert);
    mysqli_stmt_bind_param($stmtInsert, "ii", $id, $userid);
    if (mysqli_stmt_execute($stmtInsert)) {
        // echo "Laptop added to favorites.";
    } else {
        echo "Error adding laptop to favorites: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
echo '<script>window.history.back();</script>';
exit;
