<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidate;
use App\Mail\CandidateEmail;

class EmailController extends Controller
{
    function sendMail($id){

        $candidate = Candidate::where("id", $id)->first();
        
        \Mail::to($candidate->email)->send(new CandidateEmail($candidate));
    }
}
