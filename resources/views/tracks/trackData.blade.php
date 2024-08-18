@extends('layouts.layout')


@section('content')


<h1 class="text-dark fw-bold text-center w-50 mt-5 m-auto"> {{$track->name}}</h1> 
<table class="table w-75 m-auto table-bordered mt-5 ">
    <thead class="text-center table-dark"  >
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">location</th>
            <th scope="col">super_v</th>
            <th scope="col">logo</th>
            <th scope="col">Actions</th>
           
        </tr>
    </thead>
    <tbody class="text-center">
            <tr>
               
                <td>{{ $track->id }}</td>
                <td>{{ $track->name }}</td>
                <td>{{ $track->location }}</td>
                <td>{{ $track->super_v }}</td>
            
                <td>
                    @if($track->logo)
                        <img src="{{ asset('uploads/tracks/' . $track->logo) }}" alt="track logo" style="width: 40px; border-radius: 50%; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                
                
                <td>
                   <a href="{{route('tracks.index')}}">
                     <button class="btn btn-warning">Back</button>
                    </a>
                </td>
            </tr>


    </tbody>
</table>

<h2 class="text-dark fw-bold text-center mt-5">All Students in {{ $track->name }}</h2>

<table class="table w-75 m-auto table-bordered mt-3">
    <thead class="text-center table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Grade</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @forelse ($track->students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->grade }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No students found in this track.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection

