<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;

class PaisController extends Controller
{
    public function selectCountry()
    {
      $response = Curl::to('https://restcountries.eu/rest/v2/all')->get();
      dd(json_decode($response, true));
    }
}
