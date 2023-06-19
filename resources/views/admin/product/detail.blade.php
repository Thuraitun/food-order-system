@extends('admin.layouts.master')

@section('title','CategoryList')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="mb-3 col-3 offset-7">
                @if (session('updateSuccess'))
                    <div class="">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="">{{ session('updateSuccess')}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2 text-primary fw-bold">Product Detail</h3>
                            </div>
                            <hr>
                            <div class="">
                                <button class="btn btn-info" onclick="history.back()">Back</button>
                            </div>

                            <div class="row d-flex align-items-center">

                                <div class="col-5 ms-5">
                                    <img src=" {{ asset('storage/'.$product->image) }} " class="w-50 img-thumbnail" alt="John Doe" />
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <h4 class="mb-1 text-primary">Name</h4>
                                        <p class="font-italic text-muted">{{ $product->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="mb-1 text-primary">Category Name</h4>
                                        <p class="font-italic text-muted">{{ $product->category->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="mb-1 text-primary">Description</h4>
                                        <p class="font-italic text-muted">{{ $product->description }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="mb-1 text-primary">Price</h4>
                                        <p class="font-italic texte-muted">{{ $product->price }} kyats</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="mb-1 text-primary">Waiting Time</h4>
                                        <p class="font-italic texte-muted">{{ $product->waiting_time }} mins</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="mb-1 text-primary">View Count</h4>
                                        <p class="font-italic texte-muted">{{ $product->view_count }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="mb-1 text-primary">Date</h4>
                                        <p class="font-italic texte-muted">{{ $product->created_at->format('j-F-Y') }}</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
