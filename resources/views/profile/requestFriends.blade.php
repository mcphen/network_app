@extends('layouts.template')

@section('content')
    <section class="companies-info">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group list-group-flush" style="margin-bottom: 10px;">
                        <li class="list-group-item">Relations</li>
                        <a href="{{url('/network/invitation')}}"><li class="list-group-item">Invitations</li></a>

                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="companies-list bg-white p-3">
                        <div class="row">
                            @foreach($friend as $u)

                                <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                    <div class="main-left-sidebar no-margin">
                                        <div class="user-data full-width">
                                            <div class="user-profile">
                                                <div class="username-dt">
                                                    <div class="usr-pic">
                                                        <img src="{{ asset('img/'.$u->pics) }}" alt="">
                                                    </div>
                                                </div><!--username-dt end-->
                                                <div class="user-specs">
                                                    <h3>{{ ucwords($u->prenom) }} {{ ucwords($u->nom) }}</h3>
                                                    <span>{{$u->libelle_promotion}}</span>

                                                    <ul >
                                                        <li>

                                                            <a href="{{url('/accept')}}/{{ $u->idutilisateurs }}" title="" class="btn btn-primary m-3">Accepter</a>



                                                        </li>

                                                    </ul>
                                                </div>
                                            </div><!--user-profile end-->

                                        </div><!--user-data end-->


                                    </div><!--main-left-sidebar end-->
                                </div>

                            @endforeach

                        </div>
                    </div><!--companies-list end-->
                </div>
            </div>



        </div>
    </section><!--companies-info end-->
@endsection