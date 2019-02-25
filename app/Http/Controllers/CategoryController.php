<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use Response;


class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('title','id')->all();
        return view('categoryTreeview',compact('categories','allCategories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {
      /*  $this->validate($request, [
        		'title' => 'required',
        	]);*/
        if($request->ajax())
        {
          //echo " good";


        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        if(empty($input['parent_id']))
        {
          $input['parent_id'] = 0;
        }
        else {
          $index = $input['parent_id'];
          $setParentId = Category::where('title' , $index)->get();
          //$input['parent_id'] = $setParentId;
        }

        //$result = Category::create($input);
        //return view('categoryTreeview')->with('success', 'New Category added successfully.');
        //$html = view('categoryTreeview')->render();
        return response()->json(['success'=> $setParentId]);
        //return response()->json(compact('$html'));
        }
    }


}
