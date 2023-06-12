
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "hamza";
    $dbname = "dev_project";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Error: Failed to connect to the database. " . mysqli_connect_error());
    }
    session_start();
    if (isset($_POST['submit'])) {

        $img_name = $_FILES['img']['name'];
        $img_size = $_FILES['img']['size'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $error = $_FILES['img']['error'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        // $idedit = $_GET['id'];
    
        if ($error === 0) {
            if ($img_size > 12500000000000000) {
                $em = "Error: File too large.";
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'users_profile/' . $new_img_name;
                    if (move_uploaded_file($tmp_name, $img_upload_path)) {

                        $sql2 = "SELECT id FROM users WHERE full_name = '$name'";
                        $query = "SELECT * FROM users WHERE full_name='$name'";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            if (isset($row2)) {

                                $id = $row2['id'];
                                    $_SESSION['id'] = $id;
                                    $_SESSION['name'] = $name;
                                    $_SESSION['img'] = $img_upload_path;
                                    $_SESSION['email'] = $email;
                                    header("Location: ../index.php");
                                
                            }
                        } else {
                            $sql = "INSERT INTO users (full_name, email, Passwordy,img)
                            VALUES ('$name', '$email', '$password','$img_upload_path')";
                            if (mysqli_query($conn, $sql)) {
                                echo "New record created successfully.";
                                $result2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                if (isset($row2)) {
                                    $id = $row2['id'];
                                    $_SESSION['id'] = $id;
                                    $_SESSION['name'] = $name;
                                    $_SESSION['img'] = $img_upload_path;
                                    $_SESSION['email'] = $email;
                                    header("Location: ../index.php");

                                }
                            }
                        }
                    } else {
                        $em = "Error: Failed to upload file. Error code: " . $error;
                        echo ($em);
                    }
                } else {
                    $em = "Error: Invalid file type. Only JPG, JPEG, and PNG files are allowed.";
                    echo ($em);
                }

            }

        } else {
            echo ($error);

        }
    }

    ?>