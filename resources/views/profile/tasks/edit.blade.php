@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('main.update_task') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{route('profile.tasks.update',$task)}}" method="PUT">
                            @csrf

                            <div class="row">

                                <div class="col-12">
                                    <label class="form-label">{{__('main.title')}}</label>
                                    <input type="text" name="title" class="form-control" value="{{old('title',isset($task) ? $task->title :'')}}" required>
                                    @error('title')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{__('main.description')}}</label>
                                    <textarea name="description" class="form-control" value="{{old('description',isset($task) ? $task->description :'')}}" required>
                                @error('description')
                                <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{__('main.status')}}</label>
                                    <select class="form-control" name="description" required>
                                        @isset($task)
                                            <option value="0">{{__('main.choice_task')}}</option>
                                            @foreach($task->getStatusesList() as $status_id => $status)
                                                <option value="{{$status->id}}" @if($task->status==$status_id) selected @endif >{{$status)}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>

                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
