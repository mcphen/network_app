@extends('layouts.backapp')

@section('content')
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">{{ $wizardTitle }}</h1>

                <div class="mb-3">
                    @include('wizard::steps_bar')
                </div>
                <h3 class="text-center">{{ $step->titre }}</h3>
                <form action="{{ action($postAction, [$step->slug()]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include($step->view(), compact('step', 'errors'))

                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            @if ($stepRepo->hasPrev())
                                <button type="button" class="btn btn-primary" onclick="this.form.action = '{{ action($postAction, [$step->slug(), '_trigger' => 'back']) }}'; this.form.submit();">
                                    @lang('wizard::generic.back')
                                </button>
                            @endif
                        </div>

                        <div class="ml-auto">
                            @if ($stepRepo->hasNext())
                                <button type="submit" class="btn btn-primary">
                                    @lang('wizard::generic.next')
                                </button>
                            @else
                                <button type="submit" class="btn btn-primary">
                                    @lang('wizard::generic.done')
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
