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
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('admin#list')}}"><button class="my-3 text-white btn bg-primary">Back</button></a>
                    </div>
                </div>
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center text-warning title-2">Other Account Profile</h3>
                            </div>
                            <hr>
                            <div class="row d-flex align-items-center">
                                <div class="rounded-full col-5 ms-5">
                                    @if ($account->image == null)
                                        @if ($account->gender == 'male')
                                            <img src="{{ asset('image/default_profile.png')}}" alt="" class="">
                                        @else
                                            <img src="{{ asset('image/female_default.jpg')}}" alt="" class="">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/'.$account->image)}}" alt="" class="">
                                    @endif
                                </div>

                                <div class="mt-5 col-5 ps-3">
                                    <div class="mb-3">
                                        <h4 class="text-primary">Name:</h4>
                                        <p class="font-italic text-muted">{{ $account->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Gender:</h4>
                                        <p class="font-italic text-muted">{{ $account->gender }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Email:</h4>
                                        <p class="font-italic text-muted">{{ $account->email}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Phone:</h4>
                                        <p class="font-italic text-muted">{{ $account->phone}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Address:</h4>
                                        <p class="font-italic text-muted">{{ $account->address}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="text-primary">Date:</h4>
                                        <p class="font-italic text-muted">{{ $account->created_at->format('j-F-Y')}}</p>
                                    </div>
                                </div>
                                <div class="mt-5 ms-5">
                                    <a href="{{ route('admin#changeRole',$account->id)}}">
                                        <button class="btn btn-warning">Change Role</button>
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
