<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Http\Resources\Admin\PlotResource;
use App\Models\Plot;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlotApiController extends Controller
{
    public function index()
    {
        return new PlotResource(Plot::all());
    }

    public function store(StorePlotRequest $request)
    {
        $plot = Plot::create($request->all());

        return (new PlotResource($plot))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Plot $plot)
    {
        return new PlotResource($plot);
    }

    public function update(UpdatePlotRequest $request, Plot $plot)
    {
        $plot->update($request->all());

        return (new PlotResource($plot))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Plot $plot)
    {
        $plot->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
