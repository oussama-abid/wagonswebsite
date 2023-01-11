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

        <section id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">
             

                <div class="row g-0">

                    <div class="col-lg-4 reservation-img" style="background-image: url(https://assets.deutschlandfunk.de/FILE_58a6ddb9ebc583a688290f44d813140f/1280xauto.jpg?t=1597541533052);" data-aos="zoom-out" data-aos-delay="200"></div>

                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form method="post"  class="php-email-form" data-aos="fade-up" data-aos-delay="100" action="{{route('zugs.update', $zug[0]->id)}}">
                            @method('PATCH') 
                            @csrf
                            <input type="text" value="{{$zug[0]->id}}">
                            <div class="row gy-4">
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputName4">Name</label>
                                    <input required type="text" class="form-control"  value="{{$zug[0]->name}}" id="name" name="name" placeholder="Name">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputNachname4">Nachname</label>
                                    <input required type="text" class="form-control" id="nachname" value="{{$zug[0]->nachname}}" name="nachname" placeholder="Nachname">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputversandbahnhof4">Versandbahnhof</label>
                                    <input required type="text" class="form-control" id="versandbanhof"  value="{{$zug[0]->versandbanhof}}" name="versandbanhof" placeholder="versandbahnhof">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputBestimmungsbahnhof4">Bestimmungsbahnhof</label>
                                    <input required type="text" class="form-control" id="bestimmungsbanhof"  value="{{$zug[0]->bestimmungsbanhof}}" name="bestimmungsbanhof" placeholder="Bestimmungsbahnhof">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="datum">Datum</label> <br>
                                    <input required type="text" class="form-control" id="datum"  value="{{date('Y-m-d', strtotime($zug[0]->datum))}}" name="datum" required  placeholder="DD.MM.YY">

                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputBestimmungsbahnhof4">Ref.-NR.</label>
                                    <input required type="text" class="form-control" id="ref"  value="{{$zug[0]->ref}}" name="ref" placeholder="Ref.-NR.">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="inputZugnummer4">Zugnummer</label>
                                    <input required type="text" class="form-control" id="zugnummer"  value="{{$zug[0]->zugnummer}}" name="zugnummer" placeholder="Zugnummer">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6" hidden>
                                    <label for="inputmindestbremshunderstel4">Mindestbremshunderstel</label>
                                    <input value="old" type="text" class="form-control" id="Mindestbremshunderstel"  value="{{$zug[0]->Mindestbremshunderstel}}" name="Mindestbremshunderstel" placeholder="mindestbremshunderstel">
                                    <div class="validate"></div>
                                </div>



                                <div><button type="submit">Weiter</button></div>
                        </form>
                    </div><!-- End Reservation Form -->

                </div>

            </div>


        </section><!-- End Book A Table Section -->

       





        <!-- ======= Book A Table Section ======= -->
      

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">



        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span></span></strong>. All Rights Reserved
            </div>

        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
   
</body>
<script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('vendor/aos/aos.js')}}"></script>
<script src="{{url('vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{url('vendor/swiper/swiper-bundle.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('js/main.js')}}"></script>
</html>