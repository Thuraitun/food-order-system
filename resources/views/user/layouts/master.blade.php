<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Amazing Onlin Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <!-- Topbar Start -->
    {{-- <div class="container-fluid">
        <div class="py-3 row align-items-center bg-light px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="px-2 h1 text-uppercase text-primary bg-dark">AMAZING</span>
                    <span class="px-2 h1 text-uppercase text-dark bg-primary ml-n1">Shop</span>
                </a>
            </div>
        </div>
    </div> --}}
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="mt-3 container-fluid bg-dark mb-30">
        <div class="row px-xl-5 align-items-center">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <span class="px-2 h1 text-uppercase text-warning bg-dark">AMAZING</span>
                    <span class="px-2 text-white h1 text-uppercase bg-warning ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="px-0 py-3 navbar navbar-expand-lg bg-dark navbar-dark py-lg-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="px-2 h1 text-uppercase text-dark bg-light">AMAZING</span>
                        <span class="px-2 h1 text-uppercase text-light bg-primary ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="py-0 mr-auto navbar-nav">
                            <a href="{{ route('user#home') }}" class="nav-item nav-link">Home</a>
                            <a href="cart.html" class="nav-item nav-link">My Cart</a>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="py-0 ml-auto navbar-nav d-none d-lg-block">
                            <a href="" class="px-0 btn">
                                <i class="fas fa-heart text-warning"></i>
                                <span class="border badge text-warning border-warning rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="" class="px-0 ml-3 btn me-3">
                                <i class="fas fa-shopping-cart text-warning"></i>
                                <span class="border badge text-warning border-warning rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            {{-- <a href="" class="px-0 ml-3 fw-bold text-warning btn">
                                <span class="">{{ Auth::user()->name }}</span>
                            </a> --}}

                            <div class="dropdown-center d-inline me-5">
                                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="text-white fa-solid fa-user me-2"></i>{{ Auth::user()->name  }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('account#detail') }}">Account</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user#changePasswordPage') }}">Change Password?</a></li>
                                    <li>
                                        <span class="dropdown-item">
                                            <form action="{{ route('logout') }}" method="post" class="d-inline">
                                                @csrf
                                                <button class="w-full text-white btn bg-dark" type="submit">Logout </button>
                                            </form>
                                        </span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="pt-5 mt-5 container-fluid bg-dark text-secondary">
        <div class="pt-5 row px-xl-5">
            <div class="pr-3 mb-5 col-lg-4 col-md-12 pr-xl-5">
                <h5 class="mb-4 text-secondary text-uppercase">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="mr-3 fa fa-map-marker-alt text-warning"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="mr-3 fa fa-envelope text-warning"></i>thuraitun64@gmail.com</p>
                <p class="mb-0"><i class="mr-3 fa fa-phone-alt text-warning"></i>+959779018773</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="mb-5 col-md-4">
                        <h5 class="mb-4 text-secondary text-uppercase">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Home</a>
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Our Shop</a>
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Shop Detail</a>
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Shopping Cart</a>
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="mb-5 col-md-4">
                        <h5 class="mb-4 text-secondary text-uppercase">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Home</a>
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Our Shop</a>
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Shop Detail</a>
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Shopping Cart</a>
                            <a class="mb-2 text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="mr-2 fa fa-angle-right"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="mb-5 col-md-4">
                        <h5 class="mb-4 text-secondary text-uppercase">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-warning">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="mt-4 mb-3 text-secondary text-uppercase">Follow Us</h6>
                        <div class="d-flex">
                            <a class="mr-2 btn btn-warning btn-square" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="mr-2 btn btn-warning btn-square" href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a class="mr-2 btn btn-warning btn-square" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-warning btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4 row border-top mx-xl-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="text-center mb-md-0 text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">2023</a>. All Rights Reserved.
                </p>
            </div>
            <div class="text-center col-md-6 px-xl-0 text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-warning back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/28670fc814.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
