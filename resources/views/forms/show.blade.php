@extends('layouts.app')

@section('title')
Form :: {{$form->title}}
@endsection

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
    <div class="header-body">
        <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            {{-- <h6 class="h2 text-white d-inline-block mb-0">Créer Client</h6> --}}
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$form->title}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <a href="{{route('admin.customers.create')}}" class="btn btn-lg btn-neutral"
            data-toggle="modal" data-target="#exampleModalCenter" >Créer Question</a>
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
                <h3 class="text-white mb-0">{{ count($questions) }} Questions</h3>
                </div>
                <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">TITLE</th>
                        <th scope="col" class="sort" data-sort="price">TYPE</th>
                        <th scope="col" class="sort" data-sort="price">OPTION</th>
                        <th scope="col" class="sort" data-sort="status">STATUS</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($questions as $item)
                            <tr>
                                <td class="name">{{$item->title}}</td>
                                <td class="font-weight-bold">
                                    @switch($item->type)
                                        @case(0)
                                        TEXTE
                                            @break
                                        @case(1)
                                        DATE
                                            @break
                                        @case(2)
                                        NUMERO
                                            @break
                                        @case(3)
                                        OUI/NO
                                            @break
                                        @case(4)
                                        EMAIL
                                            @break
                                        @case(5)
                                        CAS PAR CAS
                                            @break
                                        @case(6)
                                            CUSTOM
                                            @break
                                        @default
                                            TEXTE
                                            @break
                                    @endswitch
                                </td>
                                <td>{{$item->option??"--"}}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="text-success">ACTIVE</span>
                                    @else
                                        <span class="text-danger">INACTIVE</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('admin.forms.show',$item->id)}}">Details</a>
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

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Créer une question pour ce formulaire </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.forms.createQuestion')}}" method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="form_id" value="{{$form->id}}"/>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Titre') }}</label>
                                <input type="text" name="title" id="input-name" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex : Titre Question') }}" value="{{ old('title')}}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Type de Question') }}</label>
                                <select class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="type" required>
                                    <option value="">Sélectionnez un</option>
                                    <option value="0">TEXTE</option>
                                    <option value="1">DATE</option>
                                    <option value="2">NUMERO</option>
                                    <option value="3">OUI/NO</option>
                                    <option value="4">EMAIL</option>
                                    <option value="5">CAS PAR CAS</option>
                                    <option value="6">CUSTOM</option>
                                </select>

                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" id="c_option" style="display: none;">
                            <div class="form-group{{ $errors->has('option') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Option') }} <small><b>( JSON )</b></small></label>
                                <br>
                                <small>EX : [ {"value":"1"},{"value":"2"},{"value":"3"} ]</small>
                                <textarea type="text" name="option" id="option" class="form-control form-control-alternative{{ $errors->has('option') ? ' is-invalid' : '' }}" value="{{ old('option')}}" autofocus></textarea>

                                @if ($errors->has('option'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 row justify-content-around align-items-center">
                            <button class="btn btn-default" type="submit">
                                Créer
                            </button>
                        </div>

                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // Get Type Value
            $('#type').on('change',function(){
                if(this.value == 6){
                    $('#c_option').css("display","block");
                    $('#option').attr("required",true);
                }else{
                    $('#c_option').css("display","none");
                    $('#option').attr("required",false);
                }
            });
        });
    </script>
@endsection
