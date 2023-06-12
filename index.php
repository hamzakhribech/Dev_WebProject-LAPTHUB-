 <?php
  require_once('db_connect.php');

  // Start session
  session_start();

  if (!$conn) {
    // Connection failed, return an error message
    echo "Error: Unable to connect to the database.";
    exit;
  }

  $id = $_GET['id'] ?? $_SESSION['id'] ?? 0;

  if ($id != 0) {
    $sql = "SELECT full_name, img, email FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
      // Query failed, output error message
      $error_message = mysqli_error($conn);
      echo "Query failed: " . $error_message;
    } else {
      $row = mysqli_fetch_assoc($result);
      $name = $row['full_name'];
      $img = $row['img'] ?? 0;
      $email = $row['email'];

      // Set session variables
      $_SESSION['id'] = $id ?? 0;
      $_SESSION['name'] = $name ?? 0;
      $_SESSION['img'] = $img ?? 0;
      $_SESSION['email'] = $email ?? 0;
      $id = $_SESSION['id'];
      $name = $_SESSION['name'];
      $img = "login/" . $_SESSION['img'];
      $email = $_SESSION['email'];
      $login = 1;
    }
  } else {
    if ($id) {
      // User is logged in
      $login = 1;
      $logout = 0;
      $img = "login/" . $_SESSION['img'];
      $id = $_SESSION['id'];
      $name = $_SESSION['name'];
      $img = "login/" . $_SESSION['img'];
      $email = $_SESSION['email'];
      // Access other session variables like $_SESSION['name'], $_SESSION['img'], $_SESSION['email'] if needed
    } else {
      // User is not logged in
      $login = NULL;
      $logout = 1;
    }
  }
  //////////////////////////////////////////////////////////////////////////////

  $laptopsid = $_GET['ids'] ?? 0;
  $laptopsnumber = $_GET['count'] ?? 0;

  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="./css/style.css?v=500" />
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://kit.fontawesome.com/adc42a005e.js" crossorigin="anonymous"></script>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Quicksand&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Quicksand&family=Titillium+Web:ital,wght@1,300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Abel&family=Oxygen&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="Assets/logicon.png" type="image/x" />
   <title>LAPTHUB</title>
 </head>

 <body>

   <div class="loader"></div>
   <div class="navcontainer">
     <nav class="nav1">
       <img src="Assets/logo1.png" alt="">
     </nav>
     <div class="nav2">
       <ul>
         <li id="active"><a href='index.php'>Filter </a></li>
         <li> <a href='blog_page/blog.php'>Blog</a> </li>
         <li> <a href='aboutus/about.php'>About us</a></li>
       </ul>
     </div>
     <div class="nav3">
       <ul>
         <?php
          if ($login != 0) {
            echo " <div class='profilrcontr dropdown'><img src='$img' ></div>
            <i style='transform: translateX(-30px) scale(0.8); color: rgb(4, 108, 157); cursor: pointer;' class='fa-solid fa-caret-down dropdwon'></i>
        ";
          } else {
            echo " <li  class='active' ><a href='login/login.php'>Sign In</a></li>
            <li style='padding: 6px;' class='contus'><a href='aboutus/about.php#builders'>Contact us</a></li>";
          } ?>
       </ul>
     </div>

     <div id="hamburger-menu">
       <!-- <i  style=" color: rgb(4, 108, 157); cursor: pointer;"class="fa-solid fa-caret-down drp drpi"></i>
    <div style="height: 40px;width: 40px;  color: rgb(4, 108, 157); cursor: pointer;"class="profilrcontr drp "><img src="Assets/backimg1.jpg" alt=""></div> -->
       <i class="fa-solid fa-bars fa-2xl"></i>

     </div>
   </div>
   <div class="dropdown-content">
     <i style="position: absolute;left:90%;top:-8px; color:rgb(4, 147, 225);font-size: 12px;" class="fa fa-caret-up"></i>
     <ul class="containerprf">
       <?php
        if ($login != 0) {
          echo "
           <div class='profilrcontr2'><img src=$img > </div>
           <div class='infosp'>
             <h3>  $name </h3>
             <p>  $email </p>
             
           </div>";
        };
        ?>
     </ul>
     <hr />
     <ul class="containerprf2">
       <li><a href=' login/profileedit.php?id=<?php echo $id ?>'><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
       </li>
       <li><a href="#"><i class="fa-solid fa-envelope"></i> Messages</a></li>
       <li> <a href="favoris.php"><i class="fa-solid fa-heart"></i> Favorites</a></li>
       <li><a href="aboutus/about.php"><i class="fa-solid fa-address-card"></i>About us</a></li>
       <li><a href="aboutus/about.php#builders"><i class="fa-solid fa-address-book"></i>Contact us</a></li>
       <li> <a href="login/login.php"><i class="fa-solid fa-gear"></i> Change Account</a></li>
       <li> <a href='login/logout.php'><i class="fa-solid fa-power-off"></i>Log out</a></li>
     </ul>
   </div>
   <div style="display: none;" id="sidebar-menu">
     <i id="sidbaroff" class="fa-solid fa-bars-staggered fa-2xl" style="cursor: pointer;position: absolute; right:10px; top:25px; color: #056e98;"></i>
     <ul>
       <div class="dropdown-contentside">
         <i style="position: absolute;left:90%;top:-8px; color:rgb(4, 147, 225);font-size: 12px;" class="fa fa-caret-up"></i>
         <ul class="containerprfside">
           <!-- <button id="s"  class="actives">Sign In</button>
       <button id="cr" class="actives">Creat acount</button> -->
           <?php
            if (isset($login)) {
              echo "
           <div class='profilrcontrside'><img src=$img> </div>
           <div class='infospside'>
             <h2> $name</h2>
             <p>  $email </p>
             
           </div>";
            } else {
              echo "<img style='transform:scale(0.6);' src='Assets/logo1.png' >
               </div>";
            }
            ?>
         </ul>
         <hr style="color:rgb(197, 196, 196)" />

         <?php
          if (isset($login)) {
            echo "
          <ul class='containerprfliside'>
          <li><a href='login/profileedit.php?id=" . $id . "'><i class='fa-solid fa-user-pen'></i> Edit Profileo</a></li>
           <li><a href='#'><i class='fa-solid fa-envelope'></i> Messages</a></li>
           <li><a href='favoris.php'><i class='fa-solid fa-heart'></i> Favorites</a></li>
           <li> <a href='#'><i class='fa-solid fa-gear'></i> Settings</a></li>
           <li> <a href='login/logout.php'><i class='fa-solid fa-power-off'></i>Log out</a></li>
           </ul>";
          } else {
            echo "
            <ul>
           <li><a id='s'  class='actives' href='login/login.php'><i class='fa-solid fa-right-to-bracket'></i>Sign In</a></li>
           <li><a id='cr' class='actives' href='login/signup.html'><i class='fa-solid fa-circle-plus'></i>Creat acount</a></li>
           
            </ul>";
          }
          ?>
         <ul>

           <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
           <li><a href="index.php#section"><i class="fa-solid fa-laptop"></i></i></a>Filter</li>
           <li><a href="blog_page/blog.php"><i class="fa-solid fa-book"></i></a>Blog</li>
           <li><a href="aboutus/about.php"><i class="fa-solid fa-address-card"></i></a>About us</li>
           <li><a href="aboutus/about.php#builders"><i class="fa-solid fa-address-book"></i></a>Contact us</li>
         </ul>

       </div>

     </ul>
   </div>

   <div class="backimg">
     <div class="txt">
       <h1>Discover the perfect PC </h1>
       <h2>for your needs with our easy-to-use performance filtering tools.</h2>
       <!-- <button  >Get Started</button> -->
     </div>
     <img src="Assets/backimgpng-2.png" alt="">
     <div class="imgcontainer">

     </div>

   </div>

   <section style='height:<?php echo ($laptopsnumber / 3) * 280 + 800 ?>px;' id="result">
     <div class="search">
       <div class="searchbox">
         <ul>
           <li class="brand" id="nonselected">Brand <i id=""></i></li>
           <li class="cpu" id="nonselected">CPU <i id=""></i></li>
           <li class="ram" id="nonselected">RAM <i id=""></i></li>
           <li class="memory" id="nonselected">Memory <i id=""></i></li>
           <li class="display" id="nonselected">Display <i id=""></i></li>
           <li class="resolution" id="nonselected">Resolution <i id=""></i></li>
           <button class="buttongo">GO</button>
         </ul>

       </div>
     </div>
     <div class="menu" id="brand">
       <i class="fa fa-caret-up"></i>
       <p>You can do multiple choices</p>
       <form action="process.php" method="post">
         <ul>
           <?php
            $sql = "SELECT DISTINCT brand FROM laptops";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><input style='visibility:hidden;' type='checkbox' name='brand[]' value='" . $row["brand"] . "' >" . $row["brand"] . "<i class='fa-solid fa-check'></i></li>";
              }
            } else {
              echo "0 results";
            }
            ?>

         </ul>

     </div>
     <div class="menu" id="cpu">
       <i class="fa fa-caret-up"></i>
       <p>You can do multiple choices</p>
       <form action="process.php" method="post">
         <ul>
           <?php

            $sql = "SELECT DISTINCT SUBSTRING_INDEX(full_cpu_name, '-', 1) AS first_item FROM laptops ORDER BY first_item ASC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><input style='visibility:hidden;' type='checkbox' name='cpu[]' value='" . $row["first_item"]  . "' >" . $row["first_item"]  . "<i class='fa-solid fa-check'></i></li>";
              }
            } else {
              echo "0 results";
            }
            ?>

         </ul>
     </div>

     <div class="menu" id="ram">
       <i class="fa fa-caret-up"></i>
       <p>You can do multuple choices</p>
       <ul>
         <li><input style='visibility:hidden;' type="checkbox" name="ram[]" value="2GO">2GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="ram[]" value="4GO">4GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="ram[]" value="8GO">8GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="ram[]" value="12GO">12GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="ram[]" value="16GO">16GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="ram[]" value="32GO">32GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="ram[]" value="64GO">64GO<i class="fa-solid fa-check"></i></li>

       </ul>
     </div>
     <div class="menu" id="memory">
       <i class="fa fa-caret-up"></i>
       <p>You can do multuple choices</p>
       <ul>
         <li><input style='visibility:hidden;' type="checkbox" name="memory[]" value="128GO">128GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="memory[]" value="256GO">256GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="memory[]" value="512GO">512GO<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="memory[]" value="1TB">1TB<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="memory[]" value="2TB">2TB<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="memory[]" value="4TB">4TB<i class="fa-solid fa-check"></i></li>
         <li><input style='visibility:hidden;' type="checkbox" name="memory[]" value="8TB">8TB<i class="fa-solid fa-check"></i></li>
     </div>
     <div class="menu" id="display">
       <i class="fa fa-caret-up"></i>
       <p>You can do multuple choices</p>
       <ul>
         <?php
          // require_once('db_connect.php');
          $sql = "SELECT DISTINCT  display_size  FROM laptops ORDER BY display_size ASC";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<li><input style='visibility:hidden;' type='checkbox' name='display[]' value='" . $row["display_size"]  . "' >" . $row["display_size"]  . " inch<i class='fa-solid fa-check'></i></li>";
            }
          } else {
            echo "0 results";
          }
          ?>
       </ul>
     </div>
     <div class="menu" id="resolution">
       <i class="fa fa-caret-up"></i>
       <p>You can do multuple choices</p>
       <ul>
         <?php
          // require_once('db_connect.php');
          $sql = "SELECT DISTINCT  SUBSTRING_INDEX(display_resolution, ',', 1) AS first_item FROM laptops ORDER BY first_item ASC";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<li><input  style='visibility:hidden;' type='checkbox' name='resolution[]' value='" . $row["first_item"]  . "' >" . $row["first_item"]  . "<i class='fa-solid fa-check'></i></li>";
            }
          } else {
            echo "0 results";
          }
          ?>


       </ul>
       </form>
     </div>
     <div id="buttongoid"><button id="GO" class="buttongo">GO</button></div>
     <div <?php if ($laptopsid != 0) {
            echo "style='visibility:visible'";
          } else {
            echo "style='visibility:hidden'";
          } ?> class="resultnumber">
       <p><?php echo "" . $laptopsnumber . ""; ?> laptops availbale for you</p>
     </div>
     <div <?php if ($laptopsid != 0) {
            echo "style='visibility:visible'";
          } else {
            echo "style='visibility:hidden'";
          } ?> class="filter">
       <div class="filterbox">
         <div>
           <h4>Type</h4>
           <ul>
             <li><i id=""></i>touch screen</li>
             <li><i id=""></i>convertible</li>
           </ul>
         </div>
         <div>
           <h4>
             <hr />use for
           </h4>
           <ul>
             <li><i id="" class=""></i>Gaming</li>
             <li><i id="" class=""></i>Graphic design</li>
             <li><i id="" class=""></i>Programing</li>
             <li><i id="" class=""></i>3D works</li>
           </ul>
         </div>
         <div>
           <h4>
             <hr />price
           </h4>
           <ul>
             <li><i id="" class=""></i>
               < 500$</li>
             <li><i id="" class=""></i>
               < 1000$</li>
             <li><i id="" class=""></i> > 1000$</li>
           </ul>
         </div>
         <div>
           <h4>
             <hr />use for
           </h4>
           <ul>
             <li><i id="" class=""></i>Gaming</li>
             <li><i id="" class=""></i>Graphic design</li>
             <li><i id="" class=""></i>Programing</li>
             <li><i id="" class=""></i>3D works</li>
           </ul>
         </div>
       </div>
     </div>
     <div <?php if ($laptopsid != 0) {
            echo "style='visibility:visible;'";
          } else {
            echo "style='visibility:hidden;'";
          } ?> class="result">
       <div class="resultcontainer">


         <?php
          $sql = "SELECT * FROM laptops WHERE id IN (" . $laptopsid . ") ";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $sql2 = "SELECT * FROM favorite_laptops WHERE laptop_id=" . $row['id'] . " AND user_id=$id";
                $fav = mysqli_query($conn, $sql2);
                echo "<div class='resultbox'>";
                echo "<div class='imgcontainer'>";
                if ($login != 0) {

                  if ($fav && mysqli_num_rows($fav) > 0) {

                    echo "<p id='icon'><a href='favcheck.php?id=" . $row['id'] . "&userid=" . $_SESSION['id'] . "'><i style='color:red;'class='fa-classic fa-solid fa-heart' id='checked'></i></a></p>";
                  } else {


                    echo "<p id='icon'><a href='favcheck.php?id=" . $row['id'] . "&userid=" . $_SESSION['id'] . "'><i class='fa-classic fa-regular fa-heart' id='nonchecked'></i></a></p>";
                  }
                } else {
                  echo "<p id='icon'><i class='fa-classic fa-regular fa-heart' id='nonchecked'></i></href=></p>";
                }

                echo "<p id='brand'>" . $row['brand'] . "</p>";
                $sqlimg = "SELECT * FROM images WHERE pcid=" . $row['id'] . " AND order_img=1";
                $imgresult = mysqli_query($conn, $sqlimg);

                if ($imgresult) {
                  if (mysqli_num_rows($imgresult) > 0) {
                    while ($rowm = mysqli_fetch_assoc($imgresult)) {
                      echo "<img src='" . $rowm['url_img'] . "' alt=''>";
                    }
                  }
                } else {
                }

                echo "</div>";
                echo "<div class='infos'>";

                echo "<p  style='   white-space: nowrap; width:200px;overflow: hidden; text-overflow: ellipsis;'>" . $row['full_name'] . "</p>";
                echo "<p><i class='fa-sharp fa-solid fa-dollar-sign' style='margin-right:2px; font-size: 18px;'></i>" . $row['minimum_price'] . "</p>";
                echo "</div>";
                echo "<div class='options'>";
                echo "<p>";
                echo "<i class='fa-solid fa-star'></i>";
                echo "<i class='fa-solid fa-star'></i>";
                echo "<i class='fa-solid fa-star'></i>";
                echo "<i class='fa-regular fa-star'></i>";
                echo "<i class='fa-regular fa-star'></i>";
                echo "</p>";
                echo "<button><a href='product.php?id=" . $row['id'] . "'>More Details</a></button>";
                echo "</div>";
                echo "</div>";
              }
            } else {
              echo "0 results";
            }
          }
          ?>
       </div>
     </div>

   </section>
   <!--footer-->
   <footer>
     <div class="cols-container">
       <div class="footer-col">
         <h3 class="menu-title">CONTENT</h3>
         <li><a href="index.php">Filter</a></li>
         <li><a href="../blog_page/blog.php">Blog</a></li>
         <li><a href="../favoris.php">Wishlist</a></li>
       </div>
       <div class="footer-col">
         <h3 class="menu-title">INFORMATION</h3>
         <li><a href="../aboutus/about.php">About Us</a></li>
         <li><a href="../aboutus/about.php#builders">Our Team</a></li>
         <li><a href="../aboutus/about.php#mission">Our Mission</a></li>
       </div>
       <div class="column">
         <div style="  width:250px;" class="footer-col">
           <h3 class="menu-title">DID U KNOW?</h3>
           <li><a href="../blog_page/blog.php#p0">CPU</a></li>
           <li><a href="../blog_page/blog.php#p1">Gaming laptops</a></li>
           <li><a href="../blog_page/blog.php#p2">Programing laptops</a></li>
           <li><a href="../blog_page/blog.php3p3">Designers Laptops</a></li>
           <li><a href="../blog_page/blog.php#p4">More...</a></li>
         </div>

         <div style="  width:250px;" class="footer-col">
           <h3 class="menu-title">ASSISTANCE</h3>
           <li><a href="../login/signup.html">SIGN UP</a></li>
           <li><a href="../login/login.php">LOG IN</a></li>
           <li><a href="../login/profileedit.php">Edit Profile</a></li>
         </div>
       </div>
       <div class="footer-col soc">
         <h3>SOCIAL MEDIA</h3>
         <div class="social-links">
           <a href="#" class="fa fa-facebook"></a>
           <a href="#" class="fa fa-linkedin"></a>
           <a href="#" class="fa fa-youtube"></a>
           <a href="#" class="fa fa-reddit"></a>
         </div>
         <br>
         <p>Sign up to get more news and to tell us about you experience in our website </p>
         <button class="sign-up"><a href="../login/signup.html">Sign up</a></button>
       </div>
     </div>
     <hr class="my-line">
     <div id="copyright">
       <a href="#"><img src="./assets/logo1.png" alt=""></a>
       <p>© 2023 All rights reserved</p>
     </div>
   </footer>
 </body>
 <script src="javascript/main2.js?v=1"></script>

 </html>