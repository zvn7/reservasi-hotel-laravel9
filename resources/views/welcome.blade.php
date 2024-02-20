<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/svg/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/iconly.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .ratings{
            margin-right:10px;
        }

        .ratings i{

            color:#cecece;
            font-size:32px;
        }

        .rating-color{
            color:#fbc634 !important;
        }

        .review-count{
            font-weight:400;
            margin-bottom:2px;
            font-size:24px !important;
        }

        .small-ratings i{
        color:#cecece;
        }

        .review-stat{
            font-weight:300;
            font-size:18px;
            margin-bottom:2px;
        }

        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            z-index: 999;
        }

        .main-navbar .btn-mode {
            margin-left: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .bg-contact {
            background-color: #dedef4;
        }

        @media (min-width: 1200px) {
            .header-top {
                display: none;
            }
        }

        @media (max-width: 1199.98px) {
            .hide {
                display: none;
            }
        }


    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/initTheme.js"></script>
    <!-- Start content here -->
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-3">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <h3 class="header-title">Hotel Reservation</h3>
                        </div>
                        <div class="header-top-right">
                            {{-- button login --}}
                            @if (Route::has('login'))
                                <div class="hidden">
                                    @auth
                                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    @endauth
                                </div>
                            @endif
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar fixed-top">
                    <div class="container">
                        <ul class="nav-list">
                            <li
                                class="logo hide">
                                <h3 class="header-title text-white">Hotel Reservation</h3>
                            </li>
                            <li
                                class="menu-item  ">
                                <a href="#" class='menu-link'>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li
                                class="menu-item  ">
                                <a href="#about" class='menu-link'>
                                    <span>About</span>
                                </a>
                            </li>
                            <li
                                class="menu-item  ">
                                <a href="#contact" class='menu-link'>
                                    <span>Contact Us</span>
                                </a>
                            </li>

                            <div class="btn-mode hide">
                                <div class="theme-toggle d-flex gap-2 align-items-center mt-2 mx-4 text-white hide">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                        role="img" class="iconify iconify--system-uicons" width="20" height="20"
                                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                                opacity=".3"></path>
                                            <g transform="translate(-210 -1)">
                                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <div class="form-check form-switch fs-6">
                                        <input class="form-check-input  me-0 hide" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                        <label class="form-check-label hide"></label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                        role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                        </path>
                                    </svg>
                                </div>
                                {{-- button login --}}
                                @if (Route::has('login'))
                                    <div class="hidden">
                                        @auth
                                            <a href="{{ url('/home') }}" class=" text-sm text-gray-700 dark:text-gray-500 underline hide">Home</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-light hide">Login</a>
                                        @endauth
                                    </div>
                                @endif
                                {{-- <a href="#" class="burger-btn d-block d-xl-none">
                                    <i class="bi bi-justify fs-3"></i>
                                </a> --}}
                            </div>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Back to top button -->
            <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top">
                <i class="bi bi-arrow-up-circle"></i>
            </button>

            <div class="content-wrapper container mt-3">
                <div class="page-content mt-5">
                    <div class="carousel mt-5">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carouselfade">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./img/carousel1.jpg" class="d-block w-100" style="height: 600px" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Luxury Retreat</h5>
                                        <p>Immerse yourself in the elegance of our first-class accommodations.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/carousel2.jpg" class="d-block w-100" style="height: 600px" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Seaside Serenity</h5>
                                        <p>Wake up to breathtaking views in our coastal haven.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/carousel3.jpg" class="d-block w-100" style="height: 600px" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Urban Oasis</h5>
                                        <p>Experience the city from a new perspective at our sophisticated hotel.</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                    <section class="content">
                        <section id="groups">
                            <div class="row match-height">
                                <div class="col-12 mt-5 mb-1">
                                    <h3 class="section-title text-uppercase">Pilihan Kamar</h3>
                                </div>
                            </div>
                            <div class="row match-height">
                                <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <img class="card-img-top img-fluid" src="./img/single.jpg" alt="Card image cap"/>
                                            <div class="card-body">
                                                <h4 class="card-title">Single</h4>
                                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <div class="ratings">
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <img class="card-img-top img-fluid" src="./img/double.jpg" alt="Card image cap"/>
                                            <div class="card-body">
                                                <h4 class="card-title">Double</h4>
                                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <div class="ratings">
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <img class="card-img-top img-fluid" src="./img/family.jpg" alt="Card image cap"/>
                                            <div class="card-body">
                                                <h4 class="card-title">Family</h4>
                                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <div class="ratings">
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                        <i class="fa fa-star rating-color"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="gallery" class="mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="section-title">Destinasi Pilihan</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100 active" src="https://images.unsplash.com/photo-1633008808000-ce86bff6c1ed?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyN3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80" data-bs-target="#Gallerycarousel" data-bs-slide-to="1">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100" src="https://images.unsplash.com/photo-1632951634308-d7889939c125?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0M3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" data-bs-target="#Gallerycarousel" data-bs-slide-to="2">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100" src="https://images.unsplash.com/photo-1632949107130-fc0d4f747b26?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw3OHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" data-bs-target="#Gallerycarousel" data-bs-slide-to="3">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="row mt-2 mt-md-4 gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100 active" src="https://images.unsplash.com/photo-1633008808000-ce86bff6c1ed?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyN3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80" data-bs-target="#Gallerycarousel" data-bs-slide-to="1">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100" src="https://images.unsplash.com/photo-1632951634308-d7889939c125?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0M3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" data-bs-target="#Gallerycarousel" data-bs-slide-to="2">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100" src="https://images.unsplash.com/photo-1632949107130-fc0d4f747b26?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw3OHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" data-bs-target="#Gallerycarousel" data-bs-slide-to="3">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="galleryModalTitle">Our Gallery Example</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                                    </div>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="https://images.unsplash.com/photo-1633008808000-ce86bff6c1ed?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyN3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="https://images.unsplash.com/photo-1632951634308-d7889939c125?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0M3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="https://images.unsplash.com/photo-1632949107130-fc0d4f747b26?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw3OHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                </a>
                                                <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="about" class="mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card bg-primary">
                                        <div class="card-header bg-primary">
                                            <h2 class="text-white text-center">About Us</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- Feature 1 -->
                                                <div class="col-md-4 mb-4">
                                                    <div class="card bg-white p-4">
                                                        <div class="card-header text-center">
                                                            <i class="bi bi-building text-primary" style="font-size: 50px"></i>
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="text-center">Luxurious Accommodations</h3>
                                                            <p class="text-center">Experience the epitome of comfort in our elegantly designed rooms.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Feature 2 -->
                                                <div class="col-md-4 mb-4">
                                                    <div class="card bg-white p-4">
                                                        <div class="card-header text-center">
                                                            <i class="bi bi-award text-primary" style="font-size: 50px"></i>
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="text-center">Award-Winning Services</h3>
                                                            <p class="text-center">Our dedicated team ensures exceptional service to make your stay memorable.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Feature 3 -->
                                                <div class="col-md-4 mb-4">
                                                    <div class="card bg-white p-4">
                                                        <div class="card-header text-center">
                                                            <i class="bi bi-globe text-primary" style="font-size: 50px"></i>
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="text-center">Prime <br> Locations</h3>
                                                            <p class="text-center">Strategically located in beautiful destinations for a perfect getaway.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="contact" class="mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card bg-contact">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <h3>Contact Us</h3>
                                                    </div>
                                                    <form class="mt-5">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label text-dark">Name</label>
                                                            <input type="text" class="form-control" id="name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label text-dark">Email</label>
                                                            <input type="email" class="form-control" id="email">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message" class="form-label text-dark">Message</label>
                                                            <textarea class="form-control" id="message" rows="5"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <h3>Our Location</h3>
                                                        <p class="text-dark">Daerah Khusus Ibukota Jakarta</p>
                                                    </div>
                                                    <div class="googlemaps">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.49131650807!2d106.6647043584382!3d-6.229720928695747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1704630931430!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </div>

            <footer>
                <div class="container mt-5">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; Mazer by <a href="https://saugi.me">Saugi</a></p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Ilham M</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- End content -->
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/components/dark.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/pages/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
        if ( document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
        {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>



    <script>
        // Responsive burger btn onclick
        document.querySelector(".burger-btn").addEventListener("click", (e) => {
            e.preventDefault()
            let navbar = document.querySelector(".main-navbar")
            navbar.classList.toggle('active')
        })

        window.onload = () => checkWindowSize()
        window.addEventListener("resize", (event) => {
                checkWindowSize()
        })

        function checkWindowSize() {
            if (window.innerWidth < 1200) listener()
            if (window.innerWidth > 1200)
                document.querySelector(".main-navbar").style.display = ""
        }

        function listener() {
            let menuItems = document.querySelectorAll(".menu-item.has-sub")
            menuItems.forEach((menuItem) => {
                menuItem.querySelector(".menu-link").addEventListener("click", (e) => {
                e.preventDefault()
                let submenu = menuItem.querySelector(".submenu")
                submenu.classList.toggle("active")
                })
            })

            // Three level menu event listener
            let submenuItems = document.querySelectorAll(".submenu-item.has-sub")

            submenuItems.forEach((submenuItem) => {
                submenuItem
                .querySelector(".submenu-link")
                .addEventListener("click", (e) => {
                    e.preventDefault()
                    submenuItem.querySelector(".subsubmenu").classList.toggle("active")
                })
            })
        }

    </script>

</body>

</html>
