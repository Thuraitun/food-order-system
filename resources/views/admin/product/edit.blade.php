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
                                <h3 class="text-center fw-bold title-2">Product Update</h3>
                            </div>
                            <hr>

                            <form action="{{ route('product#update')  }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="productId" value="{{ $product->id}}">

                                <div class="d-flex justify-content-center">
                                    <div class="w-25">
                                        <img src=" {{ asset('storage/'.$product->image) }} " class="img-thumbnail" alt="John Doe" />
                                    </div>
                                </div>

                                <div class="mt-3 row justify-content-center">
                                    <div class="col-6">

                                        <div class="mb-3">
                                            <label for="productImage">Image</label>
                                            <input type="file" name="productImage" id="productImage" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="productName">Name</label>
                                            <input type="text" id="productName" name="productName" class="form-control @error('productName') is-invalid @enderror" value="{{ old('productName',$product->name)}}" placeholder="Product Name...">
                                            @error('productName')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="category" class="mb-1 control-label">Category</label>
                                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                                <option value="">Choose your category...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>{{ old('categroy',$category->name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="productDescription">Description</label>
                                            <textarea name="productDescription" id="productDescription"  class="form-control @error('productDescription') is-invalid @enderror" cols="30" rows="10" placeholder="Product Description...">{{ old('productDescription',$product->description)}}</textarea>
                                            @error('productDescription')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="productPrice">Price</label>
                                            <input type="number" id="price" name="productPrice" class="form-control @error('productPrice') is-invalid @enderror" value="{{ old('productPrice',$product->price)}}" placeholder="Product Price...">
                                            @error('productPrice')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="productWaitingTime">Waiting Time</label>
                                            <input type="number" id="productWaitingTime" name="productWaitingTime" class="form-control @error('productWaitingTime') is-invalid @enderror" value="{{ old('productWaitingTime',$product->waiting_time)}}" placeholder="Waiting Time...">
                                            @error('productWaitingTime')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-info" type="submit">Product Update</button>
                                            <button class="btn btn-secondary" onclick="history.back()">Back</button>
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
