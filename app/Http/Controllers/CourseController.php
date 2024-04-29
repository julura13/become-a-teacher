<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DataTables,Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CourseCategory::all();
        return view('course.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = CourseCategory::where('id', $request->category)->first();
        try
        {
            // store user information
            for ($i=1; $i <= $request->level; $i++) { 

                $course = Course::create([
                            'name' => $request->name,
                            'level' => $i,
                            'course_category_id' => $request->category,
                            'course_category_name' => $category->name,
                            'description' => $request->description
                        ]);
                        
            }

            if($course){ 
                return redirect('courses')->with('success', 'New course created!');
            }else{
                return redirect('courses')->with('error', 'Failed to create new course! Try again.');
            }
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $course  = Course::find($id);

            if($course){
                return view('course.edit', compact('course'));
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
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            
            $course = Course::find($request->id);
            
            $update = $course->update([
                'name' => $request->name,
                'description' => $request->description,
                'level' => $request->level
            ]);

            // return $course;

            // $course->name = $request->name;
            // $course->level = $request->level;
            // $course->description = $request->description;
            // $course->save();

            return redirect()->back()->with('success', 'User information updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $course   = Course::find($id);
        if($course){
            $course->delete();
            return redirect('courses')->with('success', 'Course removed!');
        }else{
            return redirect('courses')->with('error', 'Course not found');
        }
    }
}
