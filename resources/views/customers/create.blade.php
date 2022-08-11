@extends('layouts.app')

@section('title')
Créer Client
@endsection

@section('content')

    <div class="header bg-primary pb-6 pt-6">
        <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Créer Client</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Créer Client</li>
                </ol>
                </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                {{-- <a href="{{route('admin.customers.create')}}" class="btn btn-lg btn-neutral">New</a> --}}
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
                    <h3 class="text-white mb-0">Créer Clients</h3>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection