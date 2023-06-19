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
                                <h3 class="text-center text-primary title-2">Account Profile</h3>
                            </div>
                            <hr>
                            <div class="row d-flex align-items-center">
                                <div class="col-5 ms-5">
                                    @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'male')
                                            <img src=" {{ asset('image/default_profile.png') }} " alt="profile" />
                                        @else
                                            <img src=" {{ asset('image/female_default.jpg') }} " alt="profile" />
                                        @endif
                                    @else
                                        <img src=" {{ asset('storage/'.Auth::user()->image) }} " class="rounded-circle" alt="profile" />
                                    @endif
                                </div>
                                <div class="mt-5 col-5 ps-3">
                                    <div class="mb-3">
                                        <h4 class="text-primary">Name:</h4>
                                        <p class="font-italic text-muted">{{ Auth::user()->name}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Gender:</h4>
                                        <p class="font-italic text-muted">{{ Auth::user()->gender}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Email:</h4>
                                        <p class="font-italic text-muted">{{ Auth::user()->email}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Phone:</h4>
                                        <p class="font-italic text-muted">{{ Auth::user()->phone}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Address:</h4>
                                        <p class="font-italic text-muted">{{ Auth::user()->address}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Date:</h4>
                                        <p class="font-italic text-muted">{{ Auth::user()->created_at->format('j-F-Y')}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="my-5 row justify-content-center">
                                {{-- <div class="col-4 align-items-center">
                                    <button class="btn btn-primary">Edit Profile</button>
                                </div> --}}
                                <div class="mx-auto d-grid col-5">
                                    <a href="{{ route('account#edit') }}">
                                        <button class="btn btn-primary" type="submit">Edit Profile</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
