@extends('layouts.layout')




@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-dark text-center mb-4">Edit Course</h1>
                    
                 
                    
                    <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course->name) }}" >
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $course->description) }}" >
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label for="total_degree" class="form-label">total_degree</label>
                            <input type="number" class="form-control" id="total_degree" name="total_degree" value="{{ old('total_degree', $course->total_degree) }}" >
                            @error('total_degree')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                      
                        
                       
                        
                       
                        
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection