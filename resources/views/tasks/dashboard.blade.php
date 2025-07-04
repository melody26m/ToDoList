<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: antiquewhite;
    }

    .container {
        max-width: 960px;
        margin: 50px auto;
        padding: 0 15px;
    }

    .row {
        display: flex;
        justify-content: center;
    }

    .col-md-10 {
        width: 100%;
        max-width: 83.333333%;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-end {
        justify-content: flex-end;
    }

    .mb-4 {
        margin-bottom: 24px;
    }

    .btn-round-add-task {
        border-radius: 40%;
        width: 50px;
        height: 50px;
        background-color: green;
        color: white;
        border: none;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
        font-size: 1.5rem;
    }

    .btn-round-add-task:hover {
        background-color: rgb(3, 70, 19);
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        text-align: center;
        background-color: #d1ecf1;
        color: black;
    }

    .card {
        background-color: #fff;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: 0.25rem;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
        margin-bottom: 30px;
    }

    .card-header {
        padding: 15px 20px;
        margin-bottom: 0;
        background-color: black;
        border-bottom: 1px solid rgba(0,0,0,.125);
        color: white;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }

    .card-header h4 {
        margin-bottom: 0;
    }

    .card-body {
        padding: 0;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .table th,
    .table td {
        padding: 12px 16px;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background-color: #e9ecef;
    }

    .table-hover tbody tr:hover {
        background-color: #f5f5f5;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05);
    }

    .text-start { text-align: left ; }
    .text-center { text-align: center !important; }
    .text-end { text-align: right !important; }
    .text-muted { color: #6c757d !important; }
    .fw-bold { font-weight: bold !important; }

    .d-flex.gap-2 { display: flex; gap: 8px; }

    .action-btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-outline-primary {
        color: #007bff;
        border-color: black;
    }

    .btn-outline-primary:hover {
        color: black;
        background-color: green;
        border-color: #007bff;
    }

    .btn-outline-danger {
        color: black;
        border-color: black;
    }

    .btn-outline-danger:hover {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .me-2 { margin-right: 8px; }

    .badge {
        font-size: 0.85rem;
        padding: 0.4em 0.75em;
        border-radius: 0.5rem;
    }

    input[type="checkbox"] {
        transform: scale(1.2);
        cursor: pointer;
        accent-color: green;
    }

    .completed-task {
        text-decoration: line-through;
        color: #6c757d;
    }
    .logout-btn {
    color: black;
    border-color: black;
    background-color: transparent;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
    align-self: self-end;
}

.logout-btn:hover {
    background-color: #dc3545;
    color: white;
}

</style>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('task.add') }}" class="btn-round-add-task">
                    <span class="plus-icon">➕</span>
                </a>
            </div>
            <div class="d-flex justify-content-end mb-4">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="action-btn btn-outline-danger me-2">🚪 Logout</button>
    </form>
</div>


            @if ($tasks->isEmpty())
                <div class="alert" role="alert">
                    Looks like you don't have any tasks yet! Click "➕ Add Task" to get started.
                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">📋 Your Tasks</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-start" style="width: 25%;">Title</th>
                                        <th scope="col" class="text-center" style="width: 20%;">Deadline</th>
                                        <th scope="col" class="text-center" style="width: 20%;">Status</th>
                                        <th scope="col" class="text-end" style="width: 35%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td class="text-start" style="width: 25%;">
                                                <div class="d-flex align-items-center gap-2">
                                                    <form action="{{ route('task.toggleStatus', $task->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="checkbox" onchange="this.form.submit()" {{ $task->status === 'completed' ? 'checked' : '' }}>
                                                    </form>
                                                    <label class="fw-bold mb-0 {{ $task->status === 'completed' ? 'completed-task' : '' }}">
                                                        {{ $loop->iteration }}. {{ $task->title }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center text-muted" style="width: 20%;">
                                                {{ \Carbon\Carbon::parse($task->deadline)->format('F j, Y') }}
                                            </td>
                                            <td class="text-center" style="width: 20%;">
                                                @if($task->status === 'completed')
                                                    <span class="badge bg-success">✅ Completed</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">⏳ Pending</span>
                                                @endif
                                            </td>
                                            <td class="text-end" style="width: 35%;">
                                                <div class="d-flex gap-2 justify-content-end">
                                                    <a href="{{ route('task.edit', $task->id) }}" class="action-btn btn-outline-primary">✏️ Edit</a>
                                                    <form action="{{ route('task.delete', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task? This action cannot be undone.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn btn-outline-danger">🗑️ Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 text-center">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

