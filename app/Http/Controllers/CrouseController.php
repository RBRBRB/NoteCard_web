<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crouse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Content;

class CrouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$crouses = Crouse::all();
        //return view('CardBoard.index')->with('crouses' , $crouses);
        return view('CardBoard.homeweb');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('CardBoard.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
        'addPost' => 'required',
        'imagefile'=>'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('imagefile')){
            // Get filename with the extension
            $filenameWithExt = $request->file('imagefile')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('imagefile')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('imagefile')->storeAs('public/media', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //$cover = $request->file('imagefile');
        //$extension = $cover->getClientOriginalExtension();
        //Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        //preg_match( '@src="([^"]+)"@' , $request_text, $match );
        //$src = array_pop($match);

        $content = new Content();
        $content->text = $request->input('addPost');
        $content->chapter_id = 1;
        //$content->mime = $cover->getClientMimeType();
        //$content->original_filename = $cover->getClientOriginalName();
        //$content->filename = $cover->getFilename().'.'.$extension;
        $content->filename = $fileNameToStore;
        $content->save();
        //return view('CardBoard.show');
        return redirect('CardBoard/')->with('success' , 'Content Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('CardBoard.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
