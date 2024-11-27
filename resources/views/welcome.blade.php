<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Sistemaga kirish | Niyat Savdo</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicons/favicon.ico">
    <link rel="manifest" href="img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="js/config.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    
        <main class="main" id="top">
            <div class="container-fluid bg-300 dark__bg-1200">
                <div class="bg-holder bg-auth-card-overlay" style="background-image:url('/img/bg/37.png');">
                </div>
                <!--/.bg-holder-->
    
                <div class="row flex-center position-relative min-vh-100 g-0 py-5">
                    <div class="col-11 col-sm-10 col-xl-8">
                        <div class="card border border-200 auth-card">
                            <div class="card-body pe-md-0">
                                <div class="row align-items-center gx-0 gy-7">
                                    <div
                                        class="col-auto bg-100 dark__bg-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                                        <div class="bg-holder" style="background-image:url('/img/bg/38.png');">
                                        </div>
                                        <!--/.bg-holder-->
    
                                        <div
                                            class="position-relative z-index--1 mb-6 d-none d-md-block text-center mt-md-15">
                                            <img class="auth-title-box-img d-dark-none"
                                                src="/img/spot-illustrations/auth.png" alt="" /><img
                                                class="auth-title-box-img d-light-none"
                                                src="/img/spot-illustrations/auth-dark.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="col mx-auto">
                                        <div class="auth-form-box">
                                            <div class="text-center mb-7">
                                                <a class="d-flex flex-center text-decoration-none mb-4" href="{{ url('/') }}">
                                                    <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block">
                                                        <img src="/img/icons/logo.png" alt="phoenix" width="58" />
                                                    </div>
                                                </a>
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
    
                                                    <!-- Username -->
                                                    <div class="mb-3 text-start">
                                                        <label class="form-label" for="username">Username</label>
                                                        <div class="form-icon-container">
                                                            <input class="form-control form-icon-input" id="username"
                                                                type="text" name="username"
                                                                value="{{ old('username') }}"
                                                                placeholder="Usernameni kiriting" required autofocus />
                                                            <span class="fas fa-user text-900 fs--1 form-icon"></span>
                                                        </div>
                                                        @error('username')
                                                            <p class="text-danger mt-1">{{ $message }}</p>
                                                        @enderror
                                                    </div>
    
                                                    <!-- Password -->
                                                    <div class="mb-3 text-start">
                                                        <label class="form-label" for="password">Parol</label>
                                                        <div class="form-icon-container">
                                                            <input class="form-control form-icon-input" id="password"
                                                                type="password" name="password" placeholder="Parolni kiriting"
                                                                required />
                                                            <span class="fas fa-key text-900 fs--1 form-icon"></span>
                                                        </div>
                                                        @error('password')
                                                            <p class="text-danger mt-1">{{ $message }}</p>
                                                        @enderror
                                                    </div>
    
    
    
                                                    <!-- Submit Button -->
                                                    <button class="btn btn-primary w-100 mt-4">{{ __('Kirish') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="vendors/feather-icons/feather.min.js"></script>
    <script src="vendors/dayjs/dayjs.min.js"></script>
    <script src="js/phoenix.js"></script>

</body>

</html>
