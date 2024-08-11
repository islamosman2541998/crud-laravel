<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; 
use App\Models\Student;
use App\Models\Track;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('track')->get();
        $students = Student::paginate(3);
        return view('students.studentsData', compact("students"));
    }

    public function view($id)
    {
        $student = Student::findOrFail($id);
        return view('students.studentData', compact("student"));
    }

    public function destroy($id)
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
        
        return redirect()->route('students.index');
    }

    private function resetStudentIds()
    {
        DB::statement('SET @count = 0;');
        DB::statement('UPDATE students SET id = @count := @count + 1;');
        DB::statement('ALTER TABLE students AUTO_INCREMENT = 1;');
    }

    public function create()
    {
        $tracks = Track::all();
        return view('students.create', compact('tracks'));
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

        return to_route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $tracks = Track::all();
        return view('students.update', compact('student', 'tracks'));
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

        return redirect()->route('students.index');
    }
}
