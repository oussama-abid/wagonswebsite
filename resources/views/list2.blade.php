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
  <style>

  </style>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
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
            <div class="row">
<div class="col">            <a class="btn btn-secondary" href="{{ route('pdf',[$zugs->id]) }}"><i class="bi bi-file-earmark"></i>PDF </a> <br>
</div>
<div class="col">            <a  class="btn btn-warning"    href="{{route('edit-zug', ['id' => $zugs->id])}}" > <i class="bi bi-pen"></i> edit </a>
</div>
            </div>

            @endforeach
          </div>
        </div>
        <br>
        <h1> wagenliste</h1>
        <form action="/deleteall/{{ $zugs->id }}" method="POST" id="deleteForm">
          @csrf
        </form>
        <button onclick="return confirmDelete();" type="submit" class="btn btn-danger">
          <i class="bi bi-trash3"></i> Löschen
        </button>
        <a class="btn btn-dark" href="{{ route('addwagon', ['zug' => $zugs->id]) }}">wagen Hinzufügen <i class="bi bi-plus-circle"></i></a>
        <br><br><br>

        <table class="table" id="table" style="text-align: center;">
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
            @foreach ($wagon as $key => $wagons)
            <tr>
              <th scope="row">{{ $key+1 }}</th>
              <td> {{ $wagons->wagennummer}} </td>
              <td> {{ $wagons->gattungsbuchstabe}} </td>
              <td> {{ $wagons->längeüberpuffer}}</td>
              <td> {{ $wagons->GewichtderLadung}} </td>
              <td> {{ $wagons->bremsstellung}}</td>
              <td>
                <a class="btn btn-warning" href="{{route('edit-wagon', ['id' => $wagons->wagon_id])}}"> <i class="bi bi-pencil"></i> edit</a>

                
                <button type="button" class="btn btn-danger" onclick="confirmDelete2('{{ $wagons->wagon_id  }}');"> <i class="bi bi-trash3"></i> Löschen </button>
              </td>
              <form action="/deletewagon/{{ $wagons->wagon_id }}" method="POST" id="deleteForm-{{ $wagons->wagon_id  }}">
                  @csrf
                </form>

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
  <script>
    function confirmDelete() {

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
          document.getElementById('deleteForm').submit();
        }
      })
      return false;
    }

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

</body>

</html>