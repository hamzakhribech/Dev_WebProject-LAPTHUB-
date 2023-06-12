 <?php
    require_once('db_connect.php');

    // Start session
    session_start();

    if (!$conn) {
        // Connection failed, return an error message
        echo "Error: Unable to connect to the database.";
        exit;
    }



    // Set session variables
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $img = "login/" . $_SESSION['img'];
    $email = $_SESSION['email'];

    if (isset($_SESSION['id'])) {
        // User is logged in
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
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="./css/style.css" />
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
 <style>
     body {
         width: 100%;
     }

     * {
         padding: 0;
         margin: 0;
     }

     section {
         box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
         display: flex;
         flex-direction: column;
         height: 1000px;
         justify-content: start;
         align-content: center;
     }

     section>p {
         text-align: center;
         height: 20px;
         font-family: 'Quicksand', sans-serif;
         font-size: 30px;
         width: 100%;
     }

     .result {
         padding-top: 50px;
         width: 105%;
         visibility: visible;
         display: flex;
         justify-content: center;
     }

     .resultcontainer {
         width: 80%;
         visibility: visible;
         display: flex;
         flex-flow: wrap row;
         column-gap: 10px;
         row-gap: 10px;
         justify-content: center;
         align-content: center;
     }

     .resultbox {
         transform: scale(1);
     }
 </style>

 <body>
     <!-- <div class="backblur"></div> -->
     <div class="navcontainer">
         <nav class="nav1">
             <img src="Assets/logo1.png" alt="">
         </nav>
         <div class="nav2">
             <ul>
                 <li id="activeimg"><a>Filter </a></li>
                 <li><a>Blog</a> </li>
                 <li><a>About us</a></li>
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
            <li style='padding: 6px;' class='contus'><a href='aboutus/about.php#builders'>Contact us</a></li>";                    } ?>
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
             <li><a href='login/profileedit.php?id=$id'><i class="fa-solid fa-user-pen"></i> Edit Profile</a></li>
             <li><a href="#"><i class="fa-solid fa-envelope"></i> Messages</a></li>
             <li> <a href='favoris.php'><i class="fa-solid fa-heart"></i> Favorites</a></li>
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

     <section>
         <p>Favorites</p>

         <div class="result">
             <div class="resultcontainer">

                 <?php
                    $sql = "SELECT * FROM laptops AS l
                    INNER JOIN favorite_laptops AS f ON l.id = f.laptop_id
                     WHERE f.user_id = $id";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='resultbox'>";
                                echo "<div class='imgcontainer'>";
                                echo "<p id='icon'><a href='favcheck.php?id=" . $row['laptop_id'] . "&userid=" . $id . "'><i style='color:red;'class='fa-classic fa-solid fa-heart' id='checked'></i></a></p>";
                                echo "<p id='brand'>" . $row['brand'] . "</p>";
                                $sqlimg = "SELECT * FROM images WHERE pcid=" . $row['laptop_id'] . " AND order_img=1";
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
                                echo "<button><a href='product.php?id=" . $row['laptop_id'] . "'>More Details</a></button>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "0 results";
                        }
                    } else {
                        echo "0 results";
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
                     <li><a href="login/signup.html">SIGN UP</a></li>
                     <li><a href="login/login.php">LOG IN</a></li>
                     <li><a href="login/profileedit.php">Edit Profile</a></li>
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
 <script src="javascript/main2.js"></script>

 </html>