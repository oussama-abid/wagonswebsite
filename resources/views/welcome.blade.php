<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Startseite</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{url('img/favicon.png')}}" rel="icon">
    <link href="{{url('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{url('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{url('css/main.css')}}">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">

                <h1>Wali-Bahn<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Startseite</a></li>
                    <li><a href="#book-a-table"> Datei Hinzufügen</a></li>

                    <li><a href="#contact">Kontakt</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="/WagenHinzufügen">Wagen Hinzufügen</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">Sed autem laudantium dolores.<br>ptatem itaque ea</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="/WagenHinzufügen" class="btn-book-a-table">Wagen Hinzufügen</a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{url('img/hero-img.png')}}" class="img-fluid" alt="" style="width:2000px; ;" data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">

       
                <div class="row g-0">

                    <div class="col-lg-4 reservation-img" style="background-image: url(https://assets.deutschlandfunk.de/FILE_58a6ddb9ebc583a688290f44d813140f/1280xauto.jpg?t=1597541533052);" data-aos="zoom-out" data-aos-delay="200"></div>

                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
                            <div class="row gy-4">
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputName4">Name</label>
                                    <input type="text" class="form-control" id="inputName4" placeholder="Name">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputNachname4">Nachname</label>
                                    <input type="text" class="form-control" id="inputNachname4" placeholder="Nachname">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputversandbahnhof4">Versandbahnhof</label>
                                    <input type="text" class="form-control" id="inputversandbahnhof4" placeholder="versandbahnhof">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputBestimmungsbahnhof4">Bestimmungsbahnhof</label>
                                    <input type="text" class="form-control" id="inputBestimmungsbahnhof4" placeholder="Bestimmungsbahnhof">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputDatum">Datum</label>
                                    <input type="date" class="form-control" id="inputDatum">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputBestimmungsbahnhof4">Ref.-NR.</label>
                                    <input type="text" class="form-control" id="inputBestimmungsbahnhof4" placeholder="Ref.-NR.">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputZugnummer4">Zugnummer</label>
                                    <input type="text" class="form-control" id="inputZugnummer4" placeholder="Zugnummer">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputmindestbremshunderstel4">Mindestbremshunderstel</label>
                                    <input type="text" class="form-control" id="inputmindestbremshunderstel4" placeholder="mindestbremshunderstel">
                                    <div class="validate"></div>
                                </div>
                                

                         
                            <div ><button type="submit">Weiter</button></div>
                        </form>
                    </div><!-- End Reservation Form -->

                </div>

            </div>
        </section><!-- End Book A Table Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" >
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    
                    <p>Brauchen Sie Hilfe? <span>Kontaktieren Sie uns</span></p>
                </div>

                <div class="mb-3">
                    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12709.739353992863!2d9.756202774860624!3d37.21365106651871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e322eaeed2e16f%3A0x3668acba02c35a2c!2sLouata!5e0!3m2!1sar!2stn!4v1672168086501!5m2!1sar!2stn" frameborder="0" allowfullscreen></iframe>
                </div><!-- End Google Maps -->

                <div class="row gy-4">

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-map flex-shrink-0"></i>
                            <div>
                                <h3>Our Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center">
                            <i class="icon bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>contact@example.com</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-share flex-shrink-0"></i>
                            <div>
                                <h3>Opening Hours</h3>
                                <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                                    <strong>Sunday:</strong> Closed
                                </div>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                </div>


            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-4 col-md-10 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022 - US<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-4 col-md-10 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reservations</h4>
                        <p>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-10 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>


            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span></span></strong>. All Rights Reserved
            </div>

        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('vendor/aos/aos.js')}}"></script>
    <script src="{{url('vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{url('vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{url('vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{url('js/main.js')}}"></script>

</body>

</html>