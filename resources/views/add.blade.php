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

                <div class="section-header">
                    <h2>Wagen Hinzufügen</h2>
                    <p>Neues <span>Wagen</span> Hinzufügen</p><br>


                </div>

                <div class="row g-0">

                    <div class="col-lg-4 reservation-img" style="background-image: url(https://media.istockphoto.com/id/1337377361/photo/deutsche-bahn-train-arriving-at-greifswald-central-station.jpg?b=1&s=170667a&w=0&k=20&c=_AKnl_sYJtATWDiPGsm3lE1wks50UuUOeXe1bREwnpU=);" data-aos="zoom-out" data-aos-delay="200"></div>

                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" action="{{route('wagons', ['zug' => $zug->id]) }} " method="post">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-9 col-md-6">
                                    <input type="text" minlength="12" maxlength="12" required id="wagennummer" name="wagennummer" class="form-control" id="name" placeholder="Wagen Nummer : Z.B 33 80 51 6470 564-6" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="error-message" style="display:none; color:red;">
                                        Bitte geben Sie eine gültige 12-stellige wagennummer ein.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" id="gattungsbuchstabe" name="gattungsbuchstabe" class="form-control" placeholder="Gattungsbuchstabe" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" class="form-control" name="längeüberpuffer" id="längeüberpuffer" placeholder="Länge über puffer (LüP)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="längeüberpuffererror" style="display:none; color:red;">
                                    Bitte geben Sie gültige lüp ein.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" name="eigenmasse" id="eigenmasse" class="form-control" placeholder="Eigenmasse (T)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="eigenmasseerror" style="display:none; color:red;">
                                    Bitte geben Sie gültige Eigenmasse ein.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" class="form-control" name="AnzahlderAcshen" id="AnzahlderAcshen" placeholder="Anzahl der Acshen" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="AnzahlderAcshenerror" style="display:none; color:red;">
                                    Bitte geben Sie gültige Anzahl der Acshen ein.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" class="form-control" name="GewichtderLadung" id="GewichtderLadung" placeholder="Gewicht der Ladung" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div id="GewichtderLadungerror" style="display:none; color:red;">
                                    Bitte geben Sie gültige Gewicht der Ladung ein.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" class="form-control" name="Bremsgewicht" id="Bremsgewicht" placeholder=" Bremsgewicht" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div id="Bremsgewichterror" style="display:none; color:red;">
                                    Bitte geben Sie gültige Bremsgewicht ein.

                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="lastwechselundbremsgewicht">lastwechsel und bremsgewicht</label>
                                    <select class="form-control" name="lastwechselundbremsgewicht" id="lastwechselundbremsgewicht">

                                        <option value="Leer">Leer</option>
                                        <option value="Teilbeladen">Teilbeladen</option>
                                        <option value="beladen">beladen</option>
                                        <option value="Automatisch">Automatisch</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="bremsstellung">bremsstellung </label>
                                    <select class="form-control" name="bremsstellung" id="bremsstellung">

                                        <option value="AUS">AUS</option>
                                        <option value="R">R</option>
                                        <option value="P">P</option>
                                        <option value="G">G</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="hinweisezureibungsbremse">hinweise zu reibungsbremse </label>

                                    <select class="form-control" name="hinweisezureibungsbremse" id="hinweisezureibungsbremse">

                                        <option value="keine">keine</option>
                                        <option value="K">K</option>
                                        <option value="L">L</option>
                                        <option value="LL">LL</option>
                                        <option value="D">D</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="bemerkungenzurfeststellbremse">bemerkungen zur feststellbremse </label>
                                    <select class="form-control" name="bemerkungenzurfeststellbremse" id="bemerkungenzurfeststellbremse">

                                        <option value="Keine">Keine</option>
                                        <option value="bühnenbedienbar">bühnenbedienbar</option>
                                        <option value="bodenbedienbar">bodenbedienbar</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <fieldset  class="form-check">
                                    <input type="checkbox" name="lademaßüberschreitung" value="lademaßüberschreitung">
                                    <label for="lademaßüberschreitung">lademaßüberschreitung</label> <br>
                                    <input type="checkbox" name="außergewöhnlichesendung" value="außergewöhnliche sendung">
                                    <label for="außergewöhnlichesendung">außergewöhnliche sendung </label> <br>
                                    <input type="checkbox" name="windgefährdeteladung" value="windgefährdete ladung">
                                    <label for="windgefährdeteladung">windgefährdete ladung</label> 
                                        
                                    </fieldset>
                                    


                                </div>

                                <div class="col-lg-9 col-md-6">


                                    <label for="checkbox">Schadwagen</label> <input type="checkbox" id="checkbox1"> <br>
                                    <select class="form-control" name="Schadwagen" id="Schadwagen" disabled>
                                        <option value="" ></option>
                                        <option value="Muster M">Muster M</option>
                                        <option value="Muster K">Muster K</option>
                                        <option value="Muster K + R1">Muster K + R1</option>
                                        <option value="Muster V">Muster V</option>
                                        <option value="Muster I">Muster I</option>
                                    </select>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <div class="form-check form-check-inline">
                                        
                                        <label class="form-check-label" for="inlineCheckbox3">Beladen mit gefahrgut </label> <input  type="checkbox"  name="Beladenmitgefahrgut" id="checkbox2">
                                    </div>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" class="form-control" name="UNNummer" id="UNNummer" placeholder="UN-Nummer" data-rule="email" data-msg="Please enter a valid email" disabled>
                                    <div class="validate"></div>

                                </div>
                                <input type="text" id="zugid" name="zugid" value="{{$zug->id}}" hidden>
                                <input type="text" id="zugdatum" name="zugdatum" value="{{$zug->datum}}" hidden>
                                <input type="text" id="zugbestimmungsbanhof" name="zugbestimmungsbanhof" value="{{$zug->bestimmungsbanhof}}" hidden>
                                <input type="text" id="zugversandbanhof" name="zugversandbanhof" value="{{$zug->versandbanhof}}" hidden>
                            </div>


                            <div class=""><button type="submit">wagen speichern</button></div>
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
        var input2 = document.getElementById("wagennummer");
        var errorMessage = document.getElementById("error-message");
        input2.addEventListener("input", function() {
            if (input2.value.length !== 12 || isNaN(input.value)) {
                errorMessage.style.display = "block";
            } else {
                errorMessage.style.display = "none";
            }
        });
        var fields = ["längeüberpuffer", "eigenmasse", "AnzahlderAcshen", "GewichtderLadung", "Bremsgewicht"];
        for (var i = 0; i < fields.length; i++) {
            var input = document.getElementById(fields[i]);
            var error = document.getElementById(fields[i] + "error");
            input.addEventListener("input", function(event) {
                if (isNaN(event.target.value)) {
                    event.target.nextElementSibling.style.display = "block";
                } else {
                    event.target.nextElementSibling.style.display = "none";
                }
            });
        }

        var form = document.getElementsByTagName("form")[0];
        form.addEventListener("submit", function(event) {
            var hasError = false;
            for (var i = 0; i < fields.length; i++) {
                var input = document.getElementById(fields[i]);
                var error = document.getElementById(fields[i] + "error");
                if (isNaN(input.value)) {
                    error.style.display = "block";
                    hasError = true;
                }
            }
            var input2 = document.getElementById("wagennummer");
            var errorMessage = document.getElementById("error-message");
            if (isNaN(input2.value)) {
                errorMessage.style.display = "block";
                hasError = true;
            }
            if (hasError) {
                event.preventDefault();
            }
        });
        const checkbox = document.getElementById("checkbox1");
        const select = document.getElementById("Schadwagen");
        const checkbox2 = document.getElementById("checkbox2");
        const select2 = document.getElementById("UNNummer");
        
        checkbox.addEventListener("change", function() {
            if (this.checked) {
                select.disabled = false;
            } else {
                select.disabled = true;
                select.selectedIndex = 0; 
            }
        });
        checkbox2.addEventListener("change", function() {
            if (this.checked) {
                select2.disabled = false;
            } else {
                select2.disabled = true;
                select2.value="";
            }
        });
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