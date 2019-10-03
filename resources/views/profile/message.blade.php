@extends('layouts.template')

@section('content')
    <section class="messages-page"  xmlns:v-on="http://www.w3.org/1999/xhtml">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">Messagerie</div>

                        <div class="card-body" >
                            <chatcomponent :user="{{Auth()->user()}}"></chatcomponent>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section><!--messages-page end-->
@endsection
