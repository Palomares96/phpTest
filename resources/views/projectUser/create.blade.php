@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Create new assignment</h1>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('projectUser.store') }}">
                @csrf
                <div class="form-group">
                    <label for="desc">User name:</label>
                    <select class="form-control m-bot15" name="user_id">

                        @if ($usersModel->count())

                        @foreach($usersModel as $user)
                        <option value="{{ $user->id }}" {{ $selectedUser = $user->id ? 'selected="selected"' : '' }}>{{$user->id}} - {{ $user->name }}</option>
                        @endforeach

                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label for="desc">Project name:</label>
                    <select class="form-control m-bot15" name="project_id">

                        @if ($projectsModel->count())

                        @foreach($projectsModel as $project)
                        <option value="{{ $project->id }}" {{ $selectedProject = $project->id ? 'selected="selected"' : '' }}>{{$project->id}} - {{ $project->name }}</option>
                        @endforeach

                        @endif

                    </select>
                </div>

                <button type="submit" class="btn btn-primary-outline">Add assingment</button>
            </form>
        </div>
    </div>
</div>

@endsection