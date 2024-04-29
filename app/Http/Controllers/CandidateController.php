<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Hash;
use DataTables,Auth;
use Illuminate\Http\Response;
use App\Pathway;
use App\CourseCategory;

class CandidateController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('candidate.index');
    }


    public function delete($id)
    {
        $candidate   = Candidate::find($id);
        if($candidate){
            $candidate->delete();
            return redirect('candidates')->with('success', 'Candidate removed!');
        }else{
            return redirect('candidates')->with('error', 'Candidate not found');
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Candidate $candidate)
    {
        return view('candidate.show', compact('post'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = Candidate::where('email', $request->email)->first();
        $pathways = Pathway::all();
        $categories = CourseCategory::all();

        if (empty($candidate)) {

        $candidate = new Candidate;
        $candidate->name = $request->name;
        $candidate->age = $request->age;
        $candidate->university = $request->university;

        if ($candidate->university == "Other") {
            $candidate->university_other = $request->university_other;
        }

        $candidate->gender = $request->gender;
        $candidate->email = $request->email;
        $candidate->count = 1;

        if ($request->opt == "on") {
            $candidate->opt_in = true;
        } else {
            $candidate->opt_in = false;
        }
        $candidate->save();
        $minutes = 1440;
        $response = new Response('Hello World');

        sendEmail($candidate->id);

        return response(view('pages.become_a_teacher')->with('user', $candidate)->with('pathways', $pathways)->with('categories', $categories))->cookie('JGF_User',$candidate,$minutes);

        } else {
            $candidate->count = $candidate->count + 1;
            $candidate->name = $request->name;
            $candidate->age = $request->age;

            $candidate->university = $request->university;

            if ($candidate->university == "Other") {
                $candidate->university_other = $request->university_other;
            }

            $candidate->gender = $request->gender;
            $candidate->email = $request->email;

            if ($request->opt == "on") {
                $candidate->opt_in = true;
            } else {
                $candidate->opt_in = false;
            }
            $candidate->save();
            $minutes = 1440;
            $response = new Response('Hello World');

            sendEmail($candidate->id);

            return response(view('pages.become_a_teacher')->with('user', $candidate)->with('pathways', $pathways)->with('categories', $categories))->cookie('JGF_User',$candidate,$minutes);
        }

    }
}
