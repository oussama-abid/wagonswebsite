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
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }




        table tr:not(:first-child) {
            cursor: pointer;
            transition: all .25s ease-in-out;
        }

        table tr:not(:first-child):hover {
            background-color: #ddd;
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
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            <a class="btn-book-a-table" href="/">Startseite</a>



        </div>
    </header><!-- End Header -->



    <main id="main">








        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table" style="margin-top: 50PX;">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Wagen Hinzufügen</h2>
                    <p>Neuen <span>Wagen</span> Hinzufügen</p><br>


                </div>

                <div class="row g-0">

                    <div class="col-lg-4 reservation-img s" style="background-image: url('https://i.ibb.co/JtBcVfZ/img2.webp');" data-aos="zoom-out" data-aos-delay="200"></div>

                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" action="{{route('wagons', ['zug' => $zug->id]) }} " method="post">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-9 col-md-6">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-box-arrow-in-down"></i></a>

                                    <div class="input-container">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModa2" class="icon"><i class="bi bi-camera "></i></a>
                                        <input type="text" minlength="16" maxlength="16" required id="input-rs"  class="form-control input-field" placeholder="Wagen Nummer : Z.B 33 80 51 6470 564-6" data-rule="minlen:4" @error('wagennummer') value="{{  rtrim(old('wagennummer')) }}" @enderror>
                                        <input type="text" hidden id="wagennummer" maxlength="11" name="wagennummer" >
                                    </div>
                                    <div id="error-message" style="display:none; color:red;">
                                        Bitte geben Sie eine gültige 12-stellige wagennummer ein.
                                    </div>
                                    @error('wagennummer')
                                    <div style="color:red;">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required @error('wagennummer') value="{{  old('gattungsbuchstabe') }}" @enderror type="text" id="gattungsbuchstabe" name="gattungsbuchstabe" class="form-control" placeholder="Gattungsbuchstabe" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>

                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" class="form-control" @error('wagennummer') value="{{  old('längeüberpuffer') }}" @enderror name="längeüberpuffer" id="längeüberpuffer" placeholder="Länge über puffer (LüP)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="längeüberpuffererror" style="display:none; color:red;">
                                        Bitte geben Sie gültige lüp ein.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" name="eigenmasse" @error('wagennummer') value="{{  old('eigenmasse') }}" @enderror id="eigenmasse" class="form-control" placeholder="Eigenmasse (T)" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="eigenmasseerror" style="display:none; color:red;">
                                        Bitte geben Sie gültige Eigenmasse ein.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" class="form-control" @error('wagennummer') value="{{  old('AnzahlderAcshen') }}" @enderror name="AnzahlderAcshen" id="AnzahlderAcshen" placeholder="Anzahl der Acshen" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div id="AnzahlderAcshenerror" style="display:none; color:red;">
                                        Bitte geben Sie gültige Anzahl der Acshen ein.
                                    </div>

                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" class="form-control" @error('wagennummer') value="{{  old('GewichtderLadung') }}" @enderror name="GewichtderLadung" id="GewichtderLadung" placeholder="Gewicht der Ladung" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div id="GewichtderLadungerror" style="display:none; color:red;">
                                        Bitte geben Sie gültige Gewicht der Ladung ein.
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <input required type="text" class="form-control" @error('wagennummer') value="{{  old('Bremsgewicht') }}" @enderror name="Bremsgewicht" id="Bremsgewicht" placeholder=" Bremsgewicht" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                                    <div id="Bremsgewichterror" style="display:none; color:red;">
                                        Bitte geben Sie gültige Bremsgewicht ein.

                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <label for="lastwechselundbremsgewicht">lastwechsel und bremsgewicht</label>
                                    <select class="form-control" name="lastwechselundbremsgewicht" id="lastwechselundbremsgewicht">
                                        @error('wagennummer')
                                        <option value="{{  old('lastwechselundbremsgewicht') }}">{{old('lastwechselundbremsgewicht')}}</option>
                                        @enderror
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
                                        @error('wagennummer')
                                        <option value="{{  old('bremsstellung') }}">{{old('bremsstellung')}}</option>
                                        @enderror
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
                                    <label for="bemerkungenzurfeststellbremse">bemerkungen zur feststellbremse </label>
                                    <select class="form-control" name="bemerkungenzurfeststellbremse" id="bemerkungenzurfeststellbremse">
                                        @error('wagennummer')
                                        <option value="{{  old('bemerkungenzurfeststellbremse') }}">{{old('bemerkungenzurfeststellbremse')}}</option>
                                        @enderror
                                        <option value="Keine">Keine</option>
                                        <option value="bühnenbedienbar">bühnenbedienbar</option>
                                        <option value="bodenbedienbar">bodenbedienbar</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <fieldset class="form-check">
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
                                        @error('wagennummer')
                                        <script>
                                            document.getElementById('Schadwagen').disabled = false;
                                        </script>
                                        <option value="{{  old('Schadwagen') }}">{{old('Schadwagen')}}</option>
                                        @enderror
                                        <option value=""></option>
                                        <option value="Muster M">Muster M</option>
                                        <option value="Muster K">Muster K</option>
                                        <option value="Muster K + R1">Muster K + R1</option>
                                        <option value="Muster V">Muster V</option>
                                        <option value="Muster I">Muster I</option>
                                    </select>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <div class="form-check form-check-inline">

                                        <label class="form-check-label" for="inlineCheckbox3">Beladen mit gefahrgut </label> <input type="checkbox" name="Beladenmitgefahrgut" id="checkbox2">
                                    </div>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-5 col-md-6">

                                    <input type="text" class="form-control" name="UNNummer" id="UNNummer" @error('wagennummer') value="{{  old('UNNummer') }}" @enderror placeholder="UN-Nummer" data-rule="email" data-msg="Please enter a valid email" disabled>
                                    @error('wagennummer')
                                    <script>
                                        document.getElementById('UNNummer').disabled = false;
                                    </script>
                                    @enderror
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
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-6"> <input name="wagennummerser" type="text" placeholder="Wagennummer" class="form-control" onkeyup="myFunction1()" id="wagennummerser"></div>

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
                                @foreach ($list as$key => $li)
                                <tr>
                                    <td hidden> {{ $li->zugnummer}}</td>
                                    <td hidden> {{ $li->versandbanhof}}</td>
                                    <td hidden> {{ $li->bestimmungsbanhof}}</td>

                                    <td> {{ $li->wagennummer}} </td>
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
                        <div class="tab">
                            <button class="tablinks active" onclick="openCity(event, 'London')">1</button>
                            <button class="tablinks" onclick="openCity(event, 'Paris')">2</button>

                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cl"></button>
                    </div>
                    <div class="modal-body">

                        <div id="London" class="tabcontent" style="display:block; ">
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

                        <div id="Paris" class="tabcontent">
                            <div id="scanner-container">
                                <input type="file" id="qr" class="form-control" accept="image/*">
                                <img id="output-qr" style="display:none; width: 20%;">
                            </div>
                            <br>
                            <div id="output">
                                <form id="form-idx">
                                    @csrf
                                    <input id="resultqr" name="link"></input>
                                    <button type="submit" class="btn save">ok</button>
                                </form>
                                <br>

                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2 -->
        <script>
            $('#form-idx').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '/link',
                    data: {
                        _token: "{{ csrf_token() }}",
                        link: jQuery('#form-idx input[name="link"]').val(),
                    },
                    success: function(data) {
                        console.log(data);
                        document.getElementById("wagennummer").value = data
                        document.getElementById("cl").click();
                    }
                });
            });
        </script>
        <script>
            const inputImageqr = document.getElementById("qr");
            const resultqr = document.getElementById("resultqr");
            const outputImageqr = document.getElementById("output-qr");

            inputImageqr.addEventListener("change", function() {
                const file = inputImageqr.files[0];
                const reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = function() {
                    outputImageqr.src = reader.result;
                    outputImageqr.style.display = "block";
                    const image = new Image();
                    image.src = reader.result;

                    const canvas = document.createElement("canvas");
                    const context = canvas.getContext("2d");

                    image.onload = function() {
                        canvas.width = image.width;
                        canvas.height = image.height;
                        context.drawImage(image, 0, 0, image.width, image.height);

                        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                        const qrCode = jsQR(imageData.data, imageData.width, imageData.height);
                        if (qrCode) {
                            resultqr.value = qrCode.data;
                        }
                    };
                };

                reader.readAsDataURL(file);
            });
        </script>



        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>

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

                let input = String(this.cells[3].innerHTML.trim()); // Remove non-numeric characters
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
            if (input2.value.length !== 12 || isNaN(input2.value)) {
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
    <!-- Vendor JS Files -->
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('vendor/aos/aos.js')}}"></script>
    <script src="{{url('vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{url('vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{url('vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{url('js/main.js')}}"></script>
    <script src="{{url('js/image.js')}}"></script>
    <script>



    </script>
</body>

</html>