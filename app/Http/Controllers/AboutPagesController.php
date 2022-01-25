<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPagesController extends Controller
{
    public function create()
    {
        return view('pages.about.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title1' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image'

        ]);

        $abouts = new About;
        $abouts->title1 = $request->title1;
        $abouts->title2 = $request->title2;
        $abouts->description = $request->description;

        $image_file = $request->file('image');
        Storage::putfile('public/img/',$image_file);
        $abouts->image = 'storage/img/' . $image_file->hashName();

        $abouts->save();

        return redirect()->route('admin.about.create')->with('success','New about created successfully');
    }

    public function list()
    {
        $abouts = About::all();
        return view('pages.about.list',compact('abouts'));
    }

    public function edit($id)
    {
    
        $abouts = About::find($id);
        return view('pages.about.edit',compact('abouts'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'title1' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image'
        ]);

        $abouts = About::find($id);
        $abouts->title1 = $request->title1;
        $abouts->title2 = $request->title2;
        $abouts->description = $request->description;

        if($request->file('image')){
            $image_file = $request->file('image');
            Storage::putFile('public/img/', $image_file);
            $abouts->image = "storage/img/".$image_file->hashName();
        }

        $abouts->save();

        return redirect()->route('admin.about.list')->with('success','About updated successfully');
    }

    public function destroy($id){
        $abouts = About::find($id);
        @unlink(public_path($about->image));
        $abouts->delete();
        return redirect()->route('admin.about.list')->with('success','About deleted successfully');
    }
}
