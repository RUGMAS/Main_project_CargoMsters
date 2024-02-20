<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CARGO MASTER</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png"rel="icon"/>
  <link href="assets/img/apple-touch-icon.png"rel="apple-touch-icon"/>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css"rel="stylesheet"/>
  <link href="assets/vendor/aos/aos.css"rel="stylesheet"/>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/vendor(/bootstrap-icons/bootstrap-icons.css" rel="styl')?>esheet"/>
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"/>
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"/>
  <link href="assets/vendor/remixicon/remixicon.css "rel="stylesheet"/>
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"/>

  <!-- Template Main CSS File -->
  
  <link href="assets/css/style.css"rel="stylesheet"/>

  <!-- =======================================================
  * Template Name: Anyar
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
   <link rel="stylesheet" href="assets/style.css">





    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="assets/scriptnew.js" defer></script>

    <script>
       


        document.querySelector('.chatbot-trigger').addEventListener('click', function(event) {

            // Replace this alert with your actual chatbot integration code

            alert('Chatbot icon clicked! Implement your chatbot logic here.');

        });

        function openChat() {

            document.getElementById("chat-box").style.display = "block";

        }



        function closeChat() {

            document.getElementById("chat-box").style.display = "none";

        }



        function sendMessage() {

            var userInput = document.getElementById("user-input").value;

            if (userInput !== "") {

                var chatContent = document.getElementById("chat-content");

                chatContent.innerHTML += '<div class="chat-bubble user">' + userInput + '</div>';

                document.getElementById("user-input").value = "";



                // Simulate a bot response after a delay

                setTimeout(function() {

                    chatContent.innerHTML += '<div class="chat-bubble bot">I received your message: ' + userInput + '</div>';

                    chatContent.scrollTop = chatContent.scrollHeight;

                }, 1000);

            }

        }
    </script>
  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      
      
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="landing.php">CARGO MASTER</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
       <li><a class="nav-link scrollto active" href="welcome.php">Login</a></li>
        <!--   <li><a class="nav-link scrollto active" href="#hero">Our ServicesS</a></li>
         

          <li class="dropdown"><a href="#"><span>Grow With Us</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


<!--  Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>CARGO MASTER</span></h2>
          
          
        </div>
      </div>
       <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">CARGO MASTER Express Delivery</h2>
          
         
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">CARGO MASTER Express Delivery</h2>
          
         
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section>
    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <a href="welcome.php"><h4 class="title">Book your Shipment</h4>
              <p class="description">Request a shipment we'll be at your door step shortly</p>
              <br>
              <br>
              <div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">Book Now</button>
</a>
</div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
            <a href="welcome.php">  <h4 class="title">Track your shipment</h4>
              <p class="description">Click to know where your parcel has reached</p>
              <br>
              <br>
              <div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">Track A Shipment</button>
</a>
</div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
          <a href="customer_registation.php">    <h4 class="title">User Register</h4>
              <p class="description">Click to register user details</p>
              <br><br>
              <br>
              <div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">Register</button>
</a>
</div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
             <a href="associative.php"> <h4 class="title">Delivery Associative</h4>
              <p class="description">Click to register Delivery details</p>
              <br><br>
              <br>
              <div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">Register</button>
</a>
</div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Icon Boxes Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Cargo master ,india </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@cargomaster.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

         <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>One Of India’s Leading Integrated Express Logistics Provider</h4>
              
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Opeating Facility:</h4>
                <p>580</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Deliveries per month:</h4>
                <p>12 million+</p>
              </div>

            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-newsletter">
  <div class="container">
    <div class="row">
      
    </div>
  </div>
</div>

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

<div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
     <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Shipment</a></li>
   
          <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
         
        </ul>
</div>

      <div class="col-lg-3 col-md-6 footer-contact">
        <h4>Contact Us</h4>
        <p>
          A108 Adam Street <br>
          New York, NY 535022<br>
          United States <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>

      </div>

      <div class="col-lg-3 col-md-6 footer-info">
        <h3>About </h3>
        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
        <div class="social-links mt-3">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="https://www.linkedin.com/in/cargo-masters-3b54792b5/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>Cargo Master</span></strong>. All Rights Reserved
  </div>
  
</div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>


  <button class="chatbot-toggler">

      <span class="material-symbols-rounded">mode_comment</span>

      <span class="material-symbols-outlined">close</span>

  </button>

  <div class="chatbot">

      <header>

          <h2 class="m-0">Chat with us</h2>

          <span class="close-btn material-symbols-outlined">close</span>

      </header>

      <ul class="chatbox">

          <li class="chat incoming">

              <span class="material-symbols-outlined">smart_toy</span>

              <p>Hi there ðŸ‘‹<br>How can I help you today?</p>

          </li>

      </ul>

      <div class="chat-input" style="justify-content: right;">

          <!-- <textarea placeholder="Enter a message...Enquiry or Support" spellcheck="false" required>Enquiry</textarea> -->
          <button id="btn-enquiry" class="edu-btn btn-medium">Enquiry</button>
          <button id="btn-support" class="edu-btn btn-secondary">Support</button>




          <!-- <span id="send-btn" class="material-symbols-rounded">send</span> -->

      </div>



  </div>