@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('main.create_task') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{route('tasks.store')}}" method="POST">
                            @csrf
                        <div class="row">

                            <div class="col-12">
                                <label class="form-label">{{__('main.title')}}</label>
                                <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                                @error('title')
                                <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{__('main.description')}}</label>
                                <textarea name="description" class="form-control" required>{{old('description')}}</textarea>
                                @error('description')
                                <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{__('main.status')}}</label>
                                <select class="form-control" name="status" required>
                                    <option value>{{__('main.choice_task_status')}}</option>
                                    @foreach(\App\Models\Task::getStatusesList() as $status_id => $status)
                                        <option value="{{$status_id}}">{{$status}}</option>
                                    @endforeach
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
