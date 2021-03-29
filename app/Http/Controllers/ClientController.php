<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlotRequest;
use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Models\Properties;
use App\Models\User;
use App\Models\Plot;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function client()
    {
        $users = User::all();
        return view('user.client', compact('users'));
    }

    public function clientUpdate()
    {
        $users = User::all();
        return view('user.client', compact('users'));
    }
    
    public function myClient() 
    {
        // $client = User::where('id', $id)->first();
        // $plots = Plot::where('id', $id)->first();
        // $client = User::all();
        // $plots = Plot::all();
        // return view('user.myclient', compact('client', 'plots'));

        
        $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);
        return view('dashboard.reservationCreate', compact('hotelInfo'));

        $users = User::all();
        return view('user.myclient', compact('users', 'plot'));
        // return view('user.myclient', compact('users'));
        
    }
}
