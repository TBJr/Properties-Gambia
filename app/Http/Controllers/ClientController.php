<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlotRequest;
use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\Plot;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function client()
    {
        // $users = User::paginate(15);
        $users = User::where(['role' => 'client'])->paginate(10);
        $plots = Plot::all();
        return view('admin.clients.index', compact('users', 'plots'));
    }

    public function view($id)
    {
        $client = User::where('id', $id)->get();
        $plots = Plot::all();
        return view('admin.clients.view', compact('client', 'plots'));
    }

    public function clientUpdate()
    {
        $users = User::all();
        return view('admin.user.client', compact('users'));
    }
    
    public function myClient() 
    {
        $users = User::all();
        $plots = Plot::all();
        return view('admin.clients.myclient', compact('users', 'plots'));
        
    }

    public function siteVisit($id) {
        $plots = Plot::where('id', $id)->first();
        $plots->update(['active' => 1]);
        return back()->with('success', 'The SITE VISIT has been completed!');
    }

    public function alkalo($id) {
        $plots = Plot::where('id', $id)->first();
        $plots->update(['stage' => 'alkalo']);
        return back()->with('success', 'The ALKALO process has been completed!');
    }

    public function sketchPlan($id) {
        $plots = Plot::where('id', $id)->first();
        $plots->update(['stage' => 'sketch_plan']);
        return back()->with('success', 'The SKETCH PLAN process has been completed!');
    }

    public function physicalPlan($id) {
        $plots = Plot::where('id', $id)->first();
        $plots->update(['stage' => 'physical_plan']);
        return back()->with('success', 'The PHYSICAL PLAN process has been completed!');
    }

    public function areaCouncil($id) {
        $plots = Plot::where('id', $id)->first();
        $plots->update(['stage' => 'areal_council']);
        return back()->with('success', 'The AREA COUNCIL process has been completed!');
    }

    public function chiefApproval($id) {
        $plots = Plot::where('id', $id)->first();
        $plots->update(['stage' => 'chief_approval']);
        return back()->with('success', 'The CHIEF APPROVAL process has been completed!');
    }

    public function capitalGains($id) {
        $plots = Plot::where('id', $id)->first();
        $plots->update(['stage' => 'capital_gains']);
        return back()->with('success', 'The CAPITAL GAINS process has been completed!');
    }

    public function dhlPickup($id) {
        $plots = Plot::where('id', $id)->first();
        $plots->update(['stage' => 'DHL/Client_pickup']);
        return back()->with('success', 'The PICKUP process has been completed!');
    }

    public function create()
    {
        $client = User::all();
        $countries = Country::all()->pluck('country_name','id');

        return view('admin.clients.create', compact('client', 'countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:15|alpha_num',
            'phone' => 'required',
            'gender' => 'required',
            'profession' => 'required',
            'country' => 'required',
        ]);

        $client = new User;
            $client->fname = $request->fname;
            $client->mname = $request->mname;
            $client->lname = $request->lname;
            $client->email =  $request->email;
            $client->phone =  $request->phone;
            $client->role = $request->role;
            $client->profession = $request->profession;
            $client->country = $request->country;
            $client->password = bcrypt($request->password);
            $client->assignRole('client'); //assign role to user

            $client->save();

        return "ok";
    }

    // public function getStates($id){
    // 	$states= State::where('country_id',$id)->pluck('state_name','id');
    //     return json_encode($states);
    // }

    // public function getCities($id){
    // 	$cities= City::where('state_id',$id)->pluck('city_name','id');
    //     return json_encode($cities);
    // }

    public function getCities($id){
    	$states= City::where('country_id',$id)->pluck('city_name','id');
        return json_encode($states);
    }

}
