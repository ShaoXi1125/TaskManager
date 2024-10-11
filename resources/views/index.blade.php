@extends('layouts.app')

@section('title', 'Task List')
@section('content')
    <div class="container">
        @if(session('success'))
            <div class='alert alert-success alert-dismissible fade show' role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class='table'>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th colspan="2">Action</th>
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>@if($task->isCompleted == 1)
                        <span class="badge text-bg-success">Completed</span>
                    @else
                        <span class="badge text-bg-warning">Pending</span>
                    @endif
                    </td>
                    <td>{{$task->due_date}}</td>
                    <td>
                        @if($task->isCompleted == 0)
                            <a href="{{route('doneTask', $task->id)}}" class="btn btn-success">Mark as Completed</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection