<?php
$servername = "localhost";
$username = "root";
$password = "hamza";
$dbname = "dev_project";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Error: Failed to connect to the database. " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND Passwordy='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $name = $row['full_name'];
        $img = $row['img'] ?? 0;
        $email = $row['email'];
        // Set session variables
        $_SESSION['id'] = $row['id'] ?? 0;
        $_SESSION['name'] = $name ?? 0;
        $_SESSION['img'] = $img ?? 0;
        $_SESSION['email'] = $email ?? 0;
        $id = $row['id'];
        echo '<script>window.history.go(-2);</script>';

    } else {
        $msg = "invalid email or password";
        header("Location: login.php?msg= $msg");
    }
}

mysqli_close($conn);
