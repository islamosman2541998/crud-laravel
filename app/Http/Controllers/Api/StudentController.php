<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        $students = Student::get();
        return response()->json($students);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'image' => 'required|image',
            'grade' => 'required',
            'track_id' => 'required|exists:tracks,id',
        ]);

        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $name = uniqid() . '.' . $ext;
        $img->move(public_path('uploads/students'), $name);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'image' => $name,
            'grade' => $request->grade,
            'track_id' => $request->track_id,
        ]);
        $success = 'Student created successfully';

        return response()->json($success);
    }
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'image' => 'nullable|image',
            'grade' => 'required',
            'track_id' => 'required|exists:tracks,id',
        ]);

        $student = Student::findOrFail($id);

        $name = $student->image;
        if ($request->hasFile('image')) {
            if ($name !== null) {
                $filePath = public_path('uploads/students/' . $name);
                if (file_exists($filePath)) {
                    unlink($filePath);
                } else {
                    Log::warning("File not found: " . $filePath);
                }
            }
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = uniqid() . '.' . $ext;
            $img->move(public_path('uploads/students'), $name);
        }

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'image' => $name,
            'track_id' => $request->track_id,
        ]);

        $success = 'Student updated successfully';

        return response()->json($success);
    }
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $filePath = public_path('uploads/students/' . $student->image);

        
        if (file_exists($filePath)) {
            unlink($filePath);
        } else {
            
            Log::warning("File not found: " . $filePath);
        }

        $student->delete();
        
        $this->resetStudentIds(); 

        return response()->json('Student deleted successfully');

        
        return ;
    }

    private function resetStudentIds()
    {
        DB::statement('SET @count = 0;');
        DB::statement('UPDATE students SET id = @count := @count + 1;');
        DB::statement('ALTER TABLE students AUTO_INCREMENT = 1;');
    }

   


 
 
}
