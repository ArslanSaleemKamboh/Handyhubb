<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
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
        $categories=Category::orderBy('id','desc')->get();
        return view('backend.pages.categories.list',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories=Category::where('parent_id',0)->get();
        return view('backend.pages.categories.create',['parentCategories'=>$parentCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data=[
            'name'=>$request->name,
            'title'=>$request->title,
            'parent_id'=>(int) $request->parent_id,
            'search_count'=>0,
            'status'=>$request->status,
            'in_header'=>$request->inheader
        ];
        $stored=Category::create($data);
        if($stored){
            return redirect()->route('categories.index')->with('success','Category Added Successfully');
        }else{
            return redirect()->route('categories.index')->with('error','Some error occure! plz contact with developer.');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        $parentCategories=Category::where('parent_id',0)->get();
        return view('backend.pages.categories.edit',['category'=>$category,'parentCategories'=>$parentCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category=Category::find($id);
        $updated=$category->update($request->toArray());
        if($updated){
            return redirect()->route('categories.index')->with('success','Category Updated Successfully');
        }else{
            return redirect()->route('categories.index')->with('error','Some error occure! Plz contact with developer.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $deleted=$category->delete();
        if($deleted){
            return redirect()->route('categories.index')->with('success','Category Deleted Successfully');
        }else{
            return redirect()->route('categories.index')->with('error','Some error occure! Plz contact with developer.');
        }
    }
}
