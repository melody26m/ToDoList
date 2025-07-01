@extends("layouts.default")

@section("content")
<div class="container py-5">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <div class="card shadow-sm " >
                <div class="card-header bg-light" >
                    <h5 class="mb-0">Add New Task</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.add.post') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="datetime-local" name="deadline" id="deadline" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                        </div>
                          @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

                        <div class="text-end">
                            <button type="submit" class="btn btn-success rounded-pill">Submit Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
