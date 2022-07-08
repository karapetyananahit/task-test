@extends('layouts.app')

@section('content')


<div class="container my-5">

    <a href="{{route("workspaces.create")}}" class="btn btn-primary mb-5">Create</a>

    <table class="table table-hover table-bordered table-dark">
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th colspan="2">Action</th>

        </tr>

        @foreach($workspaces as $workspace)
            <tr>
                <td>{{ $workspace->name }}</td>
                <td>{{ $workspace->slug }}</td>
                <td>
                    <a href="{{ route("workspaces.edit", ["id" => $workspace->id]) }}"
                       class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form method="POST" action="/workspaces/delete/{{$workspace->id}}">
                        @csrf
                        @method("delete")
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

</div>





@endsection('content')

