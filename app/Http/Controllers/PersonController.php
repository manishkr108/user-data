<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PersonController extends Controller
{

  public function fetchPeopleData()
  {
    $jsonData = File::get(public_path('json/data.json'));
    $persons = json_decode($jsonData);

    return view('welcome', compact('persons'));
  }
}
