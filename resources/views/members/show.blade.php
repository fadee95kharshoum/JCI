@extends('layouts.admin')

@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show member</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered mt-4">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Information</th>
            <th>Skills</th>
            <th>Work Experience</th>
            <th>Projects</th>
        </tr>
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->information }}</td>
            <td>{{ $member->skills }}</td>
            <td>{{ $member->experience }}</td>
            <td>{{ $member->projects}}</td>
            {{-- <td>{{ $member->projects->name }}</td> --}}
        </tr>
    </table>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
    </div>
@endsection
