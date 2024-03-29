<?php

namespace App\Http\Controllers;

use App\Order;
use App\Status;
use App\Deliveryman;
use Illuminate\Http\Request;
use App\Events\OrderStatusChanged;

class AdminOrdersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['customer', 'status', 'deliveryman'])->get();

        return view('admin.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $statuses = Status::all();
        $currentStatus = $order->status_id;

        $deliverymen = Deliveryman::all();
        $currentDeliveryman = $order->deliveryman_id;

        return view('admin.edit', compact('order', 'statuses', 'currentStatus', 'deliverymen', 'currentDeliveryman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status_id' => 'required|numeric',
            'deliveryman_id' => 'required|numeric',
        ]);

        $order->status_id = $request->status_id;
        $order->deliveryman_id = $request->deliveryman_id;
        $order->estimation = $request->estimation;
        $order->save();

        event(new OrderStatusChanged($order));

        return back()->with('message', 'Order Status updated successfully!');
    }
}
