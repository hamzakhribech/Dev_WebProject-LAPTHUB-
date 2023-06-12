<?php
require_once('../db_connect.php');

// Start session
session_start();

if (!$conn) {
    // Connection failed, return an error message
    echo "Error: Unable to connect to the database.";
    exit;
}



// Set session variables
$id = $_SESSION['id'] ?? 0;


if ($id != 0) {
    // User is logged in
    $name = $_SESSION['name'];
    $img = "../login/" . $_SESSION['img'];
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AboutUs</title>
    <link rel="stylesheet" href="stylea.css?v=100">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100&family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" />
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
    <link rel="stylesheet" href="zstyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- To add a fav icon  -->
    <link rel="shortcut icon" href="../Assets/logicon.png" type="image/x" />
    <title>LAPTHUB</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

</head>

<body>
    <!-- <div class="backblur"></div> -->
    <div class="navcontainer">
        <nav class="nav1">
            <img src="../Assets/logo1.png" alt="">
        </nav>
        <div class="nav2">
            <ul>
                <li><a href='../index.php'>Filter </a></li>
                <li> <a href='../blog_page/blog.php'>Blog</a> </li>
                <li id="active">
                    <a<a href='about.php'>About us</a>
                </li>
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
                    " <li  class='active' ><a href='../login/login.php'>Sign In</a></li>
            <li style='padding: 6px;' class='contus'><a href='about.php#builders'>Contact us</a></li>";                } ?>
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
            <li><a href=' ../login/profileedit.php?id=<?php echo $id ?>'><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
            </li>
            <li><a href="#"><i class="fa-solid fa-envelope"></i> Messages</a></li>
            <li> <a href="../favoris.php"><i class="fa-solid fa-heart"></i> Favorites</a></li>
            <li><a href="#"><i class="fa-solid fa-address-card"></i>About us</a></li>
            <li><a href="#"><i class="fa-solid fa-address-book"></i>Contact us</a></li>
            <li> <a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
            <li> <a href='../login/logout.php'><i class="fa-solid fa-power-off"></i>Log out</a></li>
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
          <li><a href='../login/profileedit.php?id=" . $id . "'><i class='fa-solid fa-user-pen'></i> Edit Profileo</a></li>
           <li><a href='#'><i class='fa-solid fa-envelope'></i> Messages</a></li>
           <li><a href='../favoris.php'><i class='fa-solid fa-heart'></i> Favorites</a></li>
           <li> <a href='#'><i class='fa-solid fa-gear'></i> Settings</a></li>
           <li> <a href='#'><i class='fa-solid fa-power-off'></i>Log out</a></li>
           </ul>";
                } else {
                    echo "
            <ul>
           <li><a id='s'  class='actives' href='../login/login.php'><i class='fa-solid fa-right-to-bracket'></i>Sign In</a></li>
           <li><a id='cr' class='actives' href='../login/signup.html'><i class='fa-solid fa-circle-plus'></i>Creat acount</a></li>
           
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
    <!--Hero-->
    <div class="all">
        <div id="page-header" class="about-header">
            <h2>Know Us</h2>
            <p>We do the research so you don't have to</p>
        </div>
        <!--Builders-->
        <div id="builders">
            <h1>Our team</h1>
            <div class="builder-box">

                <div class="profile" style="transform:translateY(-30px);">
                    <div id="imgContainer">
                        <img src="./assets/hamza.png" alt="">
                    </div>
                    <h6>Hamza KHRIBECH</h6>
                    <p>Software Engineering Student</p>
                    <div class="pro-links">
                        <a href="mailto:https://github.com/hamzakhribech" class="fa fa-google"></a>
                        <a href="https://github.com/hamzakhribech" target="_blank" class="fa fa-github"></a>
                        <a href="https://www.linkedin.com/in/hamza-khribech-ba4942212/" target="_blank" class="fa fa-linkedin"></a>

                    </div>
                </div>
                <div class="profile">
                    <div id="imgContainer">
                        <img src="./assets/img/zaim.png" alt="">
                    </div>
                    <h6>Mohamed ZAIM</h6>
                    <p>Software Engineering Student</p>
                    <div class="pro-links">
                        <a href="mailto:zaim0632@gmail.com" class="fa fa-google"></a>
                        <a href="https://github.com/MohamedZAIM4" target="_blank" class="fa fa-github"></a>
                        <a href="https://www.linkedin.com/in/mohamed-zaim-ba02a3211/" target="_blank" class="fa fa-linkedin"></a>
                    </div>
                </div>
                <div class="profile">
                    <div id="imgContainer">
                        <img src="./assets/img/usra.png" alt="">
                    </div>
                    <h6>Yousra MANSOUR</h6>
                    <p>Software Engineering Student</p>
                    <div class="pro-links">
                        <a href="mailto:yousramansour2019@gmail.com" class="fa fa-google"></a>
                        <a href="https://github.com/MANSUsra" target="_blank" class="fa fa-github"></a>
                        <a href="https://www.linkedin.com/in/yousra-mansour-2408461ba/" target="_blank" class="fa fa-linkedin"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--Our mission-->
        <div id="mission">
            <h1>Our mission</h1>
            <div class="missiondiv">
                <img src="./assets/img/pic3.jpg" alt="">
                <p>Our mission at HMY is to provide comprehensive and unbiased reviews of PCs to help students and professionals find the right computer for their needs. We understand the challenges of choosing a computer that suits your specific requirements, and we strive to simplify the process by offering detailed information on a variety of brands and models. Our goal is to empower our readers with the knowledge they need to make informed decisions, ultimately saving them time and money. We are committed to maintaining the highest standards of integrity and excellence in all aspects of our website, and we are constantly striving to improve and enhance our services for our valued readers.</p>
            </div>
        </div>
    </div>
    <!--footer-->
    <footer>
        <div class="cols-container">
            <div class="footer-col">
                <h3 class="menu-title">CONTENT</h3>
                <li><a href="../index.php">Filter</a></li>
                <li><a href="../blog_page/blog.php">Blog</a></li>
                <li><a href="../favoris.php">Wishlist</a></li>
            </div>
            <div class="footer-col">
                <h3 class="menu-title">INFORMATION</h3>
                <li><a href="about.php">About Us</a></li>
                <li><a href="about.php#builders">Our Team</a></li>
                <li><a href="about.php#mission">Our Mission</a></li>
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
            <a href="#"><img src="./assets/img/logo1.png" alt=""></a>
            <p>© 2023 All rights reserved</p>
        </div>
    </footer>
</body>
<script src="javascript/main.js></script>

</html>