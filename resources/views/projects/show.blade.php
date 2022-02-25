@extends('layouts.admin')

@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <a class="btn btn-primary" href="">Add Members</a>
                <a class="btn btn-primary" href="">Add Partners</a>
                <a class="btn btn-primary" href="">Add Mettigns</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered mt-4">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Target</th>
            <th>Place</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->target }}</td>
            <td>{{ $project->place }}</td>
            <td>{{ $project->date }}</td>
            <td>{{ $project->time }}</td>
        </tr>
    </table>
    <table  class="table table-bordered mt-4" style="width: 25%">
        <tr>
            <th>Members</th>
            <th>Action</th>
        </tr>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td><a class="btn btn-info" href="{{ route('members.show',$member->id) }}">show</a></td>
            </tr>
        @endforeach
    </table>
    <table  class="table table-bordered mt-4" style="width: 25%">
        <tr>
            <th>Partners</th>
            <th>Action</th>
        </tr>
        @foreach ($partners as $partner)
            <tr>
                <td>{{ $partner->name }}</td>
                <td><a class="btn btn-info" href="{{ route('partners.show',$partner->id) }}">show</a></td>
            </tr>
        @endforeach
    </table>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
    </div>
@endsection
