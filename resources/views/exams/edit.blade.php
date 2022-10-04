@extends('layouts.app')

@section('title')
Modifier Examen - {{$exam->name}}
@endsection

@section('content')

    <div class="header bg-primary pb-6 pt-6">
        <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Modifier Examen</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">Modifier Examen</li> --}}
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
                        <h3 class="text-white mb-0">Examen</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.exams.update',$exam)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <h6 class="heading-small text-muted mb-4">{{ __('Information') }}</h6>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Nom (FR)') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex : Glicerine') }}" value="{{ old('name') ?? $exam->name}}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('non') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Non (HT)') }}</label>
                                        <input type="text" name="non" id="input-name" class="form-control form-control-alternative{{ $errors->has('non') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex : Gliserin ( Sik )') }}" value="{{ old('non')?? $exam->non }}" required autofocus>

                                        @if ($errors->has('non'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('non') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h4 class="text-muted">Normalité entre :</h4>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('from') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('De') }}</label>
                                        <input type="number" name="from" id="input-name" class="form-control form-control-alternative{{ $errors->has('from') ? ' is-invalid' : '' }}" value="{{ old('from')?? $exam->normal_from }}" required  step="any">

                                        @if ($errors->has('from'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('from') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('to') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('A') }}</label>
                                        <input type="number" name="to" id="input-name" class="form-control form-control-alternative{{ $errors->has('to') ? ' is-invalid' : '' }}" value="{{ old('to')?? $exam->normal_to }}"  step="any" >

                                        @if ($errors->has('to'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('to') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('val') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Exprimer en') }}</label>
                                        <input type="text" name="val" id="input-name" class="form-control form-control-alternative{{ $errors->has('val') ? ' is-invalid' : '' }}" value="{{ old('val')?? $exam->val }}" placeholder="Ex: g/L" required  step="any">

                                        @if ($errors->has('val'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('val') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <h6 class="heading-small text-muted">{{ __('Active') }}</h6>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="1" <?php if($exam->active==1){ echo "checked";}?>>
                                        <label class="form-check-label text-white" for="exampleRadios1">
                                          OUI
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="0" <?php if($exam->active==0){ echo "checked";}?>>
                                        <label class="form-check-label text-white" for="exampleRadios2">
                                          NON
                                        </label>
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
