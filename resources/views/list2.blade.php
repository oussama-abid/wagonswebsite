@php
use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Wagen Hinzufügen</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
            <div style="margin: auto; width: 70%; padding: 1px; margin-bottom: 4px;margin-top: 4px;">
              <img src="{{ asset('images/' . $zugs->logo) }}" style="border: 1px solid black;max-width: 250px; max-height: 90px;display: block;margin-left: auto;margin-right: auto;">
            </div>
            <?php


            $user = Auth::user();
            if ($user->type != "employee") {

            ?>
              <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" class="form-control form-control-sm" name="image">
                <input type="text" hidden value="{{ $zugs->id }}" name="idzug">
                <div style="margin: auto; width: 70%; padding: 1px; margin-bottom: 4px;margin-top: 4px;">
                  <div class="row">
                    <div class="col"><button type="submit" class="btn btn-danger btn-sm" style="margin-top: 8px;margin-bottom: 8px;margin-left: auto;margin-right: auto;display: block;">Edit logo</button></div>

                  </div>
                </div>

              </form>
            <?php
            }
            ?>


            <h5 class="card-title">Datum : {{ $zugs->datum }}</h5>
            <h5 class="card-title">Zugnummer : {{ $zugs->zugnummer }}</h5>
            <h5 class="card-title">Name : {{ $zugs->name }}</h5>
            <h5 class="card-title">Nachname : {{ $zugs->nachname }}</h5>
            <h5 class="card-title">Ref.-Nr : {{ $zugs->ref }}</h5>
            <div class="row">
              <div class="col"> <a class="btn btn-secondary" href="{{ route('pdf',[$zugs->id]) }}"><i class="bi bi-file-earmark"></i>PDF </a> <br>

              </div>
              <div class="col"> <a class="btn btn-warning" href="{{route('edit-zug', ['id' => $zugs->id])}}"> <i class="bi bi-pen"></i> edit </a>
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
              <th scope="col" class="hide-on-small">Bremsstellung</th>
              <th scope="col">Warnugen</th>
              <th scope="col">Handlung</th>

            </tr>
          </thead>
          <tbody>
            @php
            function formatNumber($value) {
            $input = preg_replace('/\D/', '', $value); // Remove non-numeric characters
            $formattedNumber = '';

            // Add spaces
            if (strlen($input) > 2) {
            $formattedNumber .= substr($input, 0, 2) . ' ';
            $input = substr($input, 2);
            }
            if (strlen($input) > 2) {
            $formattedNumber .= substr($input, 0, 2) . ' ';
            $input = substr($input, 2);
            }

            if (strlen($input) > 4) {
            $formattedNumber .= substr($input, 0, 4) . ' ';
            $input = substr($input, 4);
            }
            if (strlen($input) > 3) {
            $formattedNumber .= substr($input, 0, 3) . '-';
            $input = substr($input, 3);
            }

            $formattedNumber .= $input;

            return substr($formattedNumber, 0, 16);
            }

            @endphp
            @foreach ($wagon as $key => $wagons)
            <tr>
              <th scope="row">{{ $key+1 }}</th>
              <td> {{formatNumber($wagons->wagennummer)}} </td>
              <td> {{ $wagons->gattungsbuchstabe}} </td>
              <td> {{ $wagons->längeüberpuffer}}</td>
              <td> {{ $wagons->GewichtderLadung}} </td>
              <td class="hide-on-small"> {{ $wagons->bremsstellung}}</td>
              <td>
                <?php

                if ($wagons->maxzuladung != null) {
                  if ($wagons->GewichtderLadung > $wagons->maxzuladung) {

                ?>
                    <i class="fa fa-exclamation-triangle fa-fade" aria-hidden="true" style="color: red; font-size: 26px; "></i>

                <?php
                  }
                }

                ?>
                <?php

                if ( strtotime(date('Y-m-d')) >= strtotime($wagons->alertdate ) ) {

                ?>
                  <i class="fa fa-exclamation-triangle fa-fade" aria-hidden="true" style="color: #fcc404; font-size: 26px; "></i>

                <?php
                }


                ?>

              </td>
              <td>
                <a class="btn btn-warning" href="{{route('edit-wagon', ['id' => $wagons->wagon_id])}}"> <i class="bi bi-pencil"></i> <span class="hide-on-small">edit</span> </a>


                <button type="button" class="btn btn-danger" onclick="confirmDelete2('{{ $wagons->wagon_id  }}');"> <i class="bi bi-trash3"></i> <span class="hide-on-small"> Löschen </span> </button>
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