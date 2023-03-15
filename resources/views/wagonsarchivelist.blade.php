@php
use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Archive</title>
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

        <br>

        <div class="section-header">
          <h1> wagenarchive</h1>
        </div>
        <div style="width: 400px;">
          <input name="wagennummerser" type="text" placeholder="Suche" class="form-control" onkeyup="myFunction1()" id="wagennummerser">


        </div>
        <br>

        <a class="btn btn-dark" href="{{ route('addwagonarchive', ['zug' => $zugid ]) }}">wagen Hinzufügen <i class="bi bi-plus-circle"></i></a>
<br> <br>
        <table class="table" id="table" style="text-align: center;">
          <thead class="thead-dark">
            <tr>


              <th scope="col">Wagennummer</th>
              <th scope="col">Gattung</th>
              <th scope="col">LüP</th>
              <th scope="col">Gewicht</th>
              <th scope="col" class="hide-on-small">Bremsstellung</th>
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
              <td hidden></td>
              <td hidden></td>
              <td hidden></td>

              <td> {{formatNumber($wagons->wagennummer)}} </td>
              <td> {{ $wagons->gattungsbuchstabe}} </td>
              <td> {{ $wagons->längeüberpuffer}}</td>
              <td> {{ $wagons->GewichtderLadung}} </td>
              <td class="hide-on-small"> {{ $wagons->bremsstellung}}</td>
              <td>
                <a class="btn btn-warning" href="{{route('editarchivewagon', ['id' => $wagons->id])}}"> <i class="bi bi-pencil"></i> <span class="hide-on-small"></span> </a>


                <button type="button" class="btn btn-danger" onclick="confirmDelete2('{{ $wagons->wagon_id  }}');"> <i class="bi bi-trash3"></i> <span class="hide-on-small">  </span> </button>
              </td>
              <form action="{{route('deletearch', ['wagon' => $wagons->id]) }} "  method="POST" id="deleteForm-{{ $wagons->wagon_id  }}">
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
  <footer id="footer" class="footer" style="margin-top: 300px;">



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
    const inputElement = document.getElementById('input-rs');

    const res = document.getElementById('wagennummer');

    inputElement.addEventListener('input', formatNumber);
    inputElement2.addEventListener('input', formatNumber);
    formatNumber.call(inputElement); // Format initial value
    formatNumber.call(inputElement2);

    function formatNumber() {
      let input = this.value.replace(/\D/g, ''); // Remove non-numeric characters
      let formattedNumber = '';

      // Add spaces
      if (input.length > 2) {
        formattedNumber += input.substring(0, 2) + ' ';
        input = input.substring(2);
      }
      if (input.length > 2) {
        formattedNumber += input.substring(0, 2) + ' ';
        input = input.substring(2);

      }

      if (input.length > 4) {
        formattedNumber += input.substring(0, 4) + ' ';
        input = input.substring(4);

      }
      if (input.length > 3) {
        formattedNumber += input.substring(0, 3) + '-';
        input = input.substring(3);

      }
      console.log(input);
      formattedNumber += input;

      this.value = formattedNumber.substring(0, 16);
      res.value = formattedNumber.replace(/\D/g, '').substring(0, 12);
      // Limit to 15 characters

    }
  </script>
  <script>
    const inputElement2 = document.getElementById('wagennummerser');
    const res2 = document.getElementById('wagennummerserrres');

    inputElement2.addEventListener('input', formatNumber);
    formatNumber2.call(inputElement2);

    function formatNumber2() {
      let input = this.value.replace(/\D/g, ''); // Remove non-numeric characters
      let formattedNumber = '';

      // Add spaces
      if (input.length > 2) {
        formattedNumber += input.substring(0, 2) + ' ';
        input = input.substring(2);
      }
      if (input.length > 2) {
        formattedNumber += input.substring(0, 2) + ' ';
        input = input.substring(2);

      }

      if (input.length > 4) {
        formattedNumber += input.substring(0, 4) + ' ';
        input = input.substring(4);

      }
      if (input.length > 3) {
        formattedNumber += input.substring(0, 3) + '-';
        input = input.substring(3);

      }
      console.log(input);
      formattedNumber += input;

      this.value = formattedNumber.substring(0, 16);
      res2.value = formattedNumber.replace(/\D/g, '').substring(0, 12);
      // Limit to 15 characters

    }
  </script>

  <script>
    function myFunction1() {
      console.log;
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("wagennummerser");
      filter = input.value.toUpperCase();
      table = document.getElementById("table");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        console.log(tr[i].getElementsByTagName("td")[1]);
        td = tr[i].getElementsByTagName("td")[3];
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