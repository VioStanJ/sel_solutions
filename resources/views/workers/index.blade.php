@extends('layouts.app')

@section('title')
    Workers
@endsection

@section('content')

    <div class="header bg-primary pb-6 pt-6">
        <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Workers</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Workers</li>
                </ol>
                </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                <a href="{{route('admin.workers.create')}}" class="btn btn-lg btn-neutral">
                    <i class="ni ni-fat-add"></i> New Worker</a>
                {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
    <!-- Dark table -->
        <div class="row">
            <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">{{ count($workers) }} Clients</h3>
                </div>
                <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="sort" data-sort="id"></th>
                        <th scope="col" class="sort" data-sort="name">NAME</th>
                        <th scope="col" class="sort" data-sort="phone">PHONE</th>
                        <th scope="col">FORMATION</th>
                        <th scope="col" class="sort" data-sort="status">STATUS</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($workers as $item)
                            <tr>
                                <th scope="row">
                                    <a href="{{route('admin.customers.show',$item->id)}}" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="{{$item->firstname}}">
                                        <img alt="Image placeholder" src="{{$item->photo}}" >
                                    </a>
                                </th>
                                <td class="name"><b>{{$item->user->lastname}}</b> {{$item->user->firstname}}</td>
                                <td class="font-weight-bold">{{$item->user->phone}}</td>
                                <td>
                                    {{$item->formation}}
                                </td>
                                <td>
                                    @if ($item->blocked)
                                        <span class="text-warning">BLOCKED</span>
                                    @else
                                        <span class="text-success">ACTIVE</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('admin.workers.manage',$item->id)}}">Details</a>
                                            <a class="dropdown-item" href="{{route('admin.workers.edit',$item->id)}}">Modifier</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
