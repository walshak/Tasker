@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Your tasks</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @foreach ($tasks as $task)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>
                                                <a href="{{ route('task.show', $task) }}">{{ $task->name }}</a>
                                            </h3>
                                            {{ $task->desc }}
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <small><i>last updated: {{ $task->updated_at->diffForHumans() }}</i></small>
                                            @if ($task->complete == true)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-check text-success"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg>complete
                                            @elseif ($task->complete == false)
                                                <a href="{{route('task.complete',$task)}}">mark as complete</a>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="card-footer">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
