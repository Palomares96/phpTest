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
        <h1 class="display-3">Assingments</h1>
        <div>
            <a style="margin: 19px;" href="{{ route('projectUser.create')}}" class="btn btn-primary">New assingment</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>@sortablelink('id', 'ID')</td>
                    <td>@sortablelink('user_name', 'Name')</td>
                    <td>@sortablelink('project_name', 'Project name')</td>
                    <td>@sortablelink('deadline', 'Deadline')</td>
                    <td>@sortablelink('created_at', 'Created at')</td>
                    <td>@sortablelink('updated_at', 'Updated at')</td>
                    <td>@sortablelink('is_currently_assigned', 'Assigned')</td>
                    <td>@sortablelink('is_active', 'Active')</td>

                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($assingments as $assingment)
                <tr>
                    <td>{{$assingment->id}}</td>
                    <td>{{$assingment->user_name}}</td>
                    <td>{{$assingment->project_name}}</td>
                    <td>{{$assingment->deadline}}</td>
                    <td>{{$assingment->created_at}}</td>
                    <td>{{$assingment->updated_at}}</td>
                    @if($assingment->is_currently_assigned)
                    <td> True </td>
                    @else
                    <td> False </td>
                    @endif
                    @if($assingment->is_active)
                    <td> True </td>
                    @else
                    <td> False </td>
                    @endif
                    <td>
                        <a href="{{ route('projectUser.edit', $assingment->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('projectUser.destroy', $assingment->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $assingments->appends(\Request::except('page'))->render() !!}
        <div>
        </div>
        @endsection