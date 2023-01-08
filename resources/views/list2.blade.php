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








    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table" style="margin-top: 50PX;">
      <div class="container" data-aos="fade-up">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            @foreach ($zug as $key => $zugs)
            <h5 class="card-title">Datum : {{ $zugs->datum }}</h5>
            <h5 class="card-title">Zugnummer : {{ $zugs->zugnummer }}</h5>
            <h5 class="card-title">Name : {{ $zugs->name }}</h5>
            <h5 class="card-title">Nachname : {{ $zugs->nachname }}</h5>
            <h5 class="card-title">Ref.-Nr : {{ $zugs->ref }}</h5>
            <a href="{{ route('pdf',[$zugs->id]) }}">Download pdf</a>
            @endforeach
          </div>
        </div>
        <br>
        <h1> wagenliste</h1>
        <br><br><br>
        <table class="table" id="table">
          <thead class="thead-dark">
            <tr>

            <th scope="col">Reihung</th>
              <th scope="col">Wagennummer</th>
              <th scope="col">Gattung</th>
              <th scope="col">LüP</th>
              <th scope="col">Gewicht</th>
              <th scope="col">Bremsstellung</th>
              <th scope="col">Handlung</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($wagon as  $key => $wagons)
            <tr>
            <th scope="row">{{ $key+1 }}</th>
              <td> {{ $wagons->wagennummer}} </td>
              <td> {{ $wagons->gattungsbuchstabe}} </td>
              <td> {{ $wagons->längeüberpuffer}}</td>
              <td> {{ $wagons->GewichtderLadung}} </td>
              <td> {{ $wagons->bremsstellung}}</td>
              <td> <a class="btn btn-warning" href="{{route('edit-wagon', ['id' => $wagons->wagon_id])}}"> <i class="bi bi-pencil"></i> edit</a></td>

            </tr>
            @endforeach




          </tbody>
        </table>



















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