<?php

namespace App\Http\Controllers;

use App\Requirement;
use Illuminate\Http\Request;
use App\Pathway;
use App\CourseCategory;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pathway = Pathway::where('id', $id)->first();
        $categories = CourseCategory::all();

        return view('pathway.requirements')
                ->with('pathway', $pathway)
                ->with('categories', $categories);
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
        $pathway_id = $request->pathway_id;
        $pathway_name = $request->pathway_name;
        $course_list = $request->course_list;
        $course_names = $request->course_names;

        $requirement = new Requirement;
        $requirement->pathway_id = $pathway_id;
        $requirement->pathway_name = $pathway_name;

        if (count($course_list) == 1) {
            $requirement->course_1_id = $course_list[0];
            $requirement->course_1_name = $course_names[0];
        }elseif (count($course_list) == 2) {
            $requirement->course_1_id = $course_list[0];
            $requirement->course_1_name = $course_names[0];
            $requirement->course_2_id = $course_list[1];
            $requirement->course_2_name = $course_names[1];
        }elseif (count($course_list) == 3) {
            $requirement->course_1_id = $course_list[0];
            $requirement->course_1_name = $course_names[0];
            $requirement->course_2_id = $course_list[1];
            $requirement->course_2_name = $course_names[1];
            $requirement->course_3_id = $course_list[2];
            $requirement->course_3_name = $course_names[2];
        }

        $requirement->save();

        return "Saved";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function show(Requirement $requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirement $requirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requirement $requirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requirement = Requirement::where('id', $id)->first();
        $requirement->delete();

        return redirect()->back()->with('success', 'Requirement deleted!');
    }
}
