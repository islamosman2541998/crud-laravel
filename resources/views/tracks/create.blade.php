@extends('layouts.layout')



@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-info mb-4">Create New Track</h1>
                    
                    <form method="post" action="{{ route('tracks.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName1" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">location</label>
                            <input name="location" type="text" class="form-control" id="exampleInputLocation1" required>
                           
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputgrade1" class="form-label">super_v</label>
                            <input name="super_v" type="text" class="form-control" id="exampleInputsuper_v1" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputImage1" class="form-label">log</label>
                            <input name="logo" type="file" class="form-control" id="exampleInputLogo1" required>
                        </div>

                      

                        
                       
                       

                        <button type="submit" class="btn btn-primary w-100 mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection