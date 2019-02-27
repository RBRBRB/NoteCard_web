<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Crouse;
use App\Chapter;
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
        $crouses = Crouse::all();
        $chapters = Chapter::all();
        return view('CardBoard.edit' , compact('crouses' , 'chapters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*
        request()->validate([
        'addPost' => 'required',
        'imagefile'=>'image|nullable|max:1999'
      ]);*/
      if($request->ajax())
      {
        $input = $request->all();
        if(empty($input['parent_id']))
        {
          //$input['parent_id'] = 0;
          $crouse = new Crouse();
          $crouse->subject = $input['title'];
          $crouse->save();
        }
        else {

          $chapter = new Chapter();
          $chapter->subject_id = $input['parent_id'];
          $chapter->chapter = $input['title'];
          $chapter->save();
          //$setParentId = Category::where('title' , $index)->get();
          //$input['parent_id'] = $setParentId;
        }


        return response()->json(['success'=> 'Add success']);
      }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function query(Request $request)
    {
      if($request->ajax())
      {
        $input = $request->all();

        $crouse_name = $input['crouse'];
        $chapter_name = $input['chapter'];

        $crouseFilter = Crouse::where('subject' , $crouse_name)->get();
        $crouseIndex = $crouseFilter[0]['subject_id'];

        $chapterFilter = Chapter::where('subject_id', $crouseIndex)->where('chapter' , $chapter_name)->get();
        $chapterIndex = $chapterFilter[0]['chapter_id'];

        return response()->json(['success'=> $chapterIndex]);
      }
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
