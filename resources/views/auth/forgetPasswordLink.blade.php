<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>change password</title>
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
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <link rel="stylesheet" href="{{url('css/main.css')}}">

    <style>
        .c {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

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

        input:focus {
            border-color: red !important;
            box-shadow: none !important;
        }

        .rounded-t-5 {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        @media (min-width: 992px) {
            .rounded-tr-lg-0 {
                border-top-right-radius: 0;
            }

            .rounded-bl-lg-5 {
                border-bottom-left-radius: 0.5rem;
            }
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

            <br><br><br> <br><br>
            <!-- Section: Design Block -->
            <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
                <div class="container">
                    <div class="card login-card">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <img src="https://s2.best-wallpaper.net/wallpaper/iphone/1811/Tram-train-railway-power-lines_iphone_1080x1920.jpg" alt="login" class="login-card-img">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <div class="brand-wrapper">
                                        <img src="/images/logo.png" alt="logo" class="logo">
                                    </div>
                                    <p class="login-card-description">Change your password</p>
                                    <form action="{{ route('reset.password.post') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email"   id="email_address" name="email" required autofocus class="form-control" placeholder="Email address">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password"   required autofocus name="password" id="password" class="form-control" placeholder="***********">
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" id="password-confirm"  name="password_confirmation" required class="form-control" placeholder="***********">
                                            @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                        <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                                    </form>
                                    <a href="{{ route('forget.password.get') }}" class="forgot-password-link">Forgot password?</a>
                                    <nav class="login-card-footer-nav">

                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <!-- Section: Design Block -->





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