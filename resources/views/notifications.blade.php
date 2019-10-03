@extends('layouts.template')

@section('content')
    <section class="messages-page"  xmlns:v-on="http://www.w3.org/1999/xhtml">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">Notifications</div>

                        <div class="card-body" >
                            <ul class="list-group">
                                @foreach ($nots as $not)
                                    <li class="list-group-item">
                                        {{$not->data['nom']}} - {{$not->data['message']}}
                                        <span class="pull-right">
                                            {{$not->created_at}}
                                        </span>
                                    </li>
                                    
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section><!--messages-page end-->
@endsection
