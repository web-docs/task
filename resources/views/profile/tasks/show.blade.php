@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Preview task') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        <div class="grid grid-cols-1 gap-6 2xl:grid-cols-2">
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-base font-medium text-bgray-600 dark:text-bgray-50">{{__('main.status')}}</label>: {{$task->getStatusLabel()}}
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-base font-medium text-bgray-600 dark:text-bgray-50">{{__('main.title')}}</label>
                                <div>{{$task->title}}</div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="" class="text-base font-medium text-bgray-600 dark:text-bgray-50">{{__('main.description')}}</label>
                                <div>{{$task->description}}</div>
                            </div>


                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
