@extends('layouts.layout')




@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-dark text-center mb-4">Edit track</h1>
                    
                    <div class="mb-3 text-center">
                        <label for="current_image" class="form-label">Current Picture</label>
                        <div>
                            <img src="{{ asset('uploads/tracks/' . $track->logo) }}" alt="Track Image" width="150" height="150" class="img-thumbnail">
                        </div>
                    </div>
                    
                    <form action="{{ route('tracks.update', $track->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $track->name) }}" >
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $track->location) }}" >
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label for="super_v" class="form-label">super_v</label>
                            <input type="text" class="form-control" id="super_v" name="super_v" value="{{ old('super_v', $track->super_v) }}" >
                            @error('super_v')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                      
                        
                        <div class="mb-3">
                            <label for="logo" class="form-label">Upload New logo (optional)</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                        
                       
                        
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection