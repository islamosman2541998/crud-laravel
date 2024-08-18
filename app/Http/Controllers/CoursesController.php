<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Track;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with('track')->paginate(3);
        return view('courses.coursesData', compact('courses'));
    }

    public function view($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.courseData', compact('course'));
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        $this->resetCourseIds();

        return redirect()->route('courses.index');
    }

    private function resetCourseIds()
    {
        DB::statement('SET @count = 0;');
        DB::statement('UPDATE courses SET id = @count:= @count + 1;');
        DB::statement('ALTER TABLE courses AUTO_INCREMENT = 1;');
    }

    function create()
{
    $tracks = Track::all(); 
    return view('courses.create', compact('tracks'));
}

    function store( Request $request)
     {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'total_degree' => 'required',
            
            
        ]);
      


       Course::create([
        'name' => $request->name,
        'description' => $request->description,
        'total_degree' => $request->total_degree,
        
        
       ]);

       
       return to_route('courses.index');

       
      


     }

     public function edit($id)
{
    $course = Course::findOrFail($id);
    $tracks = Track::all(); 
    return view('courses.update', compact('course', 'tracks'));
}

     public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'total_degree' => 'required',
        
        
    ]);

    $course = Course::findOrFail($id);

   
   

   
    $course->update([
        'name' => $request->name,
        'description' => $request->description,
        'total_degree' => $request->total_degree,
    ]);

   
   

    return redirect()->route('courses.index');
}

}
