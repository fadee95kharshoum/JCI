@extends('layouts.admin')

@section('main')
    @can('admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mt-5">
                <a class="btn btn-success" href="{{ route('members.create') }}"> Create New member</a>
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
            <th>Information</th>
            <th>Skills</th>
            <th>Work Experience</th>
            {{-- <th>Project</th> --}}
            <th width="280px">Action</th>
        </tr>
        <tr>

        </tr>
        @foreach ($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->information }}</td>
            <td>{{ $member->skills }}</td>
            <td>{{ $member->experience }}</td>
            {{-- <td>{{ $member->project->name }}</td> --}}
            <td>

                {{-- <form action="{{ route('members.destroy',$member->id) }}" method="POST"> --}}

                    {{-- <a class="btn btn-info" href="{{ route('members.show',$member->id) }}">Show</a> --}}

            <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('members.destroy',$member->id) }}">Delete</a>
                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}

                    {{-- <button class="btn btn-danger" href="{{ route('members.destroy',$member->id) }}">Delete</button> --}}
                {{-- </form> --}}
                {{-- <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Add To Project
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach ($projects as $project)
                        <li><a class="dropdown-item" href="#">{{ $project->name }}</a></li>
                        @endforeach
                    </ul>
                </div> --}}
            </td>
        </tr>
        @endforeach
    </table>

    {!! $members->links() !!}

@endsection
