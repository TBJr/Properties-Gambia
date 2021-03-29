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
use Illuminate\Support\Facades\DB;
use Spartie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\facades\Image;
use Illuminate\Notifications\Notification;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Plot $plot)
    {
        $this->middleware('auth');
        $this->plot = $plot;
    }
    
    public function alkalo()
    {
        return view();
    }

    public function index()
    {
        //
        // $plot = Plot::latest()->paginate(5);

        // return view('plot.index', compact('plot'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        $plot = Plot::all();
        $users = User::all();
        return view('plot.index', compact('plot', 'users'));
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
        $plot = Plot::all();

        return view('plot.create', compact('properties', 'plot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotRequest $request)
    {

        $this->validate($request, [
            'plot_name' => 'required',
            'plot_address' => 'required | min:4',
            'properties_id' => 'required',
            'plot_coordinate' => 'required',
            'plot_number' => 'required',
            'status' => 'required',
            'plot_size' => 'required',
            'plot_imgs' => 'required',
            'plot_imgs.*' => 'required|image|max:5084',
        ]);

        if($request->hasfile('plot_imgs'))
            {
                $count = 0;
                foreach($request->file('plot_imgs') as $file)
                {
                    $name = $request->plot_name . "_" . $count. "." . $file->getClientOriginalExtension();
                    $path = public_path() . '/uploads/Img/PlotImg/';
                    $file->move($path, $name);
                    $Imgdata[] = $name;

                    $count = $count + 1;
                }
            }

            else
            {
                $banner_data = 'noimg';
            }

        $plot = new Plot();
            $plot->plot_name = $request->plot_name;
            $plot->properties_id = $request->properties_id;
            $plot->plot_address = $request->plot_address;
            $plot->plot_coordinate = $request->plot_coordinate;
            $plot->status = $request->status;
            $plot->plot_size = $request->plot_size;
            $plot->plot_number = $request->plot_number;
            $plot->plot_imgs = json_encode($Imgdata);
            
            $plot->save();

       
            
        return redirect()->route('plot.index')->with('success', 'The plot has been added with success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plot $plot)
    {
        //
        return view('plot.show', compact('plot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plot $plot)
    {
        //
        return view('plot.edit', compact('plot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdatePlotRequest $request, Plot $plot)
    // {
    //     //
    //     $plot->update($request->all());

    //     return redirect()->route('plot.index')->with('success', 'The Plot has been updated!');
    // }
    public function update(Request $request, Plot $plot)
    {
        $request->validate([
            'users_id' => 'required',
            'status' => 'required',
        ]);
        $plot->update($request->all());

        return redirect()->route('plot.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plot $plot)
    {
        //
        $plot->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlotRequest $request)
    {
        Plot::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // public function view()
    // {
    //     $plot = Plot::where('id', $id)->first();
    //     $properties = Properties::with('users', 'plots')->get();
        
    //     return view('plot.view', compact('properties', 'plot'));
    // }

    public function view($id)
    {
        $plot = Plot::where('id', $id)->get();
        $properties = Properties::with('users', 'plots')->get();
        
        return view('plot.view', compact('properties', 'plot'));
    }

    public function search($search){

        $plot = Plot::where(function($query) use ($search){
            $query->where('plot_name','LIKE',"%$search%")->
            orWhere('plot_address','LIKE',"%$search%");
        })->get();

        return response()->json([
            'plots' => $plot,
        ]);
    }

}
