<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Track;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        return view('tracks.tracksData', compact('tracks'));
    }

    public function view($id)
    {
        $track = Track::findOrFail($id);
        return view('tracks.trackData', compact('track'));
    }

    public function destroy($id)
    {
        $track = Track::findOrFail($id);
        $track->delete();

        $this->resetTrackIds();

        return redirect()->route('tracks.index')->with('success', 'Track deleted successfully.');
    }

    private function resetTrackIds()
    {
        DB::statement('SET @count = 0;');
        DB::statement('UPDATE tracks SET id = @count:= @count + 1;');
        DB::statement('ALTER TABLE tracks AUTO_INCREMENT = 1;');
    }

    function create()
    {

       return view('tracks.create');
    }

    function store( Request $request)
     {

        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'super_v' => 'required',
            'logo' => 'required|image',
            
        ]);
       $img = $request->file('logo');
       $ext = $img->getClientOriginalExtension();
       $name = uniqid() . '.' . $ext;
       $img->move(public_path('uploads/tracks'), $name);


       Track::create([
        'name' => $request->name,
        'location' => $request->location,
        'super_v' => $request->super_v,
        'logo' => $name,
        
       ]);

       
       return to_route('tracks.index');

       
      


     }

     public function edit($id)
     {
         $track = Track::findOrFail($id);
         return view('tracks.update', compact('track'));
     }

     public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'super_v' => 'required',
        'logo' => 'required|image',
        
    ]);

    $track = Track::findOrFail($id);

   
    if ($request->hasFile('logo')) {
        $img = $request->file('logo');
        $ext = $img->getClientOriginalExtension();
        $name = uniqid() . '.' . $ext;
        $img->move(public_path('uploads/tracks'), $name);
        $track->logo = $name;
    }

   
    $track->update([
        'name' => $request->name,
        'location' => $request->location,
        'super_v' => $request->super_v,
        'logo' => $name,
    ]);

   
    $track->save();

    return redirect()->route('tracks.index');
}

}

