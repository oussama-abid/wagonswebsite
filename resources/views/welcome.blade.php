<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Startseite</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Favicons -->
    <link href="{{url('img/favicon.png')}}" rel="icon">
    <link href="{{url('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

    <style>
        .large {
            width: 700px !important;
            white-space: nowrap;
        }

        #datum {
            background: url(https://icons.veryicon.com/png/o/miscellaneous/administration/calendar-335.png) no-repeat scroll 1px 1px;
            background-size: 25px;
            background-position: 220px 9px;
            background-color: white;

        }
    </style>
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

                </ul>
            </nav><!-- .navbar -->

          

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
                            <th scope="col">Reihung</th>
                            <th scope="col">Zugnummer</th>
                            <th scope="col" class="large">Datum</th>
                            <th scope="col">Name</th>
                            <th scope="col">NachName</th>
                            <th scope="col">Versandbahnhof</th>
                            <th scope="col">Bestimmungsbahnhof</th>
                            <th scope="col">Ref_NR</th>
                            <th scope="col">wagen</th>
                            <th scope="col">Handlung</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zugs as $key => $zug)
                        <tr style="text-align: center;">
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $zug->zugnummer }}</td>
                            <td class="large">{{ $zug->datum }}</td>
                            <td>{{ $zug->name }}</td>
                            <td>{{ $zug->nachname }}</td>
                            <td>{{ $zug->versandbanhof }}</td>
                            <td>{{ $zug->bestimmungsbanhof }}</td>
                            <td>{{ $zug->ref }}</td>
                            <td>

                                <a href="{{ route('wagons.show', [$zug->id]) }}" style="color: blue;"> wagenliste </a>
                            </td>
                            <td class="large">
                                <button type="button" class="btn btn-danger" onclick="confirmDelete2('{{ $zug->id  }}');"> <i class="bi bi-trash3"></i> L??schen </button>
                                <a type="button" class="btn btn-warning" href="{{route('edit-zug', ['id' => $zug->id])}}"> <i class="bi bi-pen"></i> edit </a>
                            </td>
                            <form action="/deletezug/{{ $zug->id }}" method="POST" id="deleteForm-{{ $zug->id  }}">
                                @csrf
                            </form>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div> <!-- ======= Book A Table Section ======= -->
            <section id="book-a-table" class="book-a-table">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Zug Hinzuf??gen</h2>
                        <p>Neues <span>Zug</span> Hinzuf??gen</p>
                    </div>

                    <div class="row g-0">

                        <div class="col-lg-4 reservation-img" style="background-image: url(https://assets.deutschlandfunk.de/FILE_58a6ddb9ebc583a688290f44d813140f/1280xauto.jpg?t=1597541533052);" data-aos="zoom-out" data-aos-delay="200"></div>

                        <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                            <form role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" action="/addzug" method="post">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputName4">Name</label>
                                        <input required type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputNachname4">Nachname</label>
                                        <input required type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputversandbahnhof4">Versandbahnhof</label>
                                        <input required type="text" class="form-control" id="versandbanhof" name="versandbanhof" placeholder="versandbahnhof">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputBestimmungsbahnhof4">Bestimmungsbahnhof</label>
                                        <input required type="text" class="form-control" id="bestimmungsbanhof" name="bestimmungsbanhof" placeholder="Bestimmungsbahnhof">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="datum">Datum</label> <br>
                                        <input required type="text" class="form-control" id="datum" name="datum" pattern="\d{2}.\d{2}.\d{4}" required placeholder="DD.MM.YY">

                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputBestimmungsbahnhof4">Ref.-NR.</label>
                                        <input required type="text" class="form-control" id="ref" name="ref" placeholder="Ref.-NR.">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <label for="inputZugnummer4">Zugnummer</label>
                                        <input required type="text" class="form-control" id="zugnummer" name="zugnummer" placeholder="Zugnummer">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-lg-5 col-md-6" hidden>
                                        <label for="inputmindestbremshunderstel4">Mindestbremshunderstel</label>
                                        <input value="old" type="text" class="form-control" id="Mindestbremshunderstel" name="Mindestbremshunderstel" placeholder="mindestbremshunderstel">
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
    <script>
        function confirmDelete2(id) {

            Swal.fire({
                title: 'Sind Sie sicher?',
                text: 'Die Daten k??nnen nicht wiederhergestellt werden!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ja, l??schen!',
                cancelButtonText: 'Nein',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Gel??scht!',
                        'die Daten sind gel??scht.',
                        'success'
                    )
                    document.getElementById('deleteForm-' + id).submit();
                }
            })
            return false;

        }
    </script>
    <!-- Vendor JS Files -->
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('vendor/aos/aos.js')}}"></script>
    <script src="{{url('vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{url('vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{url('vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{url('js/main.js')}}"></script>


    <script>
        $(function() {
            $("#datum").datepicker({
                altFormat: "dd/mm/yy",
                dateFormat: "dd.mm.yy",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>

</body>

</html>