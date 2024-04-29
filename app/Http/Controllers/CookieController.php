<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller {
   public function setCookie(Request $request) {
      $minutes = 10;
      $response = new Response('Hello World');
      $response->withCookie(cookie('name', "Whatever..", $minutes));
      return $response;
   }
   public function getCookie(Request $request) {
      $value = $request->cookie('JGF_User');
      echo $value;
   }
}
