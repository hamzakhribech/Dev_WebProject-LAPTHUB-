<?php
require_once('db_connect.php');

// Start session
session_start();

if (!$conn) {
  // Connection failed, return an error message
  echo "Error: Unable to connect to the database.";
  exit;
}


$pcid = $_GET['id'];
// Set session variables
$id = $_SESSION['id'] ?? 0;


if ($id != 0) {
  // User is logged in
  $name = $_SESSION['name'];
  $img = "login/" . $_SESSION['img'];
  $email = $_SESSION['email'];
  $login = $_SESSION['id'];
  $logout = 0;

  // Access other session variables like $_SESSION['name'], $_SESSION['img'], $_SESSION['email'] if needed
} else {
  // User is not logged in
  $login = NULL;
  $logout = 1;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css?v=100" />
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
  <link rel="stylesheet" href="pstyle.css?v=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@100&display=swap" rel="stylesheet">
  <!-- To add a fav icon  -->
  <link rel="shortcut icon" href="Assets/logicon.png" type="image/x" />
  <title>LAPTHUB</title>

</head>

<body>
  <!-- <div class="backblur"></div> -->
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
          echo
          " <li  class='active' ><a href='login/login.php'>Sign In</a></li>
            <li style='padding: 6px;' class='contus'><a href='aboutus/about.php#builders'>Contact us</a></li>";        } ?>
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
      <li><a href='login/profileedit.php?id=<?php echo $id ?>'><i class="fa-solid fa-user-pen"></i> Edit Profile</a></li>
      <li><a href="#"><i class="fa-solid fa-envelope"></i> Messages</a></li>
      <li> <a href="favoris.php"><i class="fa-solid fa-heart"></i> Favorites</a></li>
      <li><a href="#"><i class="fa-solid fa-address-card"></i>About us</a></li>
      <li><a href="#"><i class="fa-solid fa-address-book"></i>Contact us</a></li>
      <li> <a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
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
           <li> <a href='#'><i class='fa-solid fa-power-off'></i>Log out</a></li>
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

          <li><a href="#"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="#"><i class="fa-solid fa-laptop"></i></i></a>Filter</li>
          <li><a href="#"><i class="fa-solid fa-book"></i></a>Blog</li>
          <li><a href="#"><i class="fa-solid fa-address-card"></i></a>About us</li>
          <li><a href="#"><i class="fa-solid fa-address-book"></i></a>Contact us</li>
        </ul>

      </div>

    </ul>
  </div>


  <div class="main">
    <div class="container">
      <div class="product-div">
        <div class="product-div-left">
          <div class="img-container">
            <?php
            $sql = "SELECT * FROM laptops WHERE id =$pcid";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $sqlimg = "SELECT * FROM images WHERE pcid=" . $row['id'] . " AND order_img=1";
                  $imgresult = mysqli_query($conn, $sqlimg);

                  if ($imgresult) {
                    if (mysqli_num_rows($imgresult) > 0) {
                      while ($rowm = mysqli_fetch_assoc($imgresult)) {
                        echo "
                    <img src='" . $rowm['url_img'] . "' alt=' laptop image1' />
                     </div>";
                        // echo "<img src='" . $rowm['url_img'] . "' alt=''>";
                      }
                    }
                  } else {
                  }
                  echo "
          <div class='hover-container'>";
                  $sqlimg2 = "SELECT * FROM images WHERE pcid=" . $row['id'];
                  $imgresult2 = mysqli_query($conn, $sqlimg2);

                  if ($imgresult2) {
                    if (mysqli_num_rows($imgresult2) > 0) {
                      while ($rowm2 = mysqli_fetch_assoc($imgresult2)) {
                        echo "   <div>
                          <img src='" . $rowm2['url_img'] . "'alt=' laptop image' />
                       </div>";
                      }
                    }
                  } else {
                  }
                  echo "
        
          </div>
        </div>
       
         <div class='product-div-right'>
          <span style='text-align:center;'class='product-name'>" . $row['full_name'] . " </span>
          <span class='product-price'> 5151 <i style='color:rgb(2, 162, 255);'class='fa-sharp fa-solid fa-dollar-sign'></i> </span>
          <div class='product-rating'>
            <span> <i style='color:#f9ac1c' class='fas fa-star'></i> </span>
            <span><i style='color:#f9ac1c' class='fas fa-star'></i></i></span>
            <span><i style='color:#f9ac1c' class='fas fa-star'></i></span>
            <span><i style='color:#f9ac1c' class='fas fa-star'></i></i></span>
            <span><i style='color:#f9ac1c' class='fas fa-star-half-alt'></i></i></span>
            <span>(250 ratings)</span>

          </div>
          <h3>Product Description :</h3>
          <p>" . $row['description'] . "</p>
          <ul>
            <li><span><i class='fa fa-microchip' style='color: #70a5ff;'></i> CPU:<p style='display:inline'>" . $row['cpu_level'] . " </p></span>
            </li>
            <li><span><i class='fa-solid fa-display' style='color: #70a5ff;'></i> Display:  <p style='display:inline'>" . $row['display_resolution'] . "(" . $row['display_size'] . " inch)</p> </span></li>
            <li><span><i class='fa-solid fa-memory' style='color: #70a5ff;'></i> RAM:<p style='display:inline'>" . $row['ram_type'] . "(" . $row['available_ram_sizes'] . " )</p></span>
            </li>
            ";
                  if ($row['double_gpu'] != 0) {
                    echo "
            <li><span><i class='fas fa-microchip' style='color: #70a5ff;'></i> External GPU:<p style='display:inline'>" . $row['gpu_external'] . "(VRAM:" . $row['gpu_external_vram'] . " )</p></span></li>
           ";
                  }
                  echo "
            <li><span><i class='fas fa-microchip' style='color: #70a5ff;'></i> Internal GPU:<p style='display:inline'>" . $row['gpu_internal_name'] . "</p></span></li>

            <li><span><i class='fa-solid fa-circle-check' style='color: #70a5ff;'></i> Use: <p style='display:inline'>" . $row['good_for'] . "</p></span></li>
            <li><span><i class='fa-solid fa-database' style='color: #70a5ff;'></i> Storage Capacity: <p style='display:inline'>" . $row['available_storage_capacity'] . "</p></span></li>
            <li><span><i class='fa-solid fa-brush' style='color: #70a5ff;'></i> Available colors: <p style='display:inline'>  " . $row['available_colors'] . "</p></span></li>
            <li><span><i class='fa-brands fa-windows' style='color: #70a5ff;'></i> Operating System: <p style='display:inline'>  " . $row['operating_system'] . "</p></span></li>




           
          </ul>
        </div>

      </div>
    </div>
  </div>
  </div> ";
                }
              }
            }
            ?>
            <!-- ------------------------------------------------------------------COMMENT SECTION -------------------------------------------------------------- -->
            <section class="comment" id="comments">
              <div class="comment-section">
                <H2>ADD a Review</H2>
                <form action="review.php" method="post" enctype="multipart/form-data">
                  <textarea name="comment" placeholder="Add Your Comment" required></textarea>
                  <div id="rating-stars" style="display: none;">
                    <span class="star" data-rating="1">&#9733;</span>
                    <span class="star" data-rating="2">&#9733;</span>
                    <span class="star" data-rating="3">&#9733;</span>
                    <span class="star" data-rating="4">&#9733;</span>
                    <span class="star" data-rating="5">&#9733;</span>
                  </div>
                  <div class="btn">
                    <input name="pcid" type="hidden" value="<?php echo "$pcid"; ?>">
                    <input name="user" type="hidden" value="<?php echo "$id"; ?>">
                    <?php if ($id != 0) {
                      echo "  <input type='submit' value='Submit'>
                      <button id='clear'>Cancel</button>";
                    } else {
                      echo "<a></a><div class='input'>Submit</div>
                    <button id='clear'>Cancel</button>
                    <a style='display:inline; font-size:15px; ' href='login/login.php'> Sign In First</a>
                      ";
                    }
                    ?>


                  </div>
                </form>
              </div>
            </section>
            <!-- ------------------------------------------------------------------REVIEWS -------------------------------------------------------------- -->
            <!--Testimonials------------------->
            <section id="testimonials">
              <!--heading--->
              <div class="testimonial-heading">
                <span>REVIEWS</span>
                <h1>Clients Says</h1>
              </div>
              <!--testimonials-box-container------>
              <div class="testimonial-box-container">

                <?php
                $sql = "SELECT * FROM reviews WHERE pcid = $pcid";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                      echo '  <div class="testimonial-box">';
                      echo '<div class="box-top">';
                      echo '  <div class="profile">';
                      echo '    <div class="profile-img">';
                      $sqlimg2 = "SELECT * FROM users WHERE id=" . $row['ownerid'];
                      $imgresult2 = mysqli_query($conn, $sqlimg2);

                      if ($imgresult2) {
                        if (mysqli_num_rows($imgresult2) > 0) {
                          while ($rowm2 = mysqli_fetch_assoc($imgresult2)) {
                            echo '      <img src="login/' . $rowm2['img'] . '" />';
                            echo '    </div>';
                            echo '    <div class="name-user">';
                            echo '      <strong>' . $rowm2['full_name'] . '</strong>';
                            echo '      <span>' . $rowm2['email'] . '</span>';
                          }
                        }
                      } else {
                      }
                      echo '      <span>';
                      echo '        <p id="comment-date">' . $row['created_at'] . '</p>';
                      echo '      </span>';
                      echo '    </div>';
                      echo '  </div>';
                      echo '  <div class="reviews">';
                      echo '    <i class="fas fa-star"></i>';
                      echo '    <i class="fas fa-star"></i>';
                      echo '    <i class="fas fa-star"></i>';
                      echo '    <i class="fas fa-star"></i>';
                      echo '    <i class="far fa-star"></i>';
                      echo '  </div>';
                      echo '</div>';
                      echo '<div class="client-comment">';
                      echo '  <p>' . $row['comment'] . '</p>';
                      echo '</div>';
                      echo '</div>';
                    }
                  } else {
                  }
                } else {
                  echo "Error fetching reviews: " . mysqli_error($conn);
                } ?>
                <!--top------------------------->

           
            </section>
            <!--footer-->
            <footer>
              <div class="cols-container">
                <div class="footer-col">
                  <h3 class="menu-title">CONTENT</h3>
                  <li><a href="index.php">Filter</a></li>
                  <li><a href="blog_page/blog.php">Blog</a></li>
                  <li><a href="favoris.php">Wishlist</a></li>
                </div>
                <div class="footer-col">
                  <h3 class="menu-title">INFORMATION</h3>
                  <li><a href="aboutus/about.php">About Us</a></li>
                  <li><a href="aboutus/about.php#builders">Our Team</a></li>
                  <li><a href="aboutus/about.php#mission">Our Mission</a></li>
                </div>
                <div class="column">
                  <div style="  width:250px;" class="footer-col">
                    <h3 class="menu-title">DID U KNOW?</h3>
                    <li><a href="blog_page/blog.php#p0">CPU</a></li>
                    <li><a href="blog_page/blog.php#p1">Gaming laptops</a></li>
                    <li><a href="blog_page/blog.php#p2">Programing laptops</a></li>
                    <li><a href="blog_page/blog.php3p3">Designers Laptops</a></li>
                    <li><a href="blog_page/blog.php#p4">More...</a></li>
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
<script src="script.js"></script>

</html>