<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- ➕ Add Task Button --}}
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('task.add') }}" class="btn btn-success">
                    ➕ Add Task
                </a>
            </div>

            @foreach ($tasks as $index => $task)
                <div class="card mb-4 shadow-sm border-start border-4 border-primary">
                    <div class="card-body">

                        {{-- 📌 Task Header --}}
                        <h5 class="card-title fw-bold">
                            {{ $loop->iteration }}{{ $loop->iteration == 1 ? 'st' : ($loop->iteration == 2 ? 'nd' : ($loop->iteration == 3 ? 'rd' : 'th') ) }} Task
                        </h5>

                        {{-- 📝 Title & Deadline --}}
                        <p class="card-text mb-1"><strong>Title:</strong> {{ $task->title }}</p>
                        <p class="card-text text-muted"><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($task->deadline)->format('F j, Y') }}</p>

                        {{-- 💬 Suggestions --}}
                        @if($task->suggestions->count())
                            <div class="mt-3">
                                <h6 class="fw-semibold text-secondary">💬 Suggestions:</h6>
                                <ul class="list-group">
                                    @foreach($task->suggestions as $suggestion)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ $suggestion->content }}</span>
                                            @if($suggestion->author)
                                                <small class="text-muted">– {{ $suggestion->author }}</small>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- 🎯 Actions --}}
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-outline-primary btn-sm">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('task.delete', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
