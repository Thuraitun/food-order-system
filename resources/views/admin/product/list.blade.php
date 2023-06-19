@extends('admin.layouts.master')

@section('title','CategoryList')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1 fw-bold">Product List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('product#create') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Product
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    {{-- search categoryname --}}
                    <div class="mb-3 col-3 offset-9">
                        <form action="{{ route('product#list') }}" method="get" class="d-flex">
                            @csrf
                            <input type="text" name="key" class="form-control" value="{{ request('key') }}" placeholder="Search...">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>

                    {{-- Category Total --}}
                    <div class="mb-3 col-3 offset-10">
                        <h4 class="text-primary">Product: {{ $products->total() }} </h4>
                    </div>


                    {{-- Alert --}}
                    @if (session('createSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="">{{ session('createSuccess')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (session('deleteSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="">{{ session('deleteSuccess')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (count($products) != 0)

                        <div class="table-responsive table-responsive-data2">
                            <table class="table text-center table-data2">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Category ID</th>
                                        <th>Created_Date</th>
                                        <th>View Count</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $product)
                                        <tr class="tr-shadow">
                                            <td><img src="{{ asset('storage/'.$product->image) }}" class="shadow-sm col-4 img-thumbnail" alt="product"></td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->created_at->format('j-F-Y') }}</td>
                                            <td>{{ $product->view_count}}</td>
                                            <td>
                                                <div class="table-data-feature">

                                                    <a href="{{ route('product#detail', $product->id)}}">
                                                        <button class="item me-2" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="zmdi zmdi-apps text-warning"></i>
                                                        </button>

                                                    </a>

                                                    <a href="{{ route('product#edit', $product->id) }}">
                                                        <button class="me-2 item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit text-primary"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('product#delete', $product->id)}}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete text-danger"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $products->links()}}
                            </div>
                        </div>
                    @else
                        <h3 class="mt-5 text-center text-secondary">There is no product here....</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
@endsection
