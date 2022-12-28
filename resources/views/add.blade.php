<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Wagen Hinzufügen</title>
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
           
            </nav><!-- .navbar -->
            <a class="btn-book-a-table" href="/">Startseite</a>

            

        </div>
    </header><!-- End Header -->



    <main id="main">


        <!-- ======= Stats Counter Section ======= -->
        <section id="stats-counter" class="stats-counter">
            <div class="container" data-aos="zoom-out">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Workers</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>
        </section><!-- End Stats Counter Section -->







        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Wagen Hinzufügen</h2>
                    <p>Neues <span>Wagen</span> Hinzufügen</p>
                </div>

                <div class="row g-0" >

                    <div class="col-lg-4 reservation-img" style="background-image: url(https://media.istockphoto.com/id/1337377361/photo/deutsche-bahn-train-arriving-at-greifswald-central-station.jpg?b=1&s=170667a&w=0&k=20&c=_AKnl_sYJtATWDiPGsm3lE1wks50UuUOeXe1bREwnpU=);" data-aos="zoom-out" data-aos-delay="200"></div>

                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
                            <div class="row gy-4">
                                <div class="col-lg-9 col-md-6" >
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Wagen Nummer : Z.B 33 80 51 6470 564-6" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Gattungsbuchstabe" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Länge über puffer (LüP)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" name="date" class="form-control" id="date" placeholder="Eigenmasse (T)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" class="form-control" name="time" id="time" placeholder="Anzahl der Acshen" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="number" class="form-control" name="people" id="people" placeholder="Gewicht der Ladung" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="number" class="form-control" name="people" id="people" placeholder=" Bremsgewicht" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <select class="form-control">
                                        <option selected> lastwechsel und bremsgewicht </option>
                                        <option value="1">Leer</option>
                                        <option value="2">Teilbeladen</option>
                                        <option value="3">beladen</option>
                                        <option value="3">Automatisch</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <select class="form-control">
                                        <option selected>bremsstellung </option>
                                        <option value="1">AUS</option>
                                        <option value="2">R</option>
                                        <option value="3">P</option>
                                        <option value="3">G</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <select class="form-control">
                                        <option selected>hinweise zu reibungsbremse </option>
                                        <option value="1">keine</option>
                                        <option value="2">K</option>
                                        <option value="3">L</option>
                                        <option value="3">LL</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <select class="form-control">
                                        <option selected>bemerkungen zur feststellbremse</option>
                                        <option value="1">Keine</option>
                                        <option value="2">bühnenbedienbar</option>
                                        <option value="3">bodenbedienbar</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1"> lademaßüberschreitung</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">außergewöhnliche sendung</label>
                                    </div>


                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                        <label class="form-check-label" for="inlineCheckbox3">schadwagen</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                        <label class="form-check-label" for="inlineCheckbox3">windgefährdete ladung</label>
                                    </div>

                                </div>
                                <div class="col-lg-5 col-md-6">

                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                        <label class="form-check-label" for="inlineCheckbox3">Beladen mit gefahrgut </label>
                                    </div>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="UN-Nummer" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                            </div>
                            <div class=""><button type="submit">wagen speichern</button></div>
                        </form>
                    </div><!-- End Reservation Form -->

                </div>

            </div>
        </section><!-- End Book A Table Section -->



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