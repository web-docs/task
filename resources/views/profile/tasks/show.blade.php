@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('main.preview_task') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        <div class="cols-12">
                            <div class="">
                                <label >{{__('main.status')}}</label>: <div class="form-control">{{$task->getStatusLabel()}}</div>
                            </div>
                            <div class="">
                                <label >{{__('main.title')}}</label>
                                <input type="text" class="form-control" readonly value="{{$task->title}}">
                            </div>
                            <div class="">
                                <label>{{__('main.description')}}</label>
                                <textarea class="form-control" readonly>{{$task->description}}</textarea>
                            </div>

                        </div>
                        <div style="padding-top: 10px">
                            <a href="{{URL::previous()}}">{{__('main.back')}}</a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
