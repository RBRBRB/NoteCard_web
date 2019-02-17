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
        'fname' => 'required',

        ]);
        $cover = $request->file('bookcover');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        $book = new Content();
        $book->text = $request->fname;
        $book->chapter_id = 1;
        $book->mime = $cover->getClientMimeType();
        $book->original_filename = $cover->getClientOriginalName();
        $book->filename = $cover->getFilename().'.'.$extension;
        $book->save();
        //return view('CardBoard.homeweb');
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
        return view('CardBoard.homeweb');
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
