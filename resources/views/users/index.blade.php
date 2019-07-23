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
        <h1 class="display-3">Users</h1>
        <div>
            <a style="margin: 19px;" href="{{ route('users.create')}}" class="btn btn-primary">New user</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>@sortablelink('id', 'ID')</td>
                    <td>@sortablelink('name', 'Name')</td>
                    <td>@sortablelink('email', 'Email')</td>
                    <td>@sortablelink('created_at', 'Created at')</td>
                    <td>@sortablelink('updated_at', 'Updated at')</td>
                    <td>@sortablelink('active', 'Active')</td>

                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>{{$user->active}}</td>
                    <td>
                        <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->appends(\Request::except('page'))->render() !!}
        <div>
        </div>
        @endsection