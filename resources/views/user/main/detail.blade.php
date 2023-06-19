@extends('user.layouts.master')

@section('content')
    <!-- Shop Detail Start -->
    <div class="pb-5 container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-75 h-75" src="{{ asset("storage/$product->image") }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-auto col-lg-7 mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product->name }}</h3>
                    <div class="mb-1 d-flex">
                        {{-- <div class="mr-2 text-primary">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div> --}}
                        <p class="pt-1">{{ $product->view_count }} <i class="fa-solid fa-eye ms-2 text-danger"></i></p>
                    </div>
                    <h3 class="mb-4 font-weight-semi-bold">{{ $product->price }} kyats</h3>
                    <p class="mb-4">{{ $product->description }}</p>

                    <div class="pt-2 mb-4 d-flex align-items-center">
                        <div class="mr-3 input-group quantity" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-warning btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="text-center border-0 form-control" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-warning btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <button class="px-3 btn btn-warning"><i class="mr-1 fa fa-shopping-cart"></i> Add To
                            Cart</button>
                    </div>
                    <div class="pt-2 d-flex">
                        <strong class="mr-2 text-dark">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="px-2 text-primary" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="px-2 text-primary" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="px-2 text-primary" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="px-2 text-danger" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5 ms-5">
            <a href="{{ route('user#home') }}">
                <button class="btn btn-warning"><i class="fa-solid fa-arrow-left me-2"></i>Back</button>
            </a>
        </div>
    </div>
    <!-- Shop Detail End -->

@endsection

