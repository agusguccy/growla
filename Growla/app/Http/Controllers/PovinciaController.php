<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;


class PovinciaController extends Controller
{
  public function selectProvince()
  {
    $response = Curl::to('https://dev.digitalhouse.com/api/getProvincias')->get();
    dd(json_decode($response, true));
  }
}
