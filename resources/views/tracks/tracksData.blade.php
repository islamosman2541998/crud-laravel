@extends('layouts.layout')

@section('content')



<div class="container mt-3">
    <div class="d-flex justify-content-end">
        <a href="{{ route('tracks.create') }}">
            <button class="btn btn-dark">Create New Track</button>
        </a>
    </div>
</div>

<h1 class="text-dark fw-bold text-center w-50 mt-2 m-auto">All Tracks</h1>

<table class="table w-75 m-auto table-bordered mt-3">
    <thead class="text-center table-dark ">
        <tr>
            <th class="text-center  " scope="col">ID</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">location</th>
            <th class="text-center" scope="col">super_v</th>
            <th class="text-center" scope="col">logo</th>
            <th class="text-center" scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tracks as $track)
            <tr class="text-center">
                <td>{{ $track->id }}</td>
                <td>{{ $track->name }}</td>
                <td>{{ $track->location }}</td>
                <td>{{ $track->super_v }}</td>
                
                <td>
                    @if($track->logo)
                        <img src="{{ asset('uploads/tracks/' . $track->logo) }}" alt="Student Image" style="width: 40px; border-radius: 50%; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                
                <td>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('tracks.view', $track->id) }}"> 
                            <button class="btn btn-success">View</button>
                        </a>
                        <form action="{{ route('tracks.destroy', $track->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        <a href="{{ route('tracks.edit', $track->id) }}"> 
                            <button class="btn btn-warning">Update</button>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

















@endsection