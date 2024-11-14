@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tasks</h1>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <form id="filterForm" method="GET" action="{{ route('tasks.index') }}" class="d-flex gap-2">
            <select name="status" class="form-select">
                <option value="" style=" margin-right:10px">All Statuses</option>
                <option value="1">Completed</option>
                <option value="0">Incomplete</option>
            </select>

            <select name="priority" class="form-select">
                <option value="">All Priorities</option>
                <option value="1">High</option>
                <option value="2">Medium</option>
                <option value="3">Low</option>
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <button class="btn btn-primary">Clear Filter</button>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task +</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h4>Low</h4>
            <div class="d-flex flex-column gap-3">
                @foreach($tasks->where('priority', 3) as $task)
                <div class="card p-3">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text text-muted">{{ $task->description }}</p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <small class="text-muted">{{ $task->created_at->format('F j, Y') }}</small>
                        </div>
                        <div>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-link">Edit</a>
                            <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-link text-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <h4>Medium</h4>
            <div class="d-flex flex-column gap-3">
                @foreach($tasks->where('priority', 2) as $task)
                <div class="card p-3">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text text-muted">{{ $task->description }}</p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <small class="text-muted">{{ $task->created_at->format('F j, Y') }}</small>
                        </div>
                        <div>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-link">Edit</a>
                            <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-link text-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <h4>High <span>🔥</span></h4>
            <div class="d-flex flex-column gap-3">
                @foreach($tasks->where('priority', 1) as $task)
                <div class="card p-3">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text text-muted">{{ $task->description }}</p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <small class="text-muted">{{ $task->created_at->format('F j, Y') }}</small>
                        </div>
                        <div>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-link">Edit</a>
                            <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-link text-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('clearFilterBtn').addEventListener('click', function() {
        const form = document.getElementById('filterForm');
        form.reset();
        form.submit();
    });
</script>
@endsection