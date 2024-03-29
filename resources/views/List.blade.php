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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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




    <script>
      console.log(<?= json_encode($list); ?>);
    </script>



    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table" style="margin-top: 50PX;">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <p> Wagenliste</p>
        </div>
        <div class="row" style="margin: auto;  padding: 10px;">
          <div class="col-md-6">

            <div class="row" >
              <div class="col-md-6"> <input name="wagennummer" type="text" placeholder="Wagennummer" class="form-control" onkeyup="myFunction1()" id="wagennummer"></div>
            </div><br>



          </div>


        </div>
        <br><br><br>

        <table class="table" id="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Reihung</th>
              <th scope="col">Datum</th>
              <th scope="col" hidden>zugnummer</th>
              <th scope="col" hidden>Versandbahnof</th>
              <th scope="col" hidden>Bestimmungsbahnhof</th>
              <th scope="col">Ref.-Nr</th>

              <th scope="col">Wagennummer</th>
              <th scope="col">Gattung</th>
              <th scope="col">LüP</th>
              <th scope="col">Gewicht</th>
              <th scope="col">Bremsstellung</th>
              <th scope="col">Handlung</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($list as$key => $li)
            <tr>
              <th scope="row">{{ $key+1 }}</th>
              <td> {{ $li->datum}}</td>
              <td hidden> {{ $li->zugnummer}}</td>
              <td hidden> {{ $li->versandbanhof}}</td>
              <td hidden> {{ $li->bestimmungsbanhof}}</td>
              <td> {{ $li->ref}}</td>

              <td> {{ $li->wagennummer}} </td>
              <td> {{ $li->gattungsbuchstabe}} </td>
              <td> {{ $li->längeüberpuffer}}</td>
              <td> {{ $li->GewichtderLadung}} </td>
              <td> {{ $li->bremsstellung}}</td>
              <td> <a class="btn btn-warning" href="{{route('edit-wagon', ['id' => $li->wagon_id])}}"> <i class="bi bi-pencil"></i> edit</a></td>

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
  <script>
    function myFunction1() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("wagennummer");
      filter = input.value.toUpperCase();
      table = document.getElementById("table");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[5];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
</body>

</html>