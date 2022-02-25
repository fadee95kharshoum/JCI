@extends('layouts.admin')

@section('main')
    @can('admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mt-5">
                <a class="btn btn-success" href="{{ route('partners.create') }}"> Create New Partner</a>
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
            <th>Notes</th>
            {{-- <th>Project</th> --}}
            <th width="280px">Action</th>
        </tr>
        <tr>

        </tr>
        @foreach ($partners as $partner)
        <tr>
            <td>{{ $partner->id }}</td>
            <td>{{ $partner->name }}</td>
            <td>{{ $partner->information }}</td>
            <td>{{ $partner->notes }}</td>
            {{-- <td>{{ $partner->project->name }}</td> --}}
            <td>

                {{-- <form action="{{ route('partners.destroy',$partner->id) }}" method="POST"> --}}

                    {{-- <a class="btn btn-info" href="{{ route('partners.show',$partner->id) }}">Show</a> --}}

            <a class="btn btn-primary" href="{{ route('partners.edit',$partner->id) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('partners.destroy',$partner->id) }}">Delete</a>
            <a class="btn btn-info" href="{{ route('partners.showinfo',$partner->id) }}">Show</a>
                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}

                    {{-- <button class="btn btn-danger" href="{{ route('partners.destroy',$partner->id) }}">Delete</button> --}}
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

    {!! $partners->links() !!}

@endsection
