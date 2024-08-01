@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>{{__('main.title')}}</th>
                                <th>{{__('main.status')}}</th>
                                <th></th>
                            </tr>
                            @if(!empty($tasks))
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->getStatusLabel()}}</td>
                                    <td>{{route('profile.tasks.edit', $task)}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
