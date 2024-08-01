@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">

            @include('elements.sidebar')

        </div>
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


                        <div class="col-md-10">


                        <table class="table table-responsive">
                            <tr>
                                <th>ID</th>
                                <th>{{__('main.title')}}</th>
                                <th>{{__('main.status')}}</th>
                                <th colspan="2"></th>
                            </tr>
                            @if(!empty($tasks))
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->getStatusLabel()}}</td>
                                    <td><a href="{{route('tasks.edit', $task) }}"><button>{{__('main.edit')}}</button></a></td>
                                    <td>
                                        <form class="form-destroy" action="{{route('tasks.destroy', $task) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">{{__('main.destroy')}}
                                            </button>
                                        </form>
                                    </td>
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
</div>
@endsection

@section ('js')
    <script>
        $(document).ready(function() {

            $('.form-destroy').submit(function(){
                if(confirm('{{__('main.confirm_delete')}}')){
                    return true;
                }
                return false;
            })

        });
    </script>
@endsection
