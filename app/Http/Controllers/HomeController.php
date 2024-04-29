<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pathway;
use App\Course;
use App\CourseCategory;
use Symfony\Component\HttpFoundation\Cookie;

class HomeController extends Controller
{


    public function index()
    {
        return view('home');
    }

    public function home_page(Request $request)
    {
        $has_cookie = getCookie($request);
        $has_cookie = json_decode($has_cookie);
        $pathways = Pathway::all();
        $categories = CourseCategory::all();

        if (empty($has_cookie)) {
            return view('pages.home');
        }else {
            return view('pages.become_a_teacher')->with('user', $has_cookie)->with('pathways', $pathways)->with('categories', $categories);
        }
    }

    public function become_a_teacher()
    {
        $pathways = Pathway::all();
        $categories = CourseCategory::all();
        $courses = Course::all();

        // return $courses;

        return view('pages.become_a_teacher')->with('pathways', $pathways)->with('categories', $categories)->with('courses', $courses);
    }

    public function closing(Request $request)
    {
        $has_cookie = getCookie($request);
        $has_cookie = json_decode($has_cookie);
        $pathways = Pathway::all();
        $categories = CourseCategory::all();

        if (empty($has_cookie)) {
            return view('pages.home');
        }else {
            return view('pages.closing')->with('user', $has_cookie);
        }
    }

    public function clearCache()
    {
        \Artisan::call('cache:clear');
        return view('clear-cache');
    }
}
