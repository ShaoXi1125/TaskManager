@extends('layouts.app')

@section('title','Update Tasks')

@section('content')

<div class="container">
    <form action="{{ route('updateTask',$tasks->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label><br>
            <input type="text" name='title' id="title" class="form-control" value="{{ $tasks->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label><br>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{$tasks->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label><br>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>

        <br>
        <button type='submit' class='btn btn-primary mt-3'>Update Task</button>

    </form>
</div>

@endsection

