<?php
// Assuming you have established a database connection
require_once('../db_connect.php');
if (!$conn) {
    // Connection failed, return an error message
    echo "Error: Unable to connect to database.";
    exit;
}
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve user input from the form
  $id = $_POST['id'];
    echo "$id <br/>";
  $name = $_POST['name']??0;
    echo "$name <br/>";

  $email = $_POST['email']??0;
    echo "$email <br/>";

  $password = $_POST['password']??0;
    echo $password;

  $img = $_POST['img']??0;
    echo "the image by post $img <br/>";
    if ($img==0) {
        $img_name = $_FILES['img']['name'];
        $img_size = $_FILES['img']['size'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $error = $_FILES['img']['error'];
        if ($error === 0) {
            if ($img_size > 12500000000000000) {
                $em = "Error: File too large.";
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array(
                    "jpg",
                    "jpeg",
                    "png"
                );
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'users_profile/' . $new_img_name;
                
                    if (move_uploaded_file($tmp_name, $img_upload_path)) {
                        $img = $img_upload_path;
                        echo "uploades img: $img";

                               
                        } else {
                        echo "img not uploaded";
                    }
                }
            }
        }
    }else{
        $img = 0;
    }
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    // Add more fields as necessary


    // Check if the user made any changes, otherwise keep the existing data
    $name = $name !== 0 ? $name : $row['full_name'];
    $email = $email !== 0 ? $email : $row['email'];
    $password = $password !== 0 ? $password : $row['Passwordy'];
    echo "before cond:$img <br/>";
     if($img==0){
      $img = $row['img'];
      }

    // $img = $img !== 0 ? $img :  $row['img'];
            echo "finel insert img:$img <br/>";


        // Add more fields as necessary

        // Update the user information in the database
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
       $_SESSION['img']=$img;
        $_SESSION['email']= $email;
            $updateQuery = "UPDATE users SET full_name='$name', email='$email',img='$img',passwordy='$password' WHERE id=$id";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
      // Redirect the user to the profile page or show a success message
      header("Location: ../index.php");
      echo "finel insert img:$img";

                // exit();
            } else {
                // Handle the update error
                echo "Error updating user information: " . mysqli_error($conn);
            }
        } 




    }
    

  // Retrieve the existing data from the database
  
  // Close the database connection
//   mysqli_close($connection);

