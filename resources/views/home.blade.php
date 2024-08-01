@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-2">

            @include('elements.sidebar')

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('main.profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        <div class="row">

                            <div class="col-md-10">
                                {{ __('main.create_tasks') }}
                            </div>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
