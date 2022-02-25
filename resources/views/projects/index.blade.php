@extends('layouts.admin')

@section('main')
    @can('admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mt-5">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New project</a>
            </div>
        </div>
    </div>
    @endcan
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-4">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Target</th>
            <th width="280px">Action</th>

        </tr>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->target }}</td>
            <td>
                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('projects.destroy',$project->id) }}">Delete</a>
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $projects->links() !!}

@endsection
