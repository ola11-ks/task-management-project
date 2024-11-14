@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create Task</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('tasks.store') }}" class="p-4 bg-white rounded shadow">
        @csrf
        <div class="row mb-9">
            <div class="col-md-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="col-md-3" style="margin-top:30px;">
                <label for="status" class="form-label">Task Status *</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="">Not Started</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="col-md-3" style="margin-top:30px;">
                <label for="priority" class="form-label">Priority *</label>
                <select name="priority" id="priority" class="form-select" required>
                    <option value="">Select Priority</option>
                    <option value="1">High</option>
                    <option value="2">Medium</option>
                    <option value="3">Low</option>
                </select>
            </div>
        </div>






        <div class="row mb-3">
            <div class="col-md-12">
                <label for="description" class="form-label">Description *</label>
                <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
            </div>
        </div>



        <div class="d-flex justify-content-center ">
            <button type="submit" class="btn btn-success me-3">SUBMIT</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary" style="margin-left:10px">CANCEL</a>
        </div>

    </form>
</div>
@endsection