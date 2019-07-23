@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-12">

            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
        </div>
        <h1 class="display-3">Projects</h1>
        <div>
            <a style="margin: 19px;" href="{{ route('projects.create')}}" class="btn btn-primary">New project</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>@sortablelink('id', 'ID')</td>
                    <td>@sortablelink('name', 'Name')</td>
                    <td>@sortablelink('desc', 'Description')</td>
                    <td>@sortablelink('deadline', 'Deadline')</td>
                    <td>@sortablelink('created_at', 'Created at')</td>
                    <td>@sortablelink('updated_at', 'Updated at')</td>
                    <td>@sortablelink('active', 'Active')</td>

                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->name}}</td>
                    <td>{{$project->desc}}</td>
                    <td>{{$project->deadline}}</td>
                    <td>{{$project->created_at}}</td>
                    <td>{{$project->updated_at}}</td>
                    <td>{{$project->active}}</td>
                    <td>
                        <a href="{{ route('projects.edit',$project->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('projects.destroy', $project->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $projects->appends(\Request::except('page'))->render() !!}
        <div>
        </div>
        @endsection