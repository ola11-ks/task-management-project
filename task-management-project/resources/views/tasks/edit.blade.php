@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <!-- Task Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <!-- Task Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <!-- Task Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="1" {{ old('status', $task->status) == '1' ? 'selected' : '' }}>Completed</option>
                <option value="0" {{ old('status', $task->status) == '0' ? 'selected' : '' }}>Incomplete</option>
            </select>
        </div>

        <!-- Task Priority -->
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select name="priority" id="priority" class="form-select">
                <option value="1" {{ old('priority', $task->priority) == '1' ? 'selected' : '' }}>High</option>
                <option value="2" {{ old('priority', $task->priority) == '2' ? 'selected' : '' }}>Medium</option>
                <option value="3" {{ old('priority', $task->priority) == '3' ? 'selected' : '' }}>Low</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection