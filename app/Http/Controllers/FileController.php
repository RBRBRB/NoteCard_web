<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSummernote()
    {
        //
         return view('summernote');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSummernote(Request $request)
    {
        //

        $this->validate($request, [
            'front' => 'required',

        ]);
        //get chapter_id
        $chapterPathId = $request->input('pathArg');

        $front = $request->input('front');

        $dom = new \DomDocument();
        $content = new Content();

        $dom->loadHtml($front, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        if(!empty($images[0]))
        {
          foreach($images as $img){

              $data = $img->getAttribute('src');

              list($type, $data) = explode(';', $data);

              list(, $data)      = explode(',', $data);

              $data = base64_decode($data);

              $image_name= "/upload/" . 'f_'.time().'.png';

              $path = public_path() . $image_name;

              file_put_contents($path, $data);

              $img->removeAttribute('src');

              $img->setAttribute('src', $image_name);

          }
          $front = $dom->saveHTML();
          $content->f_filename = $image_name;

        }

        $content->front = $front;
        $content->chapter_id = $chapterPathId;



        $detail = $request->input('detail');

        if(count($detail) > 0)
        {

            $dom = new \DomDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            if(!empty($images[0]))
            {
              foreach($images as $img){
                  $data = $img->getAttribute('src');
                  list($type, $data) = explode(';', $data);
                  list(, $data)      = explode(',', $data);
                  $data = base64_decode($data);
                  $image_name= "/upload/" . 'd_'.time().'.png';
                  $path = public_path() . $image_name;
                  file_put_contents($path, $data);
                  $img->removeAttribute('src');
                  $img->setAttribute('src', $image_name);

              }
              $detail = $dom->saveHTML();
              $content->d_filename = $image_name;
            }

            $content->detail = $detail;
        }

        $content->save();

        return redirect('CardBoard/create')->with('success' , 'Content Added');
        //dd($img->saveHTML());


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
