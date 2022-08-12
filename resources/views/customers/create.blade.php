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
                    <div class="card-body">

                        <form action="{{route('admin.customers.store')}}" method="POST">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Information Utilisateur') }}</h6>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Nom') }}</label>
                                        <input type="text" name="lastname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex : Jhon') }}" value="{{ old('lastname')}}" required autofocus>

                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Prénom') }}</label>
                                        <input type="text" name="firstname" id="input-name" class="form-control form-control-alternative{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex : Doe') }}" value="{{ old('firstname') }}" required autofocus>

                                        @if ($errors->has('firstname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Téléphone') }}</label>
                                        <input type="text" name="phone" id="input-name" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex: +509 5555 5555') }}" value="{{ old('phone') }}" required autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <h6 class="heading-small text-muted mb-4">{{ __('Identification') }}</h6>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Type de Carte') }}</label>

                                        <select class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="type" required>
                                            <option value="">Sélectionnez une carte</option>
                                            <option value="CIN">CIN</option>
                                            <option value="NIF">NIF</option>
                                            <option value="Passeport">Passeport</option>
                                        </select>

                                        @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Numéro de Carte') }}</label>
                                        <input type="text" name="number" id="input-name" class="form-control form-control-alternative{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="{{ __('84834-53453') }}" value="{{ old('number') }}" required autofocus>

                                        @if ($errors->has('number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center align-items-center mt-4 mb-5">
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
