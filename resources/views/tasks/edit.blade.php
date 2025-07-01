@extends('layouts.default')

@section('content')
<div class="container">
    <h3 class="mb-4">✏️ Edit Task</h3>

    <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $task->deadline) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">✅ Update Task</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">⬅️ Cancel</a>
    </form>
</div>
@endsection
