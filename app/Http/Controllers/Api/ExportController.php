<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Candidate;

class ExportController extends Controller
{
    public function export_candidates()
    {
        $headers = array();

        // User Headers

        $user_headers="ID,Name,Email,Age range,Gender,University,University other,Opted in,Number of attempts,Created at,Updated at";

        $user_headers = explode(",", $user_headers);
        foreach ($user_headers as $value) {
            array_push($headers, $value);
        }

        $file_name = Carbon::now()->timestamp . "_bat_canditades.csv";

        $file = fopen($file_name, 'w');

        fputcsv($file, $headers);

        $data = array();

        $candidates = Candidate::all();
        foreach ($candidates as $candidate) {

            $fields = array();

            // PERSONAL DETAILS
            
            array_push($fields, $candidate->id);
            array_push($fields, $candidate->name);
            array_push($fields, $candidate->email);
            array_push($fields, $candidate->age);
            array_push($fields, $candidate->gender);
            array_push($fields, $candidate->university);
            array_push($fields, $candidate->university_other);
            array_push($fields, $candidate->opt_in);
            array_push($fields, $candidate->count);
            array_push($fields, $candidate->created_at);
            array_push($fields, $candidate->updated_at);
            
            // ********************

            array_push($data, $fields);
        }
        foreach ($data as $value) {
            fputcsv($file, $value);
        }
        fclose($file);

        return redirect('/' . $file_name);

    }
}
