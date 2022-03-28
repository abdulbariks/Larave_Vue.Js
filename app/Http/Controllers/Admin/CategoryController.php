<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json([
                'category' => $category
        ], 200);
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        Category::create([
            'name'      =>$request->name,
            'slug'      =>$this->slugify($request->name),
            'status'   =>$request->status
        ]);
    }

    public function slugify($text)
    {
     // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate divider
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return response()->json(['category' => $category], 200);
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $category = Category::find($request->id);

            $category->name      = $request->name;
            $category->slug      = $this->slugify($request->name);
            $category->status   = $request->status;


          if($category->save()){
            $success = true;
        }else{
            $success  = false;
        }

        return response()->json(['success' => $success], 200);
    }


        // $request->validate([
        //   'name'    =>'required',
        //   'status'  =>'required'
        // ]);
        // Category::create([
        //     'name'      =>$request->name,
        //     'slug'      =>$this->slugify($request->name),
        //     'satatus'   =>$request->status
        // ]);

        // $category =Category::find($request->id);

        // $category->name   =$request->name;
        // $category->slug   =slugify($request->name);
        // $category->status =$request->status;
        // $category->save();



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::find($id);
        // $category->delete();

        $category = Category::findOrFail($id);
        // delete the user

        $category->delete();
        // return redirect()->route('categories');
    }
}
