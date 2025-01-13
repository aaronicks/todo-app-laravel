@extends("layouts.auth")


@section("content")
    <div class="d-flex align-items-center">
        <div class="container card shadow-sm" style="margin-top:100px; max-width: 500px">
            <div class="fs-3 fw-bold text-center my-3">Add New Task</div>
            <form action="{{route("add.task.post")}}" method="POST" class="p-3">@csrf
                <div class="mb-3 mt-1">
                    <input type="text" class="form-control" placeholder="Name of Task" name="title">
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" name="deadline">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>
                    <!-- Success Message -->
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-warning rounded-pill">Submit</button>
            </form>
        </div>
    </div>
@endsection