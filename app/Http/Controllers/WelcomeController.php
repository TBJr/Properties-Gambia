<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\Properties;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        // $plots = Plot::all();
        $plots = Plot::where(['status' => 'available'])->get();
        return view('welcome', compact('plots'));
    }
}
