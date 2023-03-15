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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

                <h1>WaLi-Bahn<span>.</span></h1>
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

                    <p><span>Daten </span> bearbeiten</p><br>


                </div>

                <div class="row g-0">

                    <div class="col-lg-4 reservation-img" style="background-image: url('img/img2.webp');" data-aos="zoom-out" data-aos-delay="200"></div>

                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">

                        <form method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="100" action="{{ route('wagons.update', $wagon[0]->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-9 col-md-6">
                                    <label for="wagennummer">Wagennummer</label>
                                    <input type="text" value="1" name="arch" hidden>
                                    <input type="text" minlength="16" value="{{$wagon[0]->wagennummer}}" maxlength="16" required id="input-rs" class="form-control input-field" placeholder="Wagen Nummer : Z.B 33 80 51 6470 564-6" data-rule="minlen:4" @error('wagennummer') value="{{  rtrim(old('wagennummer')) }}" @enderror>
                                    <input type="text" hidden  id="wagennummer" maxlength="11" name="wagennummer">
                                    <div id="error-message" style="display:none; color:red;">
                                        Bitte keine Freizeichen oder Bindestriche.
                                    </div>
                                    @error('wagennummer')
                                    <div style="color:red;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="gattungsbuchstabe">Gattungsbuchstabe</label>
                                    <input type="text" required id="gattungsbuchstabe" value="{{$wagon[0]->gattungsbuchstabe}}" name="gattungsbuchstabe" class="form-control" placeholder="z.B S" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="längeüberpuffer">Länge über Puffer (LüP)</label>
                                    <input type="text" required class="form-control" value="{{$wagon[0]->längeüberpuffer}}" name="längeüberpuffer" id="längeüberpuffer" placeholder="z.B 29.6" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="längeüberpuffererror" style="display:none; color:red;">
                                        Bitte mit Punkt trennen.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="eigenmasse">Eigenmasse (t)</label>
                                    <input type="text" required name="eigenmasse" value="{{$wagon[0]->eigenmasse}}" id="eigenmasse" class="form-control" placeholder="z.B 30" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="eigenmasseerror" style="display:none; color:red;">
                                        Bitte mit Punkt trennen.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="AnzahlderAcshen">Anzahl der Achsen</label>
                                    <input type="text" required class="form-control" value="{{$wagon[0]->AnzahlderAcshen}}" name="AnzahlderAcshen" id="AnzahlderAcshen" placeholder="z.B 6" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="AnzahlderAcshenerror" style="display:none; color:red;">
                                        Bitte gültige Anzahl der Achsen eingeben.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="GewichtderLadung">Gewicht der Ladung (t)</label>
                                    <input type="text" required class="form-control" value="{{$wagon[0]->GewichtderLadung}}" name="GewichtderLadung" id="GewichtderLadung" placeholder="z.B 25" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div id="GewichtderLadungerror" style="display:none; color:red;">
                                        Bitte mit Punkt trennen.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="Bremsgewicht">Bremsgewicht (t)</label>
                                    <input type="text" required class="form-control" value="{{$wagon[0]->Bremsgewicht}}" name="Bremsgewicht" id="Bremsgewicht" placeholder="z.B 55" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div id="Bremsgewichterror" style="display:none; color:red;">
                                        Bitte mit Punkt trennen.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="lastwechselundbremsgewicht">Lastwechsel</label>
                                    <select class="form-control" name="lastwechselundbremsgewicht" id="lastwechselundbremsgewicht">
                                        <option value="{{$wagon[0]->lastwechselundbremsgewicht}}">{{$wagon[0]->lastwechselundbremsgewicht}}</option>
                                        <option value="Leer">Leer</option>
                                        <option value="Teilbeladen">Teilbeladen</option>
                                        <option value="beladen">beladen</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="bremsstellung">Bremsstellung</label>
                                    <select class="form-control" name="bremsstellung" id="bremsstellung">
                                        <option value="{{$wagon[0]->bremsstellung}}">{{$wagon[0]->bremsstellung}}</option>

                                        <option value="AUS">AUS</option>
                                        <option value="P">P</option>
                                        <option value="G">G</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="hinweisezureibungsbremse">Hinweis zu Bremssohle</label>

                                    <select class="form-control" name="hinweisezureibungsbremse" id="hinweisezureibungsbremse">
                                        <option value="{{$wagon[0]->hinweisezureibungsbremse}}">{{$wagon[0]->hinweisezureibungsbremse}}</option>

                                        <option value="keine">keine</option>
                                        <option value="K">K</option>
                                        <option value="L">L</option>
                                        <option value="LL">LL</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="bemerkungenzurfeststellbremse">Bemerkungen zur Feststellbremse</label>
                                    <select class="form-control" name="bemerkungenzurfeststellbremse" id="bemerkungenzurfeststellbremse">
                                        <option value="{{$wagon[0]->bemerkungenzurfeststellbremse}}">{{$wagon[0]->bemerkungenzurfeststellbremse}}</option>

                                        <option value="Keine">Keine</option>
                                        <option value="bühnenbedienbar">Bühnenbedienbar</option>
                                        <option value="bodenbedienbar">Bodenbedienbar</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-lg-5 col-md-6">
                                    <label for="checkbox">Besonderheiten</label> <input type="checkbox" id="checkbox1"> <br>
                                    <select class="form-control" name="Schadwagen" style="height: 50px !important;" id="Schadwagen">
                                        <option value=""></option>
                                        <option value="{{$wagon[0]->Schadwagen}}" selected>{{$wagon[0]->Schadwagen}}</option>

                                        <option value="Schad">Schad</option>
                                        <option value="Lü">Lü</option>
                                        <option value="Ausend">Ausend</option>
                                        <option value="Schwer">Schwerwagen</option>
                                        <option value="Aufz">Ausergewöhliche Fahrzeuge</option>
                                        <option value="LQ">Gefahrgut >8t je Ladeeinheit verpackt</option>
                                        <option value="Chlor">Chlor</option>
                                        <option value="ep">Elektropneumatische Bremse</option>
                                        <option value="M">Matrossow</option>
                                        <option value="Wind">Wind</option>
                                    </select>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineCheckbox3">Bemerkungen</label> <input type="checkbox" name="Beladenmitgefahrgut" id="checkbox2">
                                    </div>
                                    <input type="text" class="form-control" value="{{$wagon[0]->UNNummer}}" name="UNNummer" id="UNNummer" placeholder="z.B UN3082/Gef9" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                </div>



                                <div class="col-lg-5 col-md-6">
                                    <label for="eigenmasse">Bremsgewichte</label>
                                    <input type="text" name="bremsgewichte" value="{{  $wagon[0]->bremsgewichte }}" id="bremsgewichte" class="form-control" placeholder="z.B 28/44/52 oder max 108t" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                                </div>

                                <div class="col-lg-3 col-md-4">
                                    <label for="AnzahlderAcshen" style="white-space: nowrap;">Revisionsdatum</label>
                                    <input type="text" class="form-control" value="{{  $wagon[0]->revsdatum }}" id="datum" name="revsdatum" pattern="\d{2}.\d{2}.\d{4}" required placeholder="DD.MM.YY">


                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label for="AnzahlderAcshen" style="white-space: nowrap;">Gültigkeit</label>
                                    <input type="text" class="form-control" value="{{  $wagon[0]->gultigkeit }}" name="gultigkeit" id="gultigkeit" placeholder="z.B 6" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label for="AnzahlderAcshen" style="font-size: small;white-space: nowrap;">Verlängert</label>
                                    <input type="text" class="form-control" value="{{  old('empty') }}" name="empty" id="empty" placeholder="z.B +3M" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                                </div>
                                <div class="col-lg-12 col-md-4">
                                    <label for="AnzahlderAcshen" style="white-space: nowrap;">Sonstige Bemerkungen</label>
                                    <input type="text" class="form-control" value="{{  $wagon[0]->sonstigebemerkungen }}" name="sonstigebemerkungen" id="sonstigebemerkungen" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                                </div>



                            </div>
                            <br><br>

                            <div class=""><button type="submit">Wagen speichern</button></div>
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
                &copy; Copyright by WaLi-Bahn<strong><span></span></strong>. Alle Rechte vorbehalten. Kontakt an kontakt@wali-bahn.de
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
        formatNumber.call(inputElement); // Format initial value

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
        var input2 = document.getElementById("input-rs");
        var errorMessage = document.getElementById("error-message");
        input2.addEventListener("input", function() {
            if (input2.value.length !== 16) {
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
            if (input2.value.length !== 12) {
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
                select2.value = "";
            }
        });
    </script>
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
    <!-- Vendor JS Files -->
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('vendor/aos/aos.js')}}"></script>
    <script src="{{url('vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{url('vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{url('vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{url('js/main.js')}}"></script>
    <script>
        console.log(<?= json_encode($wagon); ?>);
        document.getElementById('windgefährdete').checked = true;


        if (<?= json_encode($wagon[0]->bemerkung); ?> == "lademaßüberschreitung") {
            document.getElementById('lademaßüberschreitung').checked = true;
        };
        if (<?= json_encode($wagon[0]->Beladenmitgefahrgut); ?> == "yes") {
            document.getElementById('Beladenmitgefahrgut').checked = true;
        }
        if (<?= json_encode($wagon[0]->bemerkung); ?> == "außergewöhnliche sendung") {
            document.getElementById('außergewöhnliche sendung').checked = true;
        }
        if (<?= json_encode($wagon[0]->bemerkung); ?> == 'windgefährdete ladung') {
            document.getElementById('windgefährdete ladung').checked = true;
        }
    </script>
</body>

</html>