@extends('user.layouts.master')

@section('content')
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="mb-3 section-title position-relative text-uppercase"><span class="pr-3">All Categories</span><span class="border badge font-weight-normal text-dark">{{ count($categories) }}</span></h5>
                <div class="p-4 bg-light mb-30">
                    <form>
                        {{-- <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label class="" >All Categories</label>
                            <span class="border badge font-weight-normal">{{ count($categories) }}</span>
                        </div> --}}
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <a href="{{ route('user#home')}}" class="text-dark"><label class="">All</label></a>
                        </div>
                        @foreach ($categories as $category)
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <a href="{{ route('user#filter',$category->id)}}" class="text-dark"><label class="">{{ $category->name }}</label></a>
                            </div>
                        @endforeach
                    </form>
                </div>
                <!-- Price End -->


                <div class="">
                    <button class="btn btn-warning w-100">Order</button>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="pb-3 row">
                    <div class="pb-1 col-12">
                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="ml-2 btn btn-sm btn-light"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Ascending</a>
                                        <a class="dropdown-item" href="#">Descending</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- All products --}}
                    @if (count($products) != 0)
                        @foreach ($products as $product )
                            <div class="pb-1 col-lg-4 col-md-6 col-sm-6">
                                <div class="mb-4 product-item bg-light">
                                    <div class="overflow-hidden product-img position-relative">
                                        <img class="img-fluid w-100" style="height:270px" src="{{ asset("storage/$product->image") }}" alt="">
                                        <div class="product-action">
                                            <a class="btn btn-outline-dark" href=""><i class="fa fa-shopping-cart"></i></a>
                                            <a class="btn btn-outline-dark" href="{{ route('product#detail',$product->id)}}"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="py-4 text-center">
                                        <a class="h6 text-decoration-none text-truncate fw-bold" href="">{{ $product->name }}</a>
                                        <div class="mt-2 d-flex align-items-center justify-content-center">
                                            <h6>{{ $product->price }} kyats</h6>
                                        </div>
                                        <div class="mb-1 d-flex align-items-center justify-content-center">
                                            <small class="mr-1 fa fa-star text-warning"></small>
                                            <small class="mr-1 fa fa-star text-warning"></small>
                                            <small class="mr-1 fa fa-star text-warning"></small>
                                            <small class="mr-1 fa fa-star text-warning"></small>
                                            <small class="mr-1 fa fa-star text-warning"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="my-5 text-center text-danger fs-5">This is no product !!</p>
                    @endif

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection
