@extends('layouts.layout')

@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-end">
        <a href="{{ route('students.create') }}">
            <x-button-component type="dark">Create New Student</x-button-component>
        </a>
    </div>
</div>

<h1 class="text-dark fw-bold text-center w-50 mt-2 m-auto">All Students</h1>

<table class="table w-75 m-auto table-bordered mt-3">
    <thead class="text-center table-dark">
        <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Address</th>
            <th class="text-center" scope="col">Gender</th>
            <th class="text-center" scope="col">Picture</th>
            <th class="text-center" scope="col">Grade</th>
            <th class="text-center" scope="col">Track</th> 
            
            <th class="text-center" scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr class="text-center">
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->gender }}</td>
                <td>
                    @if($student->image)
                        <img src="{{ asset('uploads/students/' . $student->image) }}" alt="Student Image" style="width: 40px; border-radius: 50%; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $student->grade }}</td>
                <td>
                    @if($student->track)
                        {{ $student->track->name }}
                    @else
                        No Track
                    @endif
                </td>
                
                <td>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('students.view', $student->id) }}"> 
                            <x-button-component type="success">View</x-button-component>
                        </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <x-button-component type="danger">Delete</x-button-component>
                        </form>
                        <a href="{{ route('students.edit', $student->id) }}"> 
                            <x-button-component type="warning">Update</x-button-component>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


                    @foreach (Auth::user()->notes as $note)

                    <p>{{ $note->content }}</p>
                    @endforeach

               


<div class="d-flex justify-content-center fixed-bottom ">
  {{ $students->links('pagination::bootstrap-5') }}

  </div>

@endsection
