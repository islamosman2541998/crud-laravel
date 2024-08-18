@extends('layouts.layout')

@section('content')



<div class="container mt-3">
    <div class="d-flex justify-content-end">
        <a href="{{ route('courses.create') }}">
            <button class="btn btn-dark">Create New Course</button>
        </a>
    </div>
</div>

<h1 class="text-dark fw-bold text-center w-50 mt-2 m-auto">All Courses</h1>

<table class="table w-75 m-auto table-bordered mt-3">
    <thead class="text-center table-dark ">
        <tr>
            <th class="text-center  " scope="col">ID</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">description</th>
            <th class="text-center" scope="col">total_degree</th>
            <th class="text-center" scope="col">Track</th>
            
            <th class="text-center" scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
            <tr class="text-center">
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
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('courses.view', $course->id) }}"> 
                            <button class="btn btn-success">View</button>
                        </a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        <a href="{{ route('courses.edit', $course->id) }}"> 
                            <button class="btn btn-warning">Update</button>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center fixed-bottom ">
  {{ $courses->links('pagination::bootstrap-5') }}

  </div>

















@endsection