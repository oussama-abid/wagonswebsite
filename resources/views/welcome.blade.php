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
                    <li><a href="#book-a-table"> Datei Hinzufügen</a></li>

                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="/wagons">Wagen List</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->


    <main id="main">
        <div class="container" data-aos="fade-up">

            <br><br><br> <br><br><br>


            <div class="row">
                <div class="section-header">
                    <h1>Zug list</h1>
                </div>
                <br><br><br>

                <table class="table">
                    <thead class="thead-dark">
                        <tr style="text-align: center;">
                            <th scope="col">#</th>
                            <th scope="col">Zugnummer</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Name</th>
                            <th scope="col">NachName</th>
                            <th scope="col">Versandbahnhof</th>
                            <th scope="col">Bestimmungsbahnhof</th>
                            <th scope="col">Ref_NR</th>
                            <th scope="col">Mindestbremshunderstel</th>
                            <th scope="col">wagen</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zugs as $key => $zug)
                        <tr style="text-align: center;">
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $zug->zugnummer }}</td>
                            <td >{{ $zug->datum }}</td>
                            <td>{{ $zug->name }}</td>
                            <td>{{ $zug->nachname }}</td>
                            <td>{{ $zug->versandbanhof }}</td>
                            <td>{{ $zug->bestimmungsbanhof }}</td>
                            <td>{{ $zug->ref }}</td>
                            <td>{{ $zug->Mindestbremshunderstel }}</td>
                            <td>
                                <a href="{{ route('addwagon', ['zug' => $zug->id]) }}">wagen Hinzufügen </a>
                                <a href="{{ route('wagons.show', [$zug->id]) }}" style="color: blue;"> wagen list </a>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div> <!-- ======= Book A Table Section ======= -->
            <section id="book-a-table" class="book-a-table">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Zug Hinzufügen</h2>
                        <p>Neues <span>Zug</span> Hinzufügen</p>
                    </div>

                    <div class="row g-0">

                        <div class="col-lg-4 reservation-img" style="background-image: url(https://assets.deutschlandfunk.de/FILE_58a6ddb9ebc583a688290f44d813140f/1280xauto.jpg?t=1597541533052);" data-aos="zoom-out" data-aos-delay="200"></div>

                        <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                            <form role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" action="/addzug" method="post">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputName4">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputNachname4">Nachname</label>
                                        <input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputversandbahnhof4">Versandbahnhof</label>
                                        <input type="text" class="form-control" id="versandbanhof" name="versandbanhof" placeholder="versandbahnhof">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputBestimmungsbahnhof4">Bestimmungsbahnhof</label>
                                        <input type="text" class="form-control" id="bestimmungsbanhof" name="bestimmungsbanhof" placeholder="Bestimmungsbahnhof">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputDatum">Datum</label>
                                        <input type="date" class="form-control" id="datum" name="datum">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputBestimmungsbahnhof4">Ref.-NR.</label>
                                        <input type="text" class="form-control" id="ref" name="ref" placeholder="Ref.-NR.">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputZugnummer4">Zugnummer</label>
                                        <input type="text" class="form-control" id="zugnummer" name="zugnummer" placeholder="Zugnummer">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputmindestbremshunderstel4">Mindestbremshunderstel</label>
                                        <input type="text" class="form-control" id="Mindestbremshunderstel" name="Mindestbremshunderstel" placeholder="mindestbremshunderstel">
                                        <div class="validate"></div>
                                    </div>



                                    <div><button type="submit">Weiter</button></div>
                            </form>
                        </div><!-- End Reservation Form -->

                    </div>

                </div>
            </section><!-- End Book A Table Section -->




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