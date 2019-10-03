@extends('layouts.template')

@section('content')
<section class="companies-info" id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group list-group-flush" style="margin-bottom: 10px;">
                    <li class="list-group-item"><a href="#">Relations</a></li>
                    <li class="list-group-item"><a href="{{url('/network/invitation')}}">Invitations reçues</a></li>
                    <li class="list-group-item"><a href="#">Invitations envoyées</a></li>
                    
                </ul>
            </div>
            <div class="col-md-9">
                    
                    <div class="card">
                        <div class="card-header">Relations</div>
                            <div class="card-body"><networkfollow></networkfollow></div> 
                    </div>
                            
                                        
                                      
                            
                            
                    
            </div>
        </div>



    </div>
</section><!--companies-info end-->
@endsection