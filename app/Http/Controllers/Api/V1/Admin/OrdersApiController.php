<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\Admin\OrderResource;
use App\Models\Orders;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrdersApiController extends Controller
{
    public function index()
    {
        return new OrderResource(Orders::with(['products'])->get());
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Orders::create($request->all());
        $order->products()->sync($request->input('products', []));

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Orders $order)
    {
        return new OrderResource($order->load(['products']));
    }

    public function update(UpdateOrderRequest $request, Orders $order)
    {
        $order->update($request->all());
        $order->products()->sync($request->input('products', []));

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Orders $order)
    {
        $order->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
