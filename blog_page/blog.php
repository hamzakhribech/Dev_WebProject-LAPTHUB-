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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styleb2.css" />
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
  <title>Document</title>
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
        <li id="active"> <a href='blog/blog_page.php'>Blog</a> </li>
        <li><a href='../aboutus/about.php'>About us</a></li>
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
            <li style='padding: 6px;' class='contus'><a href='../aboutus/about.php#builders'>Contact us</a></li>";        } ?>
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
  <div class="backimg">
    <div class="txt">
      <h1>Discover the perfect PC </h1>
      <h2>Simplify your laptop buying journey with our comprehensive domain-specific guides.</h2>
      <!-- <button  >Get Started</button> -->
    </div>
    <img src="Assets/didyoupng.png" alt="">
    <div class="imgcontainer">

    </div>

  </div>
  <section id="blog-container">
    <div class="post" id="p0">
      <img class="img0" src="./Assets/letters.jpg" alt="INFORMATION">
    </div>
    <div class="blogs">
      <h3>Understanding the Basics: Exploring the Letters in CPU</h3>
      <p>When it comes to understanding CPUs, it's essential to familiarize yourself with the various letters that are
        commonly used. Each letter represents a different aspect or feature of the CPU architecture, and having a good
        grasp of these letters can greatly enhance your knowledge and proficiency in working with computers. The letters
        used in the model names often denote specific characteristics or features of the CPU. Here are some commonly
        used letters and their meanings in CPU model names:

      </p>
      <a href="post0.html">Read More</a>
    </div>
    <div class="post " id="p1">
      <img class="img1" src="./Assets/img1.jpg" alt="gaming">
    </div>
    <div class="blogs">
      <h3>Game On: Top Features and Specs to Look for When Choosing a Gaming Laptop</h3>
      <p>When choosing a gaming laptop, there are several key features and specifications you should consider to ensure
        a smooth gaming experience. Here are the top features and specs to look for:

        When choosing a gaming laptop, there are several key features and specifications you should consider to ensure a
        smooth gaming experience. Here are the top features and specs to look for:

        Graphics Processing Unit (GPU): The GPU is crucial for gaming performance. Look for a laptop with a dedicated
        graphics card, such as NVIDIA GeForce or AMD Radeon, with sufficient VRAM (Video RAM) for smooth rendering of
        graphics-intensive games.

        Processor: A powerful processor is important for gaming. Aim for a laptop with a quad-core or higher processor,
        such as an Intel Core i5 or i7, or an AMD Ryzen processor. Higher clock speeds and more cores result in better
        performance.</p>
      <a href="post.html">Read More</a>
    </div>
    <div class="post " id="p2">
      <img class="img2" src="./Assets/dev1.jpg" alt="Developpement">
    </div>
    <div class="blogs">
      <h3>Maximizing Productivity: Essential Features to Look for in Laptops for Programmers</h3>
      <p>When choosing a laptop for programming, there are several essential features that can maximize productivity and
        enhance the coding experience. Here are the key features to look for:

        Processor:
        Look for a laptop with a powerful multi-core processor, such as an Intel Core i7 or AMD Ryzen 7. Higher clock
        speeds and more cores allow for faster code compilation and execution.

        RAM:
        Aim for at least 16GB of RAM to handle the memory requirements of modern development tools and multiple running
        applications. More RAM can help with smooth multitasking and handling large codebases.</p>
      <a href="post2.html">Read More</a>
    </div>
    <div class="post " id="p3">
      <img class="img3" src="./Assets/img3.jpg" alt="design">
    </div>
    <div class="blogs">

      <h3>The Ultimate Laptop Guide for Designers: Features and Specs You Need to Know</h3>
      <p>When it comes to choosing a laptop for designers, there are several features and specifications that can
        greatly enhance the creative workflow and meet the demands of design software. Here's the ultimate laptop guide
        for designers:

        Display Quality:

        Look for a laptop with a high-resolution display for crisp and detailed visuals. Consider options like a 4K
        (3840x2160) or QHD+ (3200x1800) resolution for optimal clarity.
        A wide color gamut, such as 100% sRGB or Adobe RGB, ensures accurate color representation for design work.
        An IPS panel provides wide viewing angles and better color consistency.
        Color Accuracy:

        Ensure the laptop has color calibration capabilities or comes pre-calibrated from the factory. This helps
        maintain accurate and consistent color reproduction for design work.
        Look for laptops with Pantone validation or other color accuracy certifications.</p>
      <a href="post3.html">Read More</a>
    </div>
    <div class="post " id="p4">
      <img class="img4" src="./Assets/Data.jpg" alt="design">
    </div>
    <div class="blogs">

      <h3>Essential Characteristics of Laptops for Data Analysts: What to Look For</h3>
      <p>When choosing a laptop for data analysis, there are several essential characteristics to consider. These
        features will ensure that your laptop can handle the demands of data processing, analysis, and visualization.
        Here are the key characteristics to look for:

        Processing Power:
        Opt for a laptop with a powerful processor, such as an Intel Core i7 or AMD Ryzen 7. Higher clock speeds and
        more cores allow for faster data processing and analysis.
        Consider CPUs with support for multithreading, which can significantly improve performance when working with
        large datasets or running complex calculations.</p>
      <a href="post4.html">Read More</a>
    </div>


  </section>

  <!--footer-->
  <footer>
    <div class="cols-container">
      <div class="footer-col">
        <h3 class="menu-title">CONTENT</h3>
        <li><a href="../index.php">Filter</a></li>
        <li><a href="blog.php">Blog</a></li>
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
          <li><a href="blog.php#p0">CPU</a></li>
          <li><a href="blog.php#p1">Gaming laptops</a></li>
          <li><a href="blog.php#p2">Programing laptops</a></li>
          <li><a href="blog.php#p3">Designers Laptops</a></li>
          <li><a href="blog.php#p4">More...</a></li>
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
  <script src="../javascript/main2.js?v=1"></script>
  <script src="script.js?v=1"></script>
</body>

</html>