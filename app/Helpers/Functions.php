<?php

use Illuminate\Http\Request;
use App\Candidate;
use App\Mail\CandidateEmail;

function getCookie(Request $request)
{
    $value = $request->cookie('JGF_User');
      return $value;
}

function sendEmail($id)
{
    $candidate = Candidate::where("id", $id)->first();
          
    \Mail::to($candidate->email)->send(new CandidateEmail($candidate));
}
