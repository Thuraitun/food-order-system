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
                                <h2 class="title-1 fw-bold">Category List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('category#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Category
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    {{-- search categoryname --}}
                    <div class="mb-3 col-3 offset-9">
                        <form action="{{ route('category#list') }}" method="get" class="d-flex">
                            @csrf
                            <input type="text" name="key" class="form-control" value="{{ request('key') }}" placeholder="Search...">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>

                    {{-- Category Total --}}
                    <div class="mb-3 col-3 offset-10">
                        <h4 class="text-primary">Category: {{ $categories->total() }}</h4>
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

                    @if(count($categories) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table text-center table-data2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Created_Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="tr-shadow">
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->created_at->format('j-F-Y') }}</td>
                                            <td>
                                                <div class="table-data-feature">

                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                        <i class="zmdi zmdi-apps"></i>
                                                    </button> --}}

                                                    <a href="{{ route('category#edit', $category->id)}}">
                                                        <button class="me-3 item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit text-primary"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('category#delete',$category->id) }}">
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
                        </div>
                        <div class="mt-3">
                            {{ $categories->links()}}
                        </div>
                    @else
                        <h3 class="mt-5 text-center text-secondary">This no Category here !!</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
@endsection
