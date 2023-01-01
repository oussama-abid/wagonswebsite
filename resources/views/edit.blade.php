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

                        <form method="post"  class="php-email-form" data-aos="fade-up" data-aos-delay="100" action="{{ route('wagons.update', $wagon[0]->id) }}">
            @method('PATCH') 
            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-9 col-md-6">
                                    <input type="text" id="wagennummer"value="{{$wagon[0]->wagennummer}}" name="wagennummer" class="form-control" id="name" placeholder="Wagen Nummer : Z.B 33 80 51 6470 564-6" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" id="gattungsbuchstabe" value="{{$wagon[0]->gattungsbuchstabe}}" name="gattungsbuchstabe" class="form-control" placeholder="Gattungsbuchstabe" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" class="form-control"  value="{{$wagon[0]->längeüberpuffer}}" name="längeüberpuffer" id="längeüberpuffer" placeholder="Länge über puffer (LüP)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    
                                    <input type="text"name="eigenmasse" value="{{$wagon[0]->eigenmasse}}" id="eigenmasse" class="form-control" placeholder="Eigenmasse (T)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" class="form-control" value="{{$wagon[0]->AnzahlderAcshen}}" name="AnzahlderAcshen" id="AnzahlderAcshen" placeholder="Anzahl der Acshen" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" class="form-control" value="{{$wagon[0]->GewichtderLadung}}" name="GewichtderLadung" id="GewichtderLadung" placeholder="Gewicht der Ladung" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" class="form-control"value="{{$wagon[0]->Bremsgewicht}}" name="Bremsgewicht" id="Bremsgewicht" placeholder=" Bremsgewicht" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                <label for="lastwechselundbremsgewicht">lastwechsel und bremsgewicht</label>
                                    <select class="form-control" name="lastwechselundbremsgewicht" id="lastwechselundbremsgewicht">
                                        <option value="{{$wagon[0]->lastwechselundbremsgewicht}}">{{$wagon[0]->lastwechselundbremsgewicht}}</option>
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
                                        <option value="{{$wagon[0]->bremsstellung}}">{{$wagon[0]->bremsstellung}}</option>

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
                                        <option value="{{$wagon[0]->hinweisezureibungsbremse}}">{{$wagon[0]->hinweisezureibungsbremse}}</option>

                                        <option value="keine">keine</option>
                                        <option value="K">K</option>
                                        <option value="L">L</option>
                                        <option value="LL">LL</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                <label for="bemerkungenzurfeststellbremse">bemerkungen zur feststellbremse </label>
                                    <select class="form-control" name="bemerkungenzurfeststellbremse" id="bemerkungenzurfeststellbremse">
                                        <option value="{{$wagon[0]->bemerkungenzurfeststellbremse}}">{{$wagon[0]->bemerkungenzurfeststellbremse}}</option>

                                        <option value="Keine">Keine</option>
                                        <option value="bühnenbedienbar">bühnenbedienbar</option>
                                        <option value="bodenbedienbar">bodenbedienbar</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <fieldset id="bemerkung" name="bemerkung" class="form-check">

                                        <input type="radio" value="lademaßüberschreitung" id="lademaßüberschreitung" name="bemerkung"> lademaßüberschreitung <br>
                                        <input type="radio" value="außergewöhnliche sendung" id="außergewöhnliche sendung" name="bemerkung"> außergewöhnliche sendung <br>
                                        <input type="radio" value="windgefährdete ladung"  id="windgefährdete" name="bemerkung"> windgefährdete ladung
                                    </fieldset>



                                </div>

                                <div class="col-lg-9 col-md-6">
                                <label for="bemerkungenzurfeststellbremse">Schadwagen</label>
                                    <select class="form-control" name="Schadwagen" id="Schadwagen">
                                        <option value="{{$wagon[0]->Schadwagen}}">{{$wagon[0]->Schadwagen}}</option>

                                        <option value="Muster M">Muster M</option>
                                        <option value="Muster K">Muster K</option>
                                        <option value="Muster K + R1">Muster K + R1</option>
                                        <option value="Muster V">Muster V</option>
                                    </select>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="yes" name="Beladenmitgefahrgut"  id="Beladenmitgefahrgut">
                                        <label class="form-check-label" for="inlineCheckbox3">Beladen mit gefahrgut </label>
                                    </div>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input type="text" class="form-control" value="{{$wagon[0]->UNNummer}}"  name="UNNummer" id="UNNummer" placeholder="UN-Nummer" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>

                                </div>
                              {{---  <input type="text" id="zugid" name ="zugid" value="{{$zug->id}}" hidden>
                                <input type="text" id="zugdatum" name ="zugdatum" value="{{$zug->datum}}" hidden>
                                <input type="text" id="zugbestimmungsbanhof" name ="zugbestimmungsbanhof" value="{{$zug->bestimmungsbanhof}}" hidden>
                                <input type="text" id="zugversandbanhof" name ="zugversandbanhof" value="{{$zug->versandbanhof}}" hidden>---}} 
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