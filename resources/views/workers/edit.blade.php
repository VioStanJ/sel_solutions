@extends('layouts.app')

@section('title')
Modifier un Travailleur
@endsection

@section('content')

    <div class="header bg-primary pb-6 pt-6">
        <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Modifier un Travailleur</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item">{{$worker->user->firstname.' '.$worker->user->lastname.' :: '.$worker->formation}}</li>
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

                        <form action="{{route('admin.workers.update',$worker->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <h6 class="heading-small text-muted mb-4">{{ __('Information Utilisateur') }}</h6>

                            <div class="row">

                                <div class="col-md-4">
                                    <img src="{{$worker->photo}}" style="width: 250px; height: 200px; object-fit: cover; border-radius:12px;">
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Photo') }}</label>
                                        <input type="file" name="image" id="input-name" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}" autofocus>

                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Nom') }}</label>
                                        <input type="text" name="lastname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex : Jhon') }}" value="{{ old('lastname')??$worker->user->lastname}}" required autofocus>

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
                                        <input type="text" name="firstname" id="input-name" class="form-control form-control-alternative{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex : Doe') }}" value="{{ old('firstname')??$worker->user->firstname }}" required autofocus>

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
                                        <input type="text" name="phone" id="input-name" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex: +509 5555 5555') }}" value="{{ old('phone')??$worker->user->phone }}" required autofocus>

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
                                            <option value="CIN" <?php if($worker->information->card_name == "CIN"){ echo 'selected'; } ?>>CIN</option>
                                            <option value="NIF" <?php if($worker->information->card_name == "NIF"){ echo 'selected'; } ?>>NIF</option>
                                            <option value="Passeport" <?php if($worker->information->card_name == "Passeport"){ echo 'selected'; } ?>>Passeport</option>
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
                                        <input type="text" name="number" id="input-name" class="form-control form-control-alternative{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="{{ __('84834-53453') }}" value="{{ old('number')??$worker->information->card_id }}" required autofocus>

                                        @if ($errors->has('number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12">
                                    <h6 class="heading-small text-muted mb-4">{{ __('Information Travailleur') }}</h6>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('formation') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Type de Formation') }}</label>

                                        <select class="form-control form-control-alternative{{ $errors->has('formation') ? ' is-invalid' : '' }}" name="formation" id="formation" required>
                                            <option value="">Sélectionnez formation</option>
                                            <option value="Médecin Généraliste" <?php if($worker->formation == "Médecin Généraliste"){ echo "selected"; } ?>>Médecin Généraliste</option>
                                            <option value="Infirmier" <?php if($worker->formation == "Infirmier"){ echo "selected"; } ?>>Infirmier</option>
                                            <option value="Aide Soignant" <?php if($worker->formation == "Aide Soignant"){ echo "selected"; } ?>>Aide Soignant</option>
                                        </select>

                                        @if ($errors->has('formation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('bio') ? ' has-danger' : '' }}">
                                        <label class="form-control-label text-white" for="input-name">{{ __('Biographie') }}</label>
                                        <textarea type="text" name="bio" class="form-control form-control-alternative{{ $errors->has('bio') ? ' is-invalid' : '' }}" value="{{ old('bio') }}" rows="5" id="bio">{{old('bio')??$worker->bio}}</textarea>

                                        @if ($errors->has('bio'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bio') }}</strong>
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/4/tinymce.min.js'></script> --}}

    <script>
        tinymce.init({
            selector: '#bio'
        });
    </script>
@endsection
