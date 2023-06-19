@extends('admin.layouts.master')

@section('title','CategoryList')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center fw-bold title-2">Account Update</h3>
                            </div>
                            <hr>

                            <form action="{{ route('account#update', Auth::user()->id)  }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="d-flex justify-content-center">
                                    <div class="w-25">
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
                                </div>

                                <div class="mt-3 row justify-content-center">
                                    <div class="col-6">

                                        <div class="mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('accountName', Auth::user()->name) }}">
                                            @error('name')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="gender">Gender</label>
                                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">Choose Gender...</option>
                                                <option value="male" @if(Auth::user()->gender == 'male') selected @endif>Male</option>
                                                <option value="female" @if(Auth::user()->gender == 'female') selected @endif>Female</option>
                                            </select>
                                            @error('gender')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('accountEmail', Auth::user()->email) }}">
                                            @error('email')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone">Phone</label>
                                            <input type="number" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('accountPhone', Auth::user()->phone) }}">
                                            @error('phone')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{ old('accountAddress', Auth::user()->address) }}</textarea>
                                            @error('address')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Account Update</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
