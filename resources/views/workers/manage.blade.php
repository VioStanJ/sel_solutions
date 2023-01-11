@extends('layouts.app', ['title' => __('Gérer Utilisateur')])

@section('title')
Getion Utilisateur - {{$worker->user->firstname}} {{$worker->user->lastname}}
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
                        <div class="col-lg-3 order-lg-2 mt-5">
                            <div class="card-profile-image mt-5">
                                <a href="#">
                                    <img src="{{$worker->photo}}" style="width: 350px; height: auto; border-radius:12px;">
                                </a>
                            </div>
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
                                {{ $worker->user->firstname }}, {{ $worker->user->lastname }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i><b class="text-uppercase">{{ $worker->formation }}</b>
                            </div>

                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $worker->user->email }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ $worker->user->phone }}
                            </div>
                            <br>
                            <div class="row justify-content-center align-items-center">
                                <div id="qr-code"></div>
                            </div>
                            <hr class="my-4" />
                            @if ($worker->status)
                                <div class="row justify-content-between align-items-center">
                                    <h4>
                                        <span class="text-secondaey">STATUS :: </span>
                                        @if ($worker->blocked)
                                            BLOCKER
                                        @else
                                            ACTIVER
                                        @endif
                                    </h4>
                                    <a href="{{route('admin.workers.reactivation',$worker->id)}}" class="btn btn-warning text-uppercase">
                                        @if ($worker->blocked)
                                            RE-ACTIVER
                                        @else
                                            BLOQUER
                                        @endif
                                    </a>
                                </div>

                                <div class="row justify-content-between align-items-center pl-3">
                                    <a href="{{route('admin.workers.delete',$worker->id)}}" class="btn btn-danger">EFFACER</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            {{-- <h3 class="mb-0">{{$customer->firstname}} {{$customer->lastname}} --}}
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

        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const QRElement = document.getElementById("qr-code");
        new QRCode(QRElement, '{{$worker->code}}');
    </script>
@endsection
