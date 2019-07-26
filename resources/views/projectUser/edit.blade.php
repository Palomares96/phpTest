@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update assignment</h1>

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
        <form method="post" action="{{ route('projectUser.update', $assingment->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="user_id">User name:</label>
                <select class="form-control m-bot15" name="user_id" selection="{{$assingment->user_id}}">

                    @if ($usersModel->count())

                    @foreach($usersModel as $user)
                    <option value="{{ $user->id }}" {{ $assingment->user_id == $user->id ? 'selected=selected' : '' }}>{{$user->id}} - {{ $user->name }}</option>
                    @endforeach

                    @endif

                </select>
            </div>
            <div class="form-group">
                <label for="project_id">Project name:</label>
                <select class="form-control m-bot15" name="project_id">

                    @if ($projectsModel->count())

                    @foreach($projectsModel as $project)
                    <option value="{{ $project->id }}" {{ $assingment->project_id == $project->id ? 'selected=selected' : '' }}>{{$project->id}} - {{ $project->name }}</option>
                    @endforeach

                    @endif

                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</div>
@endsection