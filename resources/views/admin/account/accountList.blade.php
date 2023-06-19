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
                                <h2 class="title-1 fw-bold">Admin List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('product#create') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Admin
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    {{-- search categoryname --}}
                    <div class="mb-3 col-3 offset-9">
                        <form action="{{ route('admin#list') }}" method="get" class="d-flex">
                            @csrf
                            <input type="text" name="key" class="form-control" value="{{ request('key') }}" placeholder="Search...">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>

                    {{-- Category Total --}}
                    <div class="mb-3 col-3 offset-10">
                        <h4 class="text-primary">Product: <span class="text-danger">{{ $adminAccounts->total() }}</span></h4>
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

                    @if (session('changeRole'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="">{{ session('changeRole')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (count($adminAccounts) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table text-center table-data2">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Account Name</th>
                                        <th>Email</th>
                                        <th>Created_Date</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($adminAccounts as $account)
                                        <tr class="tr-shadow">
                                            <td class="col-1">
                                                @if ($account->image == null)
                                                    @if ($account->gender == 'male')
                                                        <img src="{{ asset('image/default_profile.png')}}" alt="" class=" img-thumbnail">
                                                    @else
                                                        <img src="{{ asset('image/female_default.jpg')}}" alt="" class=" img-thumbnail">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/'.$account->image)}}" alt="" class=" img-thumbnail">
                                                @endif
                                            </td>
                                            <td>{{ $account->name }}</td>
                                            <td>{{ $account->email }}</td>
                                            <td>{{ $account->created_at->format('j-F-Y') }}</td>
                                            <td>
                                                <div class="table-data-feature">

                                                    @if (Auth::user()->id == $account->id)
                                                        <span class="text-primary fw-bold">Actived</span>
                                                    @else
                                                        <a href="{{ route('admin#detail', $account->id) }}">
                                                            <button class="item me-2" data-toggle="tooltip" data-placement="top" title="View">
                                                                <i class="zmdi zmdi-apps text-warning"></i>
                                                            </button>
                                                        </a>

                                                        <a href="{{ route('admin#delete',$account->id) }}">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete text-danger"></i>
                                                            </button>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $adminAccounts->links()}}
                            </div>
                        </div>
                    @else
                        <h3 class="mt-5 text-center text-secondary">Searching worng!!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
