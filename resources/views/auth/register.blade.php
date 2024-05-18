<!doctype html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Layanan Rekam Medis">
    <meta name="author" content="Puskesmas">
    <meta name="keyword" content="Rekam Medis">
    <link rel="icon" href="{{ asset('snacked/ltr/assets/images/favicon/favicon-32x32.png') }}" type="image/png" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .biru {
            color: #1a7df7;
        }

        /* Untuk browser modern */
        ::placeholder {
            color: blue;
        }

        /* Untuk browser yang lebih lama */
        input::-webkit-input-placeholder {
            color: blue;
        }

        input::-moz-placeholder {
            color: blue;
        }

        input:-ms-input-placeholder {
            color: blue;
        }
    </style>
</head>

<body class="img js-fullheight" style="background-image:url({{ asset('bg.png') }});object-fit:cover">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="mt-4 mb-0 text-center col-md-6">
                    {{-- <img src="{{ asset('puskesmas.png') }}" style="width: 120px;"> --}}
                    <img src="{{ asset('logooo.png') }}" style="width: 150px;">
                    {{-- <div class="mt-3"> --}}
                    <h2 class="heading-section">
                        <span class="biru"
                            style="margin-left: 10px; font-weight: bold; font-family: 'Teko', sans-serif; font-size: 40pt">Pendaftaran
                        </span>
                    </h2>
                    {{-- </div> --}}
                </div>
            </div>
            <div class="mt-4 row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="p-0 login-wrap">
                        <h6 class="mb-4 text-center biru"><b>Lengkapi Form Dibawah Ini</b> </h6>
                        <form action="{{ route('register.store') }}" class="signin-form" id="flogin"
                            onsubmit="return lsogin();" method="post" accept-charset="utf-8">
                            @csrf

                            <x-validation-errors class="mb-4" />

                            @if (session('status'))
                                <div class="mb-4 text-sm font-medium text-danger">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Nama"
                                    id="name" autofocus required>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    id="email" autofocus required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="telepon" placeholder="Nomor WhatsApp"
                                    id="telepon" autofocus required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="telepon_confirmation"
                                    placeholder="Konfirmasi Nomor WhatsApp" id="telepon_confirmation" autofocus
                                    required>
                            </div>
                            <div class="form-group">
                                @if (request('ref') ?? '' != '')
                                    <input type="ref" class="form-control" name="ref" placeholder="Kode Referal"
                                        id="ref">
                                @else
                                    <input type="ref" readonly class="form-control" name="ref"
                                        placeholder="Kode Referal" id="ref" value="{{ request('ref') }}">
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="px-3 form-control btn submit" id="flogin_tb_ok"
                                    style="background-color: rgb(51, 88, 244) !important;
                               background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;
                               background-size: 210% 210%;
                               background-position: 100% 0;
                               transition: all .15s ease;
                               box-shadow: none;
                               color: #fff;"><b>Daftar</b>
                                </button>
                                <a href="/login" class="px-3 mt-3 form-control btn btn-warning" id="flogin_tb_ok"
                                    style="background-color: rgb(176, 27, 27) !important;
                                    background-image: linear-gradient(to left bottom, rgb(176, 27, 27), rgb(227, 102, 102), rgb(220, 103, 103)) !important;
                                    background-size: 210% 210%;
                                    background-position: 100% 0;
                                    transition: all .15s ease;
                                    box-shadow: none;
                                    color: #fff;">
                                    <div class="mt-1">
                                        <span><b>Sudah
                                                Punya Akun</b></span>
                                    </div>
                                </a>
                                {{-- <a href="/login" class="px-3 mt-3 form-control btn btn-warning" id="">
                                    <div class="mt-1">
                                        <b>Sudah
                                            Punya Akun</b>
                                    </div>

                                </a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="pt-3 bg-transparent container-fluid client">
            <div class="container text-center">
                <span class="small float-center" style="font-size: 10px; color:#fff;"><b>&copy;2023
                        <?php if (date('Y') == 2023) {
                            echo '';
                        } else {
                            echo '- ' . date('Y');
                        }
                        ?>
                        . Puskesmas</b></span>
            </div>
        </div> --}}
    </section>
    <script src="{{ asset('jquery.min.js') }}"></script>

    <script>
        $(function() {
            $(".alert").delay(3000).slideUp(300);
        });
    </script>
    <script type="text/javascript">
        (function($) {
            "use strict";
            var fullHeight = function() {
                $('.js-fullheight').css('height', $(window).height());
                // $(window).resize(function () {
                // 	$('.js-fullheight').css('height', $(window).height());
                // });
            };
            fullHeight();
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        })(jQuery);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        function sweetAlert() {
            Swal.fire({
                title: "Berhasil!",
                text: "Silahkan cek WhatsApp Anda untuk melihat username dan password.",
                icon: "success"
            });
        }

        @if (session('status'))
            sweetAlert();
        @endif
    </script>

    <!-- Javascript Requirements -->
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\userCreateValidation') !!}

</body>

</html>
