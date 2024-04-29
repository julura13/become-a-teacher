<?php

namespace App\Http\Controllers;

use App\Pathway;
use Illuminate\Http\Request;
use App\Course;
use App\CourseCategory;
use App\Requirement;

class PathwayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pathway.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $categories = CourseCategory::all();
        return view('pathway.create')->with('categories', $categories);
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
            $courses = Course::all();
            // store user information
            $pathway = Pathway::create([
                        'name' => $request->name,
                        'description' => $request->description,
                        'more_info' => $request->more_info,
                    ]);    

            if ($request->any_one != null) {
                
                for ($i=0; $i < count($request->any_one); $i++) { 
                    foreach ($courses as $course) {
                        if ($course->id == $request->any_one[$i]) {
                            $name = $course->name . " " . $course->level;
                        }
                    }

                    $requirement = Requirement::create([
                                'pathway_id' => $pathway->id,
                                'pathway_name' => $pathway->name,
                                'course_1_id' => $request->any_one[$i],
                                'course_1_name' => $name,
                            ]);
                }

            }
            
            if ($request->any_two != null) {

                for ($i=0; $i < count($request->any_two); $i++) { 
                    for ($j=$i + 1; $j < count($request->any_two); $j++) { 

                        foreach ($courses as $course) {
                            if ($course->id == $request->any_two[$i]) {
                                $name1 = $course->name . " " . $course->level;
                            } else if ($course->id == $request->any_two[$j]) {
                                $name2 = $course->name . " " . $course->level;
                            }
                        }
                        
                        $requirement = Requirement::create([
                            'pathway_id' => $pathway->id,
                            'pathway_name' => $pathway->name,
                            'course_1_id' => $request->any_two[$i],
                            'course_1_name' => $name1,
                            'course_2_id' => $request->any_two[$j],
                            'course_2_name' => $name2,
                        ]);
                    }
                }

            }
            

            if($pathway){ 
                return redirect('pathways')->with('success', 'New pathway created!');
            }else{
                return redirect('pathways')->with('error', 'Failed to create new pathway! Try again.');
            }
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pathway  $pathway
     * @return \Illuminate\Http\Response
     */
    public function show(Pathway $pathway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pathway  $pathway
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $categories = CourseCategory::all();
        try
        {
            $pathway  = Pathway::find($id);

            if($pathway){
                return view('pathway.edit', compact('pathway'))->with('courses', $courses)->with('categories', $categories);
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
     * @param  \App\Pathway  $pathway
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pathway $pathway)
    {
        $courses = Course::all();
        try{
            
            $pathway = Pathway::find($request->id);
            
            $update = $pathway->update([
                'name' => $request->name,
                'description' => $request->description,
                'more_info' => $request->more_info,
            ]);

            $requirements = Requirement::where('pathway_id', $pathway->id);

            foreach ($requirements as $requirement) {
                $requirement->delete();
            }

            if ($request->any_one != null) {
                
                for ($i=0; $i < count($request->any_one); $i++) { 
                    foreach ($courses as $course) {
                        if ($course->id == $request->any_one[$i]) {
                            $name = $course->name . " " . $course->level;
                        }
                    }

                    $requirement = Requirement::create([
                                'pathway_id' => $pathway->id,
                                'pathway_name' => $pathway->name,
                                'course_1_id' => $request->any_one[$i],
                                'course_1_name' => $name,
                            ]);
                }

            }
            
            if ($request->any_two != null) {

                for ($i=0; $i < count($request->any_two); $i++) { 
                    for ($j=$i + 1; $j < count($request->any_two); $j++) { 

                        foreach ($courses as $course) {
                            if ($course->id == $request->any_two[$i]) {
                                $name1 = $course->name . " " . $course->level;
                            } else if ($course->id == $request->any_two[$j]) {
                                $name2 = $course->name . " " . $course->level;
                            }
                        }
                        
                        $requirement = Requirement::create([
                            'pathway_id' => $pathway->id,
                            'pathway_name' => $pathway->name,
                            'course_1_id' => $request->any_two[$i],
                            'course_1_name' => $name1,
                            'course_2_id' => $request->any_two[$j],
                            'course_2_name' => $name2,
                        ]);
                    }
                }
            }

            return redirect()->back()->with('success', 'User information updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pathway  $pathway
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pathway = Pathway::find($id);

        $requirements = Requirement::where('pathway_id', $id)->get();

        if (!empty($requirements)) {
            foreach ($requirements as  $requirement) {
                $requirement->delete();
            }
        }

        if($pathway){
            $pathway->delete();
            return redirect('pathways')->with('success', 'Pathway removed!');
        }else{
            return redirect('pathways')->with('error', 'Pathway not found');
        }
    }

    //SEARCH REQUEST

    public function getPathways(Request $request){

        $search = $request->search;
  
        if($search == ''){
           $pathways = Pathway::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $pathways = Pathway::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($pathways as $pathway){
           $response[] = array("value"=>$pathway->id,"label"=>$pathway->name);
        }
  
        return response()->json($response);
     }
}
