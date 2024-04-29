<?php

namespace App\Http\Controllers;

use App\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.course.create');
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // return $request;
                try
                {
                    // store user information
                    $category = CourseCategory::create([
                                'name' => $request->name,
                                'description' => $request->description
                            ]);    
        
                    if($category){ 
                        return redirect('categories')->with('success', 'New category created!');
                    }else{
                        return redirect('categories')->with('error', 'Failed to create new category! Try again.');
                    }
                }catch (\Exception $e) {
                    $bug = $e->getMessage();
                    return redirect()->back()->with('error', $bug);
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $category  = CourseCategory::find($id);

            if($category){
                return view('categories.course.edit', compact('category'));
            }else{
                return redirect('404');
            }

        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseCategory $courseCategory)
    {
        try{
            
            $category = CourseCategory::find($request->id);
            
            $update = $category->update([
                'name' => $request->name,
            ]);

            return redirect()->back()->with('success', 'Category information updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category   = CourseCategory::find($id);
        if($category){
            $category->delete();
            return redirect('categories')->with('success', 'Category removed!');
        }else{
            return redirect('categories')->with('error', 'Category not found');
        }
    }
}
