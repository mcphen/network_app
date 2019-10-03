@extends('layouts.backapp')

@section('content')
    <div class="container my-3 text-center">
        <div class="text-center">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                <span class="glyphicon glyphicon-ok"></span> <strong>Success Message</strong>
                <hr class="message-inner-separator">
                <p>
                    You successfully read this important alert message.</p>
            </div>
        </div>
        <a href="{{url('/home')}}" class="btn btn-success">Suivant</a>
    </div>
@endsection
