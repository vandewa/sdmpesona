<!doctype html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Pesona FM">
    <meta name="author" content="BPBD>
    <meta name="keyword" content="Pesona FM">
    <link rel="icon" href="{{ asset('snacked/ltr/assets/images/favicon/favicon-32x32.png') }}" type="image/png" />
    <title>Login Pesona FM</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body class="img js-fullheight" style="background-image:url({{ asset('bg-1.jpg') }});object-fit:cover">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="mt-4 mb-0 text-center col-md-6">
                    <img src="{{ asset('pesona.jpg') }}" style="width: 120px;">
                    <h2 class="heading-section">
                        <span
                            style="margin-left: 10px; font-weight: bold; font-family: 'Teko', sans-serif; color: #ffffff; font-size: 40pt">Pesona
                            FM
                        </span>
                    </h2>
                </div>
            </div>
            <div class="mt-4 row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="p-0 login-wrap">
                        <h6 class="mb-4 text-center" style="color: #ffffff;">Masukkan Email dan Password Anda</h6>
                        <form action="{{ route('login') }}" class="signin-form" id="flogin"
                            onsubmit="return lsogin();" method="post" accept-charset="utf-8">
                            @csrf

                            <x-validation-errors class="mb-4" />

                            @if (session('status'))
                                <div class="mb-4 text-sm font-medium text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    id="flogin_username" autofocus required>
                            </div>
                            <div class="form-group">
                                <input name="password" placeholder="Password" id="flogin_password" type="password"
                                    class="form-control" required>
                                <span toggle="#flogin_password"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="px-3 form-control btn submit" id="flogin_tb_ok"
                                    style="background-color: rgb(51, 88, 244) !important;
                               background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;
                               background-size: 210% 210%;
                               background-position: 100% 0;
                               transition: all .15s ease;
                               box-shadow: none;
                               color: #fff;"><b>Login</b></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-3 container-fluid client bg-transparent">
            <div class="container text-center">
                <span class="small float-center" style="font-size: 10px; color:#fff;"><b>&copy;2024
                        <?php if (date('Y') == 2024) {
                            echo '';
                        } else {
                            echo '- ' . date('Y');
                        }
                        ?>
                        . All Right Reserved</b></span>
            </div>
        </div>
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
</body>

</html>
