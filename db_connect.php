
<!-- ///////////////use it in connect page//////////require_once('db_connect.php'); -->
<?php
$servername = "localhost";
$username = "root";
$password = "hamza";
$dbname = "dev_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//////////////////////
// $sql = "SELECT * FROM members";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     while($row = mysqli_fetch_assoc($result)) {
      
//         echo "<div class='member-info'>";
//          echo "<div class='infos'>";
//          echo "<div> <h2> name  :</h2>";
//         echo "<p>" . $row["name"] . "</p></div>";
//         echo "<div><h2> Birthday  :</h2>";
//         echo "<p> " . $row["birthday"] . "</p></div>";
//         echo "<div><h2> cellule  :</h2>";
//         echo "<p> " . $row["cellule"] . "</p></div>";
//         echo "</div>";
//         echo "<div class='img-container'><Img src=" . $row["img_url"] . " alt='image' </img></div>";
//         echo "</div>";
       
//     }
// } else {
//     echo "0 results";
// }

// mysqli_close($conn);
// ?>