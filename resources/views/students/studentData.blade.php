@extends('layouts.layout')


@section('content')


<h1 class="text-dark fw-bold text-center w-50 mt-5 m-auto"> {{$student->name}}</h1> 
<table class="table w-75 m-auto table-bordered mt-5 ">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Address</th>
            <th scope="col">gender</th>
            <th scope="col">Picture</th>
            <th scope="col">grade</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody class="text-center">
            <tr>
               
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
                   <a href="{{route('students.index')}}">
                     <button class="btn btn-warning">Back</button>
                    </a>
                </td>
            </tr>


    </tbody>
</table>


@endsection


   