@extends('admin.layouts.master')

@section('title','CategoryList')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('product#list')}}"><button class="my-3 text-white btn bg-dark">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Product Create</h3>
                            </div>
                            <hr>
                            <form action="{{ route('product#createPage')}}" enctype="multipart/form-data" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label for="productName" class="mb-1 control-label">Name</label>
                                    <input id="productName" name="productName" type="text" value="{{ old('productName')}}" class="form-control @error('productName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Proudct Name...">
                                    @error('productName')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category" class="mb-1 control-label">Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">Choose your category...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="productDescription" class="mb-1 control-label">Description</label>
                                    <textarea name="productDescription" id="productDescription" cols="30" rows="10" class="form-control @error('productImage') is-invalid @enderror" aria-invalid="false" placeholder="Product Description..."></textarea>
                                    @error('productDescription')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productImage" class="mb-1 control-label">Image</label>
                                    <input id="productImage" name="productImage" type="file" value="" class="form-control @error('productImage') is-invalid @enderror" aria-required="true" aria-invalid="false">
                                    @error('productImage')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productWaitingTime" class="mb-1 control-label">Waiting Time</label>
                                    <input id="productWaitingTime" name="productWaitingTime" type="number" value="{{ old('productWaitingTime')}}" class="form-control @error('productWaitingTime') is-invalid @enderror" aria-required="true" aria-invalid="false">
                                    @error('productWaitingTime')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productPrice" class="mb-1 control-label">Price</label>
                                    <input id="productPrice" name="productPrice" type="number" value="{{ old('productPrice')}}" class="form-control @error('productPrice') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Product Price...">
                                    @error('productPrice')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="productView" class="mb-1 control-label">View Count</label>
                                    <input id="productView" name="productView" type="text" value="" class="form-control " aria-required="true" aria-invalid="false" placeholder="Category Name...">
                                </div> --}}

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Create</span>
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
