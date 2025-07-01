@extends("layouts.default")

@section("content")
<main class="flex-shrink-0 mt-5">
    <div class="container">
        {{-- Feedback Messages --}}
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Suggestions Heading --}}
        <div class="mb-4">
            <h4 class="fw-bold text-primary">💡 Suggestions</h4>
        </div>

        {{-- Task with Arrow, Title, Deadline, Description & Status --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted">➡️</span>
                        <strong class="ms-2">{{ $task->title }}|{{ $task->deadline }}</strong>
                        <span class="badge bg-secondary ms-2">{{ \Carbon\Carbon::parse($task->deadline)->format('M d, Y') }}</span>
                    </div>
                    <form method="POST" action="{{ route('task.status.update', $task->id) }}">
                        @csrf
                        <button class="btn btn-sm btn-success">✅ Completed</button>
                    </form>
                </div>
                <div class="mt-3">
                    <p class="text-muted mb-0">{{ $task->description ?? 'No description available.' }}</p>
                </div>
            </div>
        </div>

        {{-- Suggestions List --}}
        <div class="bg-body p-3 rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-3">User Suggestions</h6>

            @forelse ($suggestions as $suggestion)
                <div class="border-bottom pb-2 mb-2">
                    <p class="mb-1">{{ $suggestion->content }}</p>
                    <small class="text-muted">Suggested by {{ $suggestion->author ?? 'Anonymous' }}</small>
                </div>
            @empty
                <p class="text-muted">No suggestions yet.</p>
            @endforelse

            <div class="text-end mt-3">
                <a href="#" class="text-decoration-none">🔗 View All Suggestions</a>
            </div>
        </div>
    </div>
</main>
@endsection
