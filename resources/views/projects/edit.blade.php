@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update project</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('projects.update', $project->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $project->name }}" />
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <input type="textarea" class="form-control" name="desc" value="{{ $project->desc }}" />
            </div>

            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="deadline" value="{{ $project->deadline }}" />
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script>
        $(function() {
            $("#datetimepicker1").datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                inline: true,
                sideBySide: true,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>
</div>
@endsection