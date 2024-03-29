@extends('layouts.app', ['title' => __('Gérer Utilisateur')])

@section('title')
Getion Utilisateur - {{$customer->firstname}} {{$customer->lastname}}
@endsection

@section('css')
    <style>
        .card-plan{
            border: 2px solid green;
            border-radius: 6px;
            width: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px 6px 15px 6px;
        }
    </style>
@endsection

@section('content')

    <div class="header bg-primary pb-6 pt-6">
        <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            {{-- <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Créer Client</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Créer Client</li>
                </ol>
                </nav>
            </div> --}}
            {{-- <div class="col-lg-6 col-5 text-right">
                <a href="{{route('admin.customers.create')}}" class="btn btn-lg btn-neutral">New</a>
                <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> --}}
            </div>
        </div>
        </div>
    </div>

    <div class="container-fluid mt--5">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            {{-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a> --}}
                            {{-- <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a> --}}
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    {{-- <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Month(s)') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $customer->firstname }}, {{ $customer->lastname }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $customer->email }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ $customer->phone }}
                            </div>

                            @if (!empty($adresse))
                                <div>
                                    <i class="ni education_hat mr-2"></i>{{ $adresse->adresse.','.$adresse->commune.' '.$adresse->arrondissement.' '.$adresse->departement }}
                                </div>
                            @endif

                            <div class="mt-4">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addAdressModal">{{!empty($adress)?"Ajouter":"Modifier"}} Adresse</button>
                            </div>
                            {{-- <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{$customer->firstname}} {{$customer->lastname}}
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="card-plan">

                            @if (empty($plan))
                                <h2>Pas de Plan !</h2>
                            @else
                                <div class="flex align-items-center justify-content-center border mb-2 p-3">
                                    <h1 class="text-success">{{$plan->plan->name}}</h1>
                                    <h2>$ {{$plan->plan->price}}</h2>
                                    <h4><i class="fas fa-calendar"></i> Date d'Expiration : {{$plan->expiration_date}}</h4>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">

                                @if (empty($plan))
                                    Ajouter un Plan
                                @else
                                   Changer de Plan
                                @endif
                              </button>
                        </div>

                        <form action="" method="post">

                        </form>
                        <hr class="my-4" />

                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Plan--}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un Plan pour {{$customer->firstname.' '.$customer->lastname}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @foreach ($plans as $item)
                    <form action="{{route('admin.add.customer.plan')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$customer->id}}"/>
                        <input type="hidden" name="plan_id" value="{{$item->id}}"/>

                        <div class="flex border mb-2 p-3">
                            <h1 class="text-success">{{$item->name}}</h1>
                            <div class="row justify-content-around">
                                <h2>$ {{$item->price}}</h2>

                                <button class="btn btn-default">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </form>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

        {{-- END Modal Plan --}}

        {{-- Modal Adress --}}
        <div class="modal fade" id="addAdressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Ajouter l'Adresse du Client {{$customer->firstname.' '.$customer->lastname}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.customers.add.adress')}}" method="post">
                        @csrf
                        <input type="hidden" name="customer" value="{{$customer->id}}">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label text-black" for="input-name">{{ __('Departement') }}</label>

                                    <select class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" name="departement" id="departement" required>
                                        <option value="">Sélectionnez un departement</option>
                                        @foreach ($deps as $item)
                                            <option value="{{$item->id}}">{{$item->nom}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label text-black" for="input-name">{{ __('Arrondissement') }}</label>

                                    <select class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" name="arrondissement" id="arrondissement" required>
                                        <option value="">Sélectionnez un arrondissement</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label text-black" for="input-name">{{ __('commune') }}</label>

                                    <select class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" name="commune" id="commune" required>
                                        <option value="">Sélectionnez une commune</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('adress') ? ' has-danger' : '' }}">
                                    <label class="form-control-label text-black" for="input-name">{{ __('Adress') }}</label>
                                    <input type="text" name="adress" id="input-name" class="form-control form-control-alternative{{ $errors->has('adress') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex : 15, Rue Dessalines') }}" value="{{ old('adress')}}" required autofocus>

                                    @if ($errors->has('adress'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('adress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary">Sauvegarder</button>
                            </div>

                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        {{-- END Modal Adress --}}
        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // Get Arrondisement
            $('#departement').on('change',function(){
                let id = this.value;

                $.ajax({
                    url:"/admin/get/arrondissement/"+this.value,
                    type:'get',
                    success:function(data){
                        $('#arrondissement').empty();
                        $('#commune').empty();
                        $('#arrondissement').append(`<option value="">Sélectionnez un arrondissement</option>`);
                        $('#commune').append(`<option value="">Sélectionnez une commune</option>`);

                        data.arrondissements.forEach(element => {
                            $('#arrondissement').append(`<option value="${element.id}">${element.nom}</option>`);
                        });
                    }
                })
            });

            //Get commune
            $('#arrondissement').on('change',function(){
                let id = this.value;

                $.ajax({
                    url:"/admin/get/commune/"+this.value,
                    type:'get',
                    success:function(data){
                        $('#commune').empty();
                        $('#commune').append(`<option value="">Sélectionnez une commune</option>`);

                        data.communes.forEach(element => {
                            $('#commune').append(`<option value="${element.id}">${element.nom}</option>`);
                        });
                    }
                })
            });
        });
    </script>
@endsection
