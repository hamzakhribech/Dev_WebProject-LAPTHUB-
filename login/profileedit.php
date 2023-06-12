<?php
require_once('../db_connect.php');
if (!$conn) {
  // Connection failed, return an error message
  echo "Error: Unable to connect to database.";
  exit;
}
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$img = $_SESSION['img'];
$email = $_SESSION['email'];
// $user_id = $_GET['id'];
// $sql = "SELECT * FROM tbl_user WHERE full_name = '$user_id'";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// if ($row) {
//   $name = $row['name'];
//   $img = $row['img'];
//   $email = $row['email'];
//   $password = $row['passwordy'];
//   echo "success";
// } else {
//   // User does not exist, return error
//   echo "error";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/adc42a005e.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../Assets/logicon.png" type="image/x" />
  <title>LAPTHUB</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    background-color: #ffffff;
    overflow: hidden;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
    align-content: center;
    height: 900px;

  }

  .backcont {
    background-image: linear-gradient(to bottom right, #0961a9, #a4a4a4);
    width: 100%;
    height: 100%;
  }

  .backgroundimg {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -100;
    object-fit: cover;
    position: absolute;
    filter: blur(2px);
  }

  h2 {
    position: relative;
    bottom: 590px;
    transform: translateX(5px);
    font-size: 1.2rem;
    color: #ffffffbb;
  }

  .container {

    background-color: #ffffff;
    width: 40%;
    min-width: 500px;
    height: 930px;
    position: absolute;
    border-radius: 10px;
    padding: 40px 45px;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.185);
  }

  /* .container::after {
    content: '';
    position: absolute;
    background-image: linear-gradient(to bottom right, #0519f97e, #32c1fe);
    width: 850px;
    height: 850px;
    border-radius: 50%;
    z-index: -1;
  } */

  .container-close {
    position: absolute;
    top: -15px;
    right: -15px;
    background-color: #fff;
    width: 45px;
    height: 45px;
    display: grid;
    place-items: center;
    font-size: 1.7rem;
    color: #2E4052;
    border-radius: 50%;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.164);
    cursor: pointer;
  }




  .container-text {
    width: 65%;

  }

  p {
    font-size: 14px;
    color: #3B4169;
    margin: 10px 0;
  }

  input {
    width: 100%;
    border: none;
    padding: 14px;
    border-radius: 3px;

  }

  button {
    width: 100%;
    border: none;
    padding: 14px;

    border-radius: 10px;

  }

  input:not(.this) {
    border: 2px solid #DADDEC;
    margin: 5px 0 10px;
    background-color: #d7d7d75a;
    font-size: 1rem;
    color: #3a3a3a;
    transition: .4s;
  }

  input:not(.this):hover {
    background-color: #ffffff7e;

  }

  .display {
    border-radius: 10px;
    padding: 10px;
    height: 47px;
    text-decoration: none;
    text-align: center;
    position: relative;
    top: 25px;
    background-image: linear-gradient(to right, #89caff99, rgb(2, 162, 255), #89caff99);
    display: block;
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 5px 20px #89caff94;
    /* transition: all 5s ease-in-out; */
  }

  button {
    background-image: linear-gradient(to right, #89caff99, rgb(2, 162, 255), #89caff99);
    display: block;
    color: #fff;
    position: relative;
    top: 20px;
    z-index: 0;
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 5px 20px #89caff94;

  }

  button:hover,
  .display:hover {
    /* box-shadow: none; */
    background-image: linear-gradient(to right, #4eaefc, rgb(2, 162, 255));

  }

  span {
    display: block;
    text-align: center;
    margin: 40px 0 0;
    color: #BABDCB;
    font-size: 12px;
  }

  footer p {
    position: relative;
    bottom: -10px;
    transform: translateX(9px);
    color: #DADDEC;
    /* transform: translateX(2px); */
  }

  .profilrcontrside {
    position: relative;
    width: 90px;
    height: 90px;
    border-radius: 100%;
    border: 2px solid #7facc7;
    overflow: hidden;
  }

  .profilrcontrside img {
    position: absolute;
    width: 90px;
    height: 90px;
    object-fit: cover;
  }

  .infospside {
    font-family: 'Trebuchet MS', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
    flex-direction: column;
    margin-bottom: 6px;
  }
</style>

<body>
  <div class="backcont">
    <!-- <img class="backgroundimg" src="../Assets/pexels-cottonbro-studio-6892723.jpg"></img> -->

  </div>
  <div class="container">
    <div class="profilrcontrside">
      <?php
      echo "
        <img src='$img'> </div>
       <div class='infospside'>
       
       <h3>$name</h3>
       <p>$email</p>";
      ?>
      <!-- <button >Edit profile</button> -->
    </div>
    <form action="updateprofil.php" method="post" enctype="multipart/form-data">
      <input name="id" type="hidden" value='<?php echo $id ?>'>
      <label for="">Full Name</label>
      <input type="text" name="name" value='<?php echo $name ?>' />
      <label for="">Email</label>
      <input type="email" name="email" value='<?php echo $email ?>' />
      <label>Password</label>
      <input value='<?php echo $password ?>' type="password" name="password" />
      <!-- <datalist id="cellules">
            <option value="Design"></option>
            <option value="Photography"></option>
            <option value="Montage"></option>
            <option value="Pilotage"></option>
            <option value="..."></option>
          </datalist> -->

      <label for="file-input" style="
              font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS',
                sans-serif;
            ">Download your profile image:
      </label>
      <!-- <i style="transform: scale(1.5)translate(-112px,15px); position: absolute;"class="fa-solid fa-download"></i> -->
      <input class="this" type="file" name="img" style="
            filter:opacity(20);
            cursor: pointer;
              height: 40px;
              width: 200px;
              position: relative;
              /* background-color: rgb(251, 0, 0); */
              bottom: 0px;
              right: 10px;
              border: none;
              z-index: 2;
            " />
      <!-- <p style="position: absolute; transform: translate(10px,-19px); font-size: 10px;">click here</p> -->
      <button type="submit" class="send" name="submit" value="upload" required>
        <i class="fa-solid fa-"></i>
        Done
      </button>
      <a class="display" href="../index.php?id=<?php echo "$id"; ?>">
        <i class="fa-solid fa-home"></i>
        Home</a>
    </form>

    <!-- <img src="files/to_hide_it.png"
                style="height:40px;width:40px; position:relative;bottom: 12px;left:px; z-index:3;" alt="image">
            -->
    <!-- <span>ALL eyes on us</span> -->
  </div>
  </div>

  <footer>
    <!-- <p>Copyright © 2023 Hamza Khribech Reporters</p> -->
  </footer>
</body>

</html>