<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ChartController extends Controller
{
    public function applicants_over_time()
    {
        $data = new \stdClass;


        /* 
        Chart X-axis START 
        Chart dates from begining to now
        
        */
        // $chart_dates = User::where('role', 'Candidate')->get('created_at');
        $chart_dates = DB::table('candidates')->get('created_at');

        $chart_dates_data = [];
        $chart_dates_function = [];

        $today_date = Carbon::now();
        $start_date = "2021-09-01 00:00:01";
        $start_date = Carbon::parse($start_date);
        $running_days = CarbonPeriod::create($start_date, $today_date); 
        $chart_dates_only = [];
        $chart_dates_data = $running_days->toArray();

        foreach ($chart_dates_data as $i => $val) {
                $chart_dates_data[$i] = $val->format('Y-m-d');
                array_push($chart_dates_only, $val->format('d M'));
        }
      /* 
        Chart X-axis END 
        Chart dates from begining to now
        
      */

      /* 
        New applicants START

      */

        $new_data = [];

        // $new_users = User::where('role', 'Candidate')->orderBy('created_at', 'asc')->where('overall_status', 'new')->get(['id', 'created_at']);
        $new_users = DB::table('candidates')->orderBy('created_at', 'asc')->get(['id', 'created_at']);
        // $user_created_at = Carbon::parse($new_users[4]->created_at);
        
        for ($i=0; $i < count($chart_dates_data); $i++) { 
            $count = 0;
            for ($k=0; $k < count($new_users); $k++) { 
                $user_created_at = Carbon::parse($new_users[$k]->created_at)->format('Y-m-d');
                $user_created_at = explode('-', $user_created_at);
                $user_created_at = Carbon::createMidnightDate($user_created_at[0], $user_created_at[1], $user_created_at[2], 'GMT');
                $start = $chart_dates_data[$i];
                $start = explode('-', $start);
                $start = Carbon::createMidnightDate($start[0], $start[1], $start[2], 'GMT');
           
                if ($start->diffInDays($user_created_at) == 0) {
                    $count++;
                }
              
            }
            array_push($new_data, $count);
        }
        
        foreach ($new_data as $i => $val) {
            if ($i > 0) {
                $new_data[$i] = $new_data[$i - 1] + $val;
            }
        }

        /* 
        Completed applicants START
        
        */

        $completed_data = [];

        // $completed_users = User::where('role', 'Candidate')->where('overall_status', 'Completed')->orderBy('updated_at', 'asc')->get(['id', 'last_login']);
        $completed_users = DB::table('candidates')->orderBy('updated_at', 'asc')->get(['id', 'updated_at']);
        // $user_created_at = Carbon::parse($new_users[4]->created_at);
        
        for ($i=0; $i < count($chart_dates_data); $i++) { 
            $count = 0;
            for ($k=0; $k < count($completed_users); $k++) { 
                $user_created_at = Carbon::parse($completed_users[$k]->updated_at)->format('Y-m-d');
                $user_created_at = explode('-', $user_created_at);
                $user_created_at = Carbon::createMidnightDate($user_created_at[0], $user_created_at[1], $user_created_at[2], 'GMT');
                $start = $chart_dates_data[$i];
                $start = explode('-', $start);
                $start = Carbon::createMidnightDate($start[0], $start[1], $start[2], 'GMT');
           
                if ($start->diffInDays($user_created_at) == 0) {
                    $count++;
                }
              
            }
            array_push($completed_data, $count);
        }
        
        foreach ($completed_data as $i => $val) {
            if ($i > 0) {
                $completed_data[$i] = $completed_data[$i - 1] + $val;
            }
        }

        /* 
        
        Total applications START

        */
        $total_data = [];

        // $total_users = User::where('role', 'Candidate')->orderBy('created_at', 'asc')->get(['id', 'created_at']);
        $total_users = DB::table('candidates')->orderBy('created_at', 'asc')->get(['id', 'created_at']);
        
        // $user_created_at = Carbon::parse($new_users[4]->created_at);
        
        for ($i=0; $i < count($chart_dates_data); $i++) { 
            $count = 0;
            for ($k=0; $k < count($total_users); $k++) { 
                $user_created_at = Carbon::parse($total_users[$k]->created_at)->format('Y-m-d');
                $user_created_at = explode('-', $user_created_at);
                $user_created_at = Carbon::createMidnightDate($user_created_at[0], $user_created_at[1], $user_created_at[2], 'GMT');
                $start = $chart_dates_data[$i];
                $start = explode('-', $start);
                $start = Carbon::createMidnightDate($start[0], $start[1], $start[2], 'GMT');
           
                if ($start->diffInDays($user_created_at) == 0) {
                    $count++;
                }
              
            }
            array_push($total_data, $count);
        }
        
        foreach ($total_data as $i => $val) {
            if ($i > 0) {
                $total_data[$i] = $total_data[$i - 1] + $val;
            }
        }
    

        $data->chart_dates = $chart_dates_only;
        $data->new_applicants = $new_data;
        $data->completed_applicants = $completed_data;
        $data->total_applicants = $total_data;
        // $data->count_new = count($new_data);
        // $data->count_completed = count($completed_applicants);
        // $data->chart_function_data = $chart_dates_function;

        return response()->json($data);
    }

    public function gender_chart()
    {
        $data = new \stdClass;

        $male = DB::table('candidates')->where('gender', 'Male')->get();
        $female = DB::table('candidates')->where('gender', 'Female')->get();
        $no_option = DB::table('candidates')->where('gender', "I dont't see my option here")->get();
        $prefer_not_to_say = DB::table('candidates')->where('gender', 'Prefer not to say')->get();
        $data->male = count($male);
        $data->female = count($female);
        $data->no_option = count($no_option);
        $data->prefer_not_to_say = count($prefer_not_to_say);

        return response()->json($data);
    }

    public function age_chart()
    {
        $data = new \stdClass;

        $data->{"<18s"} = DB::table('candidates')->where('age', 'I am under 18')->count();
        $data->{"<20s"} = DB::table('candidates')->where('age', 'I am between 18 - 20')->count();
        $data->{"<25s"} = DB::table('candidates')->where('age', 'I am between 20-25')->count();
        $data->{"<30s"} = DB::table('candidates')->where('age', 'I am between 25- 30')->count();
        $data->{"<35s"} = DB::table('candidates')->where('age', 'I am between 30-35')->count();
        $data->{"<40s"} = DB::table('candidates')->where('age', 'I am between 35-40')->count();
        $data->{"<45s"} = DB::table('candidates')->where('age', 'I am between 40-45')->count();
        $data->{">45s"} = DB::table('candidates')->where('age', 'I am 45+')->count();

        return response()->json($data);
    }

    public function university_chart()
    {
        $data = new \stdClass;

        $data->{"CPUT"} = DB::table('candidates')->where('university', 'Cape Peninsula University of Technology')->count();
        $data->{"CUT"} = DB::table('candidates')->where('university', 'Central University of Technology')->count();
        $data->{"DUT"} = DB::table('candidates')->where('university', 'Durban University of Technology')->count();
        $data->{"MUT"} = DB::table('candidates')->where('university', 'Mangosuthu University of Technology')->count();
        $data->{"NWU"} = DB::table('candidates')->where('university', 'North-West University')->count();
        $data->{"RU"} = DB::table('candidates')->where('university', 'Rhodes University')->count();
        $data->{"SMHSU"} = DB::table('candidates')->where('university', 'Sefako Makgatho Health Sciences University')->count();
        $data->{"SPU"} = DB::table('candidates')->where('university', 'Sol Plaatjie University')->count();
        $data->{"TUT"} = DB::table('candidates')->where('university', 'Tshwane University of Technology')->count();
        $data->{"UNISA"} = DB::table('candidates')->where('university', 'UNISA')->count();
        $data->{"UCT"} = DB::table('candidates')->where('university', 'University of Cape Town')->count();
        $data->{"UJ"} = DB::table('candidates')->where('university', 'University of Johannesburg')->count();
        $data->{"UP"} = DB::table('candidates')->where('university', 'University of Pretoria')->count();
        $data->{"UW"} = DB::table('candidates')->where('university', 'University of Witswatersrand')->count();
        $data->{"UWC"} = DB::table('candidates')->where('university', 'University of the Western Cape')->count();
        $data->{"UFH"} = DB::table('candidates')->where('university', 'University of Fort Hare')->count();
        $data->{"UKN"} = DB::table('candidates')->where('university', 'University of KwaZulu-Natal')->count();
        $data->{"UL"} = DB::table('candidates')->where('university', 'University of Limpopo')->count();
        $data->{"UM"} = DB::table('candidates')->where('university', 'University of Mpumalanga')->count();
        $data->{"US"} = DB::table('candidates')->where('university', 'University of Stellebosch')->count();
        $data->{"UFS"} = DB::table('candidates')->where('university', 'University of the Free State')->count();
        $data->{"UV"} = DB::table('candidates')->where('university', 'University of Venda')->count();
        $data->{"UZ"} = DB::table('candidates')->where('university', 'University of Zululand')->count();
        $data->{"VUT"} = DB::table('candidates')->where('university', 'Vaal University of Technology')->count();
        $data->{"WSU"} = DB::table('candidates')->where('university', 'Walter Sisulu University')->count();
        $data->{"other"} = DB::table('candidates')->where('university', 'Other')->count();

        return response()->json($data);
    }
}


