<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPropertiesRequest;
use App\Http\Requests\StorePropertiesRequest;
use App\Http\Requests\UpdatePropertiesRequest;
use App\Models\Properties;
use App\Models\User;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spartie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\facades\Image;
use Illuminate\Notifications\Notification;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Properties $properties)
    {
        $this->middleware('auth');

        $this->properties = $properties;
    }

    public function index()
    {
        $plots = Plot::all();
        $properties = Properties::with('users', 'plots')->get();

        return view('admin.properties.index', compact('properties', 'plots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $properties = Properties::all();

        return view('admin.properties.create', compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertiesRequest $request)
    {
        // 
        $this->validate($request, [
            'property_name' => 'required',
            'property_address' => 'required | min:4',
            'property_coordinate' => 'required',
            'property_price' => 'required',
            'property_size' => 'required',
            'property_imgs' => 'required',
            'property_imgs.*' => 'required|image',
            'description' => 'required',
        ]);

            
        if($request->hasfile('property_imgs'))
            {
                $count = 0;
                foreach($request->file('property_imgs') as $file)
                {
                    $name = $request->property_name . "_" . $count. "." . $file->getClientOriginalExtension();
                    $path = public_path() . '/uploads/Img/PropertyImg/';
                    $file->move($path, $name);
                    $Imgdata[] = $name;

                    $count = $count + 1;
                }
            }

            else
            {
                $banner_data = 'noimg';
            }

        $properties = new Properties();
            $properties->property_name = $request->property_name;
            $properties->property_address = $request->property_address;
            $properties->property_coordinate = $request->property_coordinate;
            $properties->property_price = $request->property_price;
            $properties->property_size = $request->property_size;
            $properties->property_imgs = json_encode($Imgdata);
            $properties->description = $request->description;
            
            $properties->save();
            
        return redirect()->route('properties.index')->with('success', 'The property has been added with success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Properties $properties)
    {
        $properties = Properties::all();

        return view('admin.properties.view', compact('properties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Properties $properties)
    {
        return view('admin.properties.edit', compact('properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertiesRequest $request, Properties $properties)
    {
        //
        $properties->update($request->all());

        return redirect()->route('properties.index')->with('success', 'The Property has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Properties $properties)
    {
        $properties->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertiesRequest $request)
    {
        Properties::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function view()
    {
        $plots = Plot::all();
        // $properties = Properties::with('users', 'plots')->get();
        $properties = Properties::all();
        
        return view('admin.properties.view', compact('properties', 'plots'));
    }
}
