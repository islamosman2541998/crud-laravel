@extends('layouts.layout')

@section('content')

<h1 class="text-dark fw-bold text-center w-50 mt-5 m-auto"> {{$course->name}}</h1> 
<table class="table w-75 m-auto table-bordered mt-5 ">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Total Degree</th>
            <th scope="col">Tracks</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->total_degree }}</td>
            <td>
                @if($course->track)
                    {{ $course->track->name }}
                @else
                    No Track
                @endif
            </td>
            <td>
                <a href="{{ route('courses.index') }}">
                    <button class="btn btn-warning">Back</button>
                </a>
            </td>
        </tr>
    </tbody>
</table>

@endsection
