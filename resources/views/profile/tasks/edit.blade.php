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

                        <form action="{{route('tasks.update',$task)}}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row">

                                <div class="col-12">
                                    <label class="form-label">{{__('main.title')}}</label>
                                    <input type="text" name="title" class="form-control" value="{{old('title',isset($task) ? $task->title  :'fff')}}" required>
                                    @error('title')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{__('main.description')}}</label>
                                    <textarea name="description" class="form-control" rows="10" required>{{old('description',isset($task) ? $task->description :'')}}</textarea>
                                @error('description')
                                <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{__('main.status')}}</label>
                                    <select class="form-control" name="status" required>
                                        @isset($task)
                                            <option value>{{__('main.choice_task_status')}}</option>
                                            @foreach(\App\Models\Task::getStatusesList() as $status_id => $status)
                                                <option value="{{$status_id}}" @if($task->status==$status_id) selected @endif >{{$status}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>

                            <button type="submit" style="margin-top: 15px">{{__('main.save')}}</button>
                        </form>




                </div>
                <div style="padding: 0 0 20px 20px">
                    <a href="{{URL::previous()}}">{{__('main.back')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
