<?php

$msg = $_GET['msg'] ?? " ";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link rel="stylesheet" href="formstyle.css" /> -->
  <link rel="shortcut icon" href="../Assets/logicon.png" type="image/x" />
  <title>LAPTHUB</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      background-color: #ffffff;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .backcont {
      width: 100%;
      height: 900px;
    }

    .backgroundimg {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: -100;
      object-fit: cover;
      position: absolute;
      filter: blur(3px);
    }

    h2 {
      position: relative;
      bottom: 590px;
      transform: translateX(5px);
      font-size: 1.2rem;
      color: #ffffffbb;
    }

    .container {
      background-color: #fffffff6;
      width: 400px;
      height: 530px;
      position: absolute;
      border-radius: 10px;
      left: 38%;
      top: 20%;
      padding: 70px 30px;
      display: flex;
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

    .img-container {
      width: 250px;
      border-radius: 5px;
      height: 500px;
      overflow: hidden;
      box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }

    .img-container img {
      border-radius: inherit;
      width: 250px;
      height: 500px;
      object-fit: fill;
      transform: scale(1.3);
      /* object-position: center; */
      transition: 0.5s ease-out
    }

    .img-container:hover img {
      transform: scale(1.1) rotate(3deg);


    }



    .container-text {
      width: 100%;
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

    form {
      display: flex;
      flex-direction: column;
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

    form h1 {
      text-align: center;
      transform: translateY(-30px);
      color: #65befa;
    }
  </style>
</head>

<body>
  <div class="backcont">
    <img class="backgroundimg" src="../Assets/formbg.jpg"></img>

  </div>
  <div class="container">
    <!-- <div class="container-close">&times;</div> -->

    <div class="container-text">
      <form action="logincheck.php" method="post" enctype="multipart/form-data">
        <h1>Welcome Back!</h1>
        <p style="position: relative;left: 20%; display: inline; font-size: 14px; color: red;"><?php echo $msg ?></p>
        <!-- <input type="text" name="name" placeholder="Type here..." required/>  -->
        <label for="">Email</label>
        <input type="email" name="email" required />
        <label for="choice your image" required>Password</label>
        <input type="password" name="password" />
        <button type="submit" class="send" name="submit" value="upload" required>
          <i class="fa-solid fa-"></i>
          LOG IN
        </button>
        <a class="display" href="signup.html">
          <i class="fa-solid fa-home"></i>
          Creat new acount</a>
      </form>
      <a href="../index.php" style="position: relative;left: 45%;bottom:-30px; display: inline; font-size: 16px; color:black;">Home</a>

    </div>
  </div>
  <footer>
    <!-- <p>Copyright © 2023 Hamza Khribech Reporters</p> -->
  </footer>
</body>

</html>