<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CONSULTING FORMATION</title>

        <!-- Favicons -->
        <link href="assets/img/icon.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
        <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
  </head>
  <body>

    <div id="app">
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
                <h3 class="logo mr-auto"><span class="text-success">CONSULTING</span>FORMATION</h3>
                <nav class="nav-menu d-none d-lg-block">
                    <ul class="ml-4">
                        <li class="active"><router-link to="/">Accueil</router-link></li>
                        <li class="drop-down"><a href="#">Services</a>
                            <ul>
                                <li><router-link to="#">Service 1</router-link></li>
                                <li><router-link to="#">Service 2</router-link></li>
                                <li><router-link to="#">Service 3</router-link></li>
                            </ul>
                        </li>
                        <li><router-link to="/references">Références</router-link></li>
                        <li><router-link to="/contact">Contact</router-link></li>
                    </ul>
                </nav><!-- .nav-menu -->
            </div>
        </header>
        <!-- End Header -->

        <!--- Main sections -->
        <main id="main" class="mt-5">
            <router-view></router-view>
        </main>
        <!--- End Main sections -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
          <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                  <h3>CONSULTING FORMATION</h3>
                  <p>
                    26 RUE DES RIGOLES<br>
                    75020 PARIS 20<br>
                    Paris, France <br><br>
                    <strong>Téléphone</strong> +33 7 51 32 47 11<br>
                    <strong>Email:</strong> atmane77@yahoo.fr<br>
                  </p>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                  <h4>Nos services</h4>
                  <ul>
                    <li><i class="bx bx-chevron-right"></i> <router-link to="#">Web Design</router-link></li>
                  </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="map-section">
                    <div style="width: 100%"><iframe width="100%" height="350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=26%20Rue%20DES%20RIGOLES%2075020%20PARIS%2020+(CONSULTING%20FORMATION)&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                    </div>
                </div>

              </div>
            </div>
          </div>

          <div class="container d-md-flex py-4">

            <div class="mr-md-auto text-center text-md-left">
              <div class="copyright">
                &copy; Copyright <strong><span>ConsultingFormation</span></strong>. All Rights Reserved
              </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </footer>
        <!-- End Footer -->

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    </div>
        
    
        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/venobox/venobox.min.js"></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
  </body>
</html>
