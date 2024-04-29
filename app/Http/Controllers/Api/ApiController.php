<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pathway;
use App\Requirement;
use App\Course;
use App\Candidate;

class ApiController extends Controller
{
    //SEARCH REQUEST

    public function getPathways(Request $request){

        $search = $request->search;

        if($search == ''){
           $pathways = Pathway::orderby('name','asc')->select('id','name')->get();
        }else{
           $pathways = Pathway::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->get();
        }

        $response = array();
        foreach($pathways as $pathway){
           $response[] = array("value"=>$pathway->id,"label"=>$pathway->name);
        }

        return response()->json($response);
     }

     public function getPathway($name){

      $pathway = Pathway::where('name', $name)->first();
      return $pathway;
   }

   public function getRequirements($id){

      $requirements = Requirement::where('pathway_id', $id)->get();
      return $requirements;
   }

   public function getCourses($course){
      $courses = Course::where('category_id', $course)->get();
      return $courses;
   }

   public function add_requirements(Request $request)
   {
      return "Test";
   }

   public function unopt($id)
   {
      $candidate = Candidate::where('id', $id)->first();

      $candidate->opt_in = false;

      $candidate->save();

      return "Successfully unsubscribed";
   }

   public function getPathwaysFromRequirements(Request $request)
   {
      $requirements = $request->courseList;

      // return $requirements;

      $return_data = new \stdClass;
      $single_requirement_list = array();
      $pathways = array();

      // for ($i=0; $i < count($requirements); $i++) { 

      //    $single_req = Requirement::where('course_1_id', $requirements[$i])->whereNull(['course_2_id', 'course_3_id'])->first();
         
      //    if (!empty($single_req)) {
      //       $pathway = Pathway::where('id', $single_req->pathway_id)->first();
      //       array_push($single_requirement_list, $single_req);
      //       array_push($pathways, $pathway);
      //    }
      // }
      $single_requirement_list = Requirement::whereIn('course_1_id', $requirements)->whereNull(['course_2_id', 'course_3_id'])->get();

         $return_data->single_requirement_list = $single_requirement_list;

         foreach ($single_requirement_list as $item) {
            if (!empty($item)) {
               $pathway = Pathway::where('id', $item->pathway_id)->first();
               array_push($pathways, $pathway);
            }
         }


      $pathways = array_values(array_unique($pathways));

      $double_requirement_list = array();
      if (count($requirements) > 1) {
         
         $double_requirement_list = Requirement::whereIn('course_1_id', $requirements)->whereIn('course_2_id', $requirements)->whereNull('course_3_id')->get();

         $return_data->double_requirement_list = $double_requirement_list;

         foreach ($double_requirement_list as $item) {
            if (!empty($item)) {
               $pathway = Pathway::where('id', $item->pathway_id)->first();
               array_push($pathways, $pathway);
            }
         }
      }

      $triple_requirement_list = array();

      if (count($requirements) > 2) {
         
         $triple_requirement_list = Requirement::whereIn('course_1_id', $requirements)->whereIn('course_2_id', $requirements)->whereIn('course_3_id', $requirements)->get();

         $return_data->triple_requirement_list = $triple_requirement_list;

         foreach ($triple_requirement_list as $item) {
            if (!empty($item)) {
               $pathway = Pathway::where('id', $item->pathway_id)->first();
               array_push($pathways, $pathway);
            }
         }
      }

      $pathways_unique = array_unique($pathways);
      $pathways_filter = array_filter($pathways_unique);
      $pathways_fixed = array_values($pathways_filter);
      
      // return $pathways_fixed;

      $return_data->single_requirement_list = $single_requirement_list;
      $return_data->pathways = $pathways_fixed;

      return response()->json($return_data);
   }
}
