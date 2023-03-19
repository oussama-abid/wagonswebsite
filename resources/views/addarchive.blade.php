<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>WaLi-Bahn - Wagen Hinzufügen</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Favicons -->
    <link href="{{url('img/favicon.png')}}" rel="icon">
    <link href="{{url('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <style>
        table tr:not(:first-child) {
            cursor: pointer;
            transition: all .25s ease-in-out;
        }

        table tr:not(:first-child):hover {
            background-color: #ddd;
        }

        #datum {
            background: url(https://icons.veryicon.com/png/o/miscellaneous/administration/calendar-335.png) no-repeat scroll 1px 1px;
            background-size: 25px;
            background-position: 220px 9px;
            background-color: white;

        }
    </style>
    <style>
        .s {
            background-image: url('img/favicon.png');
        }
    </style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fengyuanchen/cropperjs@3.0.0/dist/cropper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@v2.0.0-beta.2"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css" />
    <link rel="stylesheet" href="{{url('css/image.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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
            <a class="btn-book-a-table" href="/">Zurück</a>



        </div>
    </header><!-- End Header -->



    <main id="main">








        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table" style="margin-top: 50PX;">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <p>Neuen <span>Wagen</span>Hinzufügen</p><br>


                </div>

                <div class="row g-0">

                    <div class="col-lg-4 reservation-img s" style="background-image: url('https://i.ibb.co/JtBcVfZ/img2.webp');" data-aos="zoom-out" data-aos-delay="200"></div>

                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" action="{{route('wagons', ['zug' => $zug->id]) }} " method="post">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-9 col-md-6">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-box-arrow-in-down"></i></a>
                                    <label for="wagennummer"> <--Suche oder Wagenummer eingeben</label>
                                            <div class="input-container">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModa2" class="icon"><i class="bi bi-camera "></i></a>
                                                <input type="text" minlength="16" maxlength="16" required id="input-rs" class="form-control input-field" placeholder="z.B 37 80 4950 360-0" data-rule="minlen:4" @error('wagennummer') value="{{  rtrim(old('wagennummer')) }}" @enderror>
                                                <input type="text" hidden id="wagennummer" maxlength="11" name="wagennummer">
                                            </div>
                                            <input type="text" value="1" hidden name="arch">
                                            <div id="error-message" style="display:none; color:red;">
                                                Freizeichen und Bindestriche werden Automatisch gesetzt.
                                            </div>
                                            @error('wagennummer')
                                            <div style="color:red;">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="gattungsbuchstabe">Gattungsbuchstabe</label>
                                    <input required @error('wagennummer') value="{{  old('gattungsbuchstabe') }}" @enderror type="text" id="gattungsbuchstabe" name="gattungsbuchstabe" class="form-control" placeholder="z.B S" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="längeüberpuffer">Länge über Puffer (LüP)</label>
                                    <input required type="text" class="form-control" @error('wagennummer') value="{{  old('längeüberpuffer') }}" @enderror name="längeüberpuffer" id="längeüberpuffer" placeholder="z.B 29.6" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="längeüberpuffererror" style="display:none; color:red;">
                                        Bitte mit Punkt trennen.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="eigenmasse">Eigenmasse (t)</label>
                                    <input required type="text" name="eigenmasse" @error('wagennummer') value="{{  old('eigenmasse') }}" @enderror id="eigenmasse" class="form-control" placeholder="z.B 30" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="eigenmasseerror" style="display:none; color:red;">
                                        Bitte mit Punkt trennen.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="AnzahlderAcshen">Anzahl der Achsen</label>
                                    <input required type="text" class="form-control" @error('wagennummer') value="{{  old('AnzahlderAcshen') }}" @enderror name="AnzahlderAcshen" id="AnzahlderAcshen" placeholder="z.B 6" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="AnzahlderAcshenerror" style="display:none; color:red;">
                                        Bitte gültige Anzahl der Achsen eingeben.
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6" hidden>
                                    <label for="GewichtderLadung">Gewicht der Ladung (t)</label>
                                    <input  type="text" class="form-control"  value="0"  name="GewichtderLadung" id="GewichtderLadung" placeholder="z.B 25" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div id="GewichtderLadungerror" style="display:none; color:red;">
                                        Bitte mit Punkt trennen.
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label for="GewichtderLadung" style="font-size: 15px; white-space: nowrap;">max zuladung</label>
                                    <input type="text" class="form-control" value="{{  old('maxzuladung') }}" name="maxzuladung" id="maxzuladung" placeholder="z.B 25" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                             
                                </div>
                                <div class="col-lg-5 col-md-6" hidden>
                                    <label for="Bremsgewicht">Bremsgewicht (t)</label>
                                    <input  type="text" class="form-control" @error('wagennummer')  @enderror  value="0" name="Bremsgewicht" id="Bremsgewicht" placeholder="z.B 55" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div id="Bremsgewichterror" style="display:none; color:red;">
                                        Bitte mit Punkt trennen.

                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6" hidden>
                                    <label for="lastwechselundbremsgewicht">Lastwechsel</label>
                                    <select  class="form-control" name="lastwechselundbremsgewicht" id="lastwechselundbremsgewicht">
                                        @error('wagennummer')
                                        <option value="{{  old('lastwechselundbremsgewicht') }}">{{old('lastwechselundbremsgewicht')}}</option>
                                        @enderror
                                        <option value="Leer" >Leer</option>
                                        <option value="Teilbeladen">Teilbeladen</option>
                                        <option value="beladen">beladen</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6" hidden>
                                    <label for="bremsstellung">Bremsstellung</label>
                                    <select class="form-control" name="bremsstellung" id="bremsstellung">
                                        @error('wagennummer')
                                        <option value="{{  old('bremsstellung') }}">{{old('bremsstellung')}}</option>
                                        @enderror
                                        <option value="AUS">AUS</option>
                                        <option value="P">P</option>
                                        <option value="G">G</option>

                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="hinweisezureibungsbremse">Hinweis zu Bremssohle</label>

                                    <select class="form-control" name="hinweisezureibungsbremse" id="hinweisezureibungsbremse">
                                        @error('wagennummer')
                                        <option value="{{  old('hinweisezureibungsbremse') }}">{{old('hinweisezureibungsbremse')}}</option>
                                        @enderror
                                        <option value="keine">keine</option>
                                        <option value="K">K</option>
                                        <option value="L">L</option>
                                        <option value="LL">LL</option>
                                        <option value="D">D</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="bemerkungenzurfeststellbremse">Bemerkungen zur Feststellbremse</label>
                                    <select class="form-control" name="bemerkungenzurfeststellbremse" id="bemerkungenzurfeststellbremse">
                                        @error('wagennummer')
                                        <option value="{{  old('bemerkungenzurfeststellbremse') }}">{{old('bemerkungenzurfeststellbremse')}}</option>
                                        @enderror
                                        <option value="Keine">Keine</option>
                                        <option value="bühnenbedienbar">Bühnenbedienbar</option>
                                        <option value="bodenbedienbar">Bodenbedienbar</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-lg-5 col-md-6" hidden>


                                    <label for="checkbox">Besonderheiten</label> <input type="checkbox" id="checkbox1"> <br>
                                    <select class="form-control" style="height: 50px !important;" name="Schadwagen" id="Schadwagen" disabled>
                                        @error('wagennummer')
                                        <script>
                                            document.getElementById('Schadwagen').disabled = false;
                                        </script>
                                        <option value="{{  old('Schadwagen') }}">{{old('Schadwagen')}}</option>
                                        @enderror
                                        <option value="Schad">Schad</option>
                                        <option value="Lü">Lü</option>
                                        <option value="Ausend">Ausend</option>
                                        <option value="Schwer">Schwerwagen</option>
                                        <option value="Aufz">Außergewöhliche Fahrzeuge</option>
                                        <option value="LQ">Gefahrgut >8t je Ladeeinheit verpackt</option>
                                        <option value="Chlor">Chlor</option>
                                        <option value="ep">Elektropneumatische Bremse</option>
                                        <option value="M">Matrossow</option>
                                        <option value="Wind">Wind</option>
                                    </select>
                                </div>
                                <div class="col-lg-5 col-md-6" hidden>

                                    <div class="form-check form-check-inline">

                                        <label class="form-check-label" for="inlineCheckbox3">Bemerkungen</label> <input type="checkbox" name="Beladenmitgefahrgut" id="checkbox2">
                                    </div>
                                    <input type="text" class="form-control" name="UNNummer" id="UNNummer" @error('wagennummer') value="{{  old('UNNummer') }}" @enderror placeholder="z.B UN3082/Gef9" data-rule="email" data-msg="Please enter a valid email" disabled>
                                    @error('wagennummer')
                                    <script>
                                        document.getElementById('UNNummer').disabled = false;
                                    </script>
                                    @enderror
                                    <div class="validate"></div>
                                    <div class="validate"></div>
                                </div>
                                <label for="w">Zusätzliche Informationen:</label>
                                <div class="col-lg-5 col-md-6">
                                    <label for="eigenmasse">Bremsgewichte</label>
                                    <input type="text" name="bremsgewichte" value="{{  old('bremsgewichte') }}" id="bremsgewichte" class="form-control" placeholder="z.B 28/44/52 oder max 108t" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                                </div>

                                <div class="col-lg-3 col-md-4">
                                    <label for="AnzahlderAcshen" style="white-space: nowrap;">Revisionsdatum</label>
                                    <input type="date" class="form-control" value="{{  old('revsdatum') }}" name="revsdatum" id="date-input" oninput="calculateDate()">



                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label for="AnzahlderAcshen" style="white-space: nowrap;">Gültigkeit</label>
                                    <input type="text" class="form-control" value="{{  old('gultigkeit') }}" name="gultigkeit" id="gultigkeit" placeholder="z.B 6" data-rule="minlen:4" data-msg="Please enter at least 4 chars" oninput="calculateDate()">

                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label for="AnzahlderAcshen" style="font-size: small;white-space: nowrap;">Verlängert</label>
                                    <input type="text" class="form-control" value="{{  old('empty') }}" name="empty" id="empty" placeholder="z.B +3M" data-rule="minlen:4" data-msg="Please enter at least 4 chars" oninput="calculateDate()">

                                </div>
                                <div class="col-lg-12 col-md-4">
                                    <label for="AnzahlderAcshen" style="white-space: nowrap;">Sonstige Bemerkungen</label>
                                    <input type="text" class="form-control" value="{{  old('sonstigebemerkungen') }}" name="sonstigebemerkungen" id="sonstigebemerkungen" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                                </div>
                                <input type="date" id="new-date-input" readonly name="alertdate" hidden>

                                <input type="text" id="zugid" name="zugid" value="{{$zug->id}}" hidden>
                                <input type="text" id="zugdatum" name="zugdatum" value="{{$zug->datum}}" hidden>
                                <input type="text" id="zugbestimmungsbanhof" name="zugbestimmungsbanhof" value="{{$zug->bestimmungsbanhof}}" hidden>
                                <input type="text" id="zugversandbanhof" name="zugversandbanhof" value="{{$zug->versandbanhof}}" hidden>
                            </div>
                            <br><br>

                            <div class=""><button type="submit">Wagen erstellen (alle Daten sind überprüft?)</button></div>
                        </form>
                    </div><!-- End Reservation Form -->

                </div>

            </div>
        </section><!-- End Book A Table Section -->
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-6">
                            <input name="wagennummerser" type="text" placeholder="Suche" class="form-control" onkeyup="myFunction1()" id="wagennummerser">

                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cls"></button>
                    </div>
                    <script>
                        console.log(<?= json_encode($list); ?>);
                    </script>

                    <div class="modal-body">
                        <table class="table" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" hidden>zugnummer</th>
                                    <th scope="col" hidden>Versandbahnof</th>
                                    <th scope="col" hidden>Bestimmungsbahnhof</th>
                                    <th scope="col">Wagennummer</th>
                                    <th scope="col">Gattung</th>
                                    <th scope="col">LüP</th>
                                    <th scope="col">Gewicht</th>
                                    <th scope="col">Bremsstellung</th>
                                    <th></th>
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
                                @foreach ($list as$key => $li)
                                <tr>
                                    <td hidden> {{ $li->zugnummer}}</td>
                                    <td hidden> {{ $li->versandbanhof}}</td>
                                    <td hidden> {{ $li->bestimmungsbanhof}}</td>

                                    <td>{{formatNumber($li->wagennummer)}} </td>
                                    <td> {{ $li->gattungsbuchstabe}} </td>
                                    <td> {{ $li->längeüberpuffer}}</td>
                                    <td hidden> {{ $li->eigenmasse}}</td>
                                    <td hidden> {{ $li->AnzahlderAcshen}}</td>
                                    <td> {{ $li->GewichtderLadung}} </td>
                                    <td hidden> {{ $li->Bremsgewicht}}</td>
                                    <td hidden> {{ $li->lastwechselundbremsgewicht}}</td>
                                    <td> {{ $li->bremsstellung}}</td>
                                    <td hidden> {{ $li->hinweisezureibungsbremse}}</td>
                                    <td hidden> {{ $li->bemerkungenzurfeststellbremse}}</td>
                                    <td hidden> {{ $li->Schadwagen}}</td>
                                    <td hidden> {{ $li->UNNummer}}</td>

                                    <td hidden> {{ $li->bremsgewichte}}</td>
                                    <td hidden> {{ $li->revsdatum}}</td>
                                    <td hidden> {{ $li->gultigkeit}}</td>
                                    <td hidden> {{ $li->empty}}</td>
                                    <td hidden> {{ $li->sonstigebemerkungen}}</td>
                                    <td>
                                        <?php
                                        if ($li->arch == 1) { ?>
                                            <i class="bi bi-archive"></i>

                                        <?php
                                        }
                                        ?>
                                    </td>



                                </tr>
                                @endforeach




                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
        <!-- Modal 2 -->
        <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cl"></button>
                    </div>
                    <div class="modal-body">
                        <div id="loading" style="display:none;">
                            <div class="loading-spinner"></div>
                        </div>
                        <main class="page">
                            <!-- input file -->
                            <div class="box">
                                <input type="file" id="file-input" accept="image/*" class="form-control" name="image" />
                            </div>
                            <!-- leftbox -->

                            <div class="box-2">
                                <div class="result"></div>
                            </div>


                            <!--rightbox-->
                            <div class="box-2 img-result" hidden>
                                <!-- result of crop -->
                                <img class="cropped" src="" alt="" />
                            </div>


                            <!-- input file -->
                            <div class="box">
                                <div class="options hide" hidden>
                                    <label> Width</label>
                                    <input type="number" class="img-w" value="300" min="100" max="1200" />
                                </div>
                                <!-- save btn -->
                                <button class="btn save hide">Save</button>
                                <!-- download btn -->

                            </div>

                        </main>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2 -->


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
        $(function() {
            $("#datum").datepicker({
                altFormat: "dd/mm/yy",
                dateFormat: "dd.mm.yy",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
    <script>
        window.onload = function() {
            var rows = document.querySelectorAll('tr:not(.header)');

            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = 'none';
            }
        }

        var table = document.getElementById('table');

        for (var i = 1; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                //rIndex = this.rowIndex;

                let input = String(this.cells[3].innerHTML.replace(/\D/g, '')); // Remove non-numeric characters
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

                document.getElementById("input-rs").value = formattedNumber;
                document.getElementById("gattungsbuchstabe").value = this.cells[4].innerHTML.trim().replace(/&nbsp;/g, '');;
                document.getElementById("längeüberpuffer").value = this.cells[5].innerHTML.trim().replace(/&nbsp;/g, '');;
                document.getElementById("eigenmasse").value = this.cells[6].innerHTML.trim().replace(/&nbsp;/g, '');;
                document.getElementById("AnzahlderAcshen").value = this.cells[7].innerHTML.trim().replace(/&nbsp;/g, '');;
                document.getElementById('lastwechselundbremsgewicht').value = this.cells[10].innerHTML.trim().replace(/&nbsp;/g, '');
                document.getElementById('bremsstellung').value = this.cells[11].innerHTML.trim().replace(/&nbsp;/g, '');
                document.getElementById('hinweisezureibungsbremse').value = this.cells[12].innerHTML.trim().replace(/&nbsp;/g, '');
                document.getElementById('bemerkungenzurfeststellbremse').value = this.cells[13].innerHTML.trim().replace(/&nbsp;/g, '');
                document.getElementById('Schadwagen').value = this.cells[14].innerHTML.trim().replace(/&nbsp;/g, '');
                document.getElementById('UNNummer').value = this.cells[15].innerHTML.trim().replace(/&nbsp;/g, '');

                document.getElementById('bremsgewichte').value = this.cells[16].innerHTML.trim().replace(/&nbsp;/g, '');
                console.log(String(this.cells[17].innerHTML.trim()));
                document.getElementById('datum').value = String(this.cells[17].innerHTML.trim());
                document.getElementById('gultigkeit').value = this.cells[18].innerHTML.trim().replace(/&nbsp;/g, '');
                document.getElementById('empty').value = this.cells[19].innerHTML.trim().replace(/&nbsp;/g, '');
                document.getElementById('sonstigebemerkungen').value = this.cells[20].innerHTML.trim();

                document.getElementById('Schadwagen').disabled = false;
                document.getElementById('UNNummer').disabled = false;
                document.getElementById("cls").click();
            };
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
            var rows = document.querySelectorAll('tr:not(.header)');

            if (input.value.length == 0) {
                for (var i = 0; i < rows.length; i++) {
                    rows[i].style.display = 'none';
                }
            }
        }














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
        function calculateDate() {
            // Get user inputs
            let dateStr = document.getElementById("date-input").value;
            let yearInput = document.getElementById("gultigkeit").value;
            let monthInput = document.getElementById("empty").value;

            // Convert date input to Date object
            let date = new Date(dateStr);

            // Calculate new year and month values
            let newYear = date.getFullYear();
            let newMonth = date.getMonth() + 1; // add 1 to account for 0-based months
            if (yearInput) {
                newYear += parseInt(yearInput);
            }
            if (monthInput) {
                newMonth += parseInt(monthInput);
                if (newMonth > 12) {
                    // adjust year and month values if newMonth overflows into a new year
                    newYear += Math.floor((newMonth - 1) / 12);
                    newMonth = (newMonth - 1) % 12 + 1;
                }
            }

            // Set new date value, subtracting 15 days
            let newDate = new Date(newYear, newMonth - 1, date.getDate());
            newDate.setDate(newDate.getDate() - 14);

            // Convert new date to string in the same format as the input date
            let newDateStr = newDate.toISOString().substr(0, 10);

            // Set the new date input value
            document.getElementById("new-date-input").value = newDateStr;
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
    <script src="{{url('js/image.js')}}"></script>
</body>

</html>