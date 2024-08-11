@extends('layouts.layout')



@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-info mb-4">Create New Course</h1>
                    
                    <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName1" >
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">description</label>
                            <input name="description" type="text" class="form-control" id="exampleInputLocation1" >
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                           
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputgrade1" class="form-label">total_degree</label>
                            <input name="total_degree" type="number" class="form-control" id="exampleInputsuper_v1" >
                            @error('total_degree')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                       

                      

                        
                       
                       

                        <button type="submit" class="btn btn-primary w-100 mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection