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
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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

            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button style="border: 0;" type="submit" class="btn-book-a-table">logout</button>
            </form>
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
                    <h1>Employeesliste for {{$name}}</h1>
                </div>
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <br><br><br>

                <table class="table">
                    <thead class="thead">
                        <tr style="text-align: center;">
                            <th scope="col">Reihung</th>
                            <th scope="col" class="large">Name</th>
                            <th scope="col" class="large">Email</th>
                            <th scope="col" class="large">archive</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr style="text-align: center;">
                            <th scope="row">{{ $key+1 }}</th>
                            <td class="large">{{ $user->name }}</td>
                            <td class="large">{{ $user->email }}</td>
                            <td class="large"> <a href="{{ route('zuglist', [$user->id]) }}" style="color: blue;"> archiveliste </a>
                            </td>
                            
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div> <!-- ======= Book A Table Section ======= -->




    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="margin-top: 400px;">



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
                text: 'Die Daten können nicht wiederhergestellt werden!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ja, löschen!',
                cancelButtonText: 'Nein',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Gelöscht!',
                        'die Daten sind gelöscht.',
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