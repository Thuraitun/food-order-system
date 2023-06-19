@extends('admin.layouts.master')

@section('title','CategoryList')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Change Password</h3>
                            </div>

                            @if (session('noMatch'))
                                <div class="col-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="">{{ session('noMatch')}}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <form action="{{ route('admin#passwordUpdate')}}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label for="oldPassword" class="mb-1 control-label">Old Password</label>
                                    <input id="oldPassword" name="oldPassword" type="password" class="form-control  @error('oldPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your old password">
                                    @error('oldPassword')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="newPassword" class="mb-1 control-label">New Password</label>
                                    <input id="newPassword" name="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your new password">
                                    @error('newPassword')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirmPassword" class="mb-1 control-label">Confirm Password</label>
                                    <input id="confirmPassword" name="confirmPassword" type="password" class="form-control @error('confirmPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your confirm password">
                                    @error('confirmPassword')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="zmdi zmdi-key me-2"></i><span id="payment-button-amount">Change Password</span>
                                        {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
