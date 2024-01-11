@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Order Tracker</div>

                <div class="panel-body">
                <strong>Status:</strong> {{ $order->status->name }} <br>
                </div>

                <div>
                    @if($order->status->id === 5)
                    <div>
                        <img src="https://media1.giphy.com/media/9nOpqeHpr0efdfJ1rd/giphy.gif?cid=6c09b952y9apni2g94l826pbz0sr6msezil9391qotrcfv47&ep=v1_internal_gif_by_id&rid=giphy.gif&ct=s">
                        <p class="panel-body">Your {{ $order->size }}, {{ $order->toppings }}, {{ $order->instructions }} pizza is handed to delivery guy.</p>
                        @if ($order->estimation != '')
                            <p class="panel-body"><strong>Estimated time for delivery:</strong> {{ $order->estimation }} </p>
                        @endif
                        @if ($order->deliveryman->id != '')
                        <p class="panel-body"><strong>Your deliveryman:</strong> {{ $order->deliveryman->name }} </p>
                        @endif
                    </div>
                    
                    @elseif($order->status->name === 'Delivered')
                    <div>
                        <img src="https://i.pinimg.com/originals/1e/06/d9/1e06d9d7edcb35a04b6fc79c0e30ea00.gif">
                        <p class="panel-body">Your pizza delivery is completed. Thank you for ordering.</p>
                    </div>
                    
                    @else 
                    <div>
                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/c1c191fe-10b9-4887-9cd7-af2ecdedf77b/d8mvtuo-bff8f908-043f-4437-965c-8975b019a127.gif?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2MxYzE5MWZlLTEwYjktNDg4Ny05Y2Q3LWFmMmVjZGVkZjc3YlwvZDhtdnR1by1iZmY4ZjkwOC0wNDNmLTQ0MzctOTY1Yy04OTc1YjAxOWExMjcuZ2lmIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.9FXCL4y8hx7JxmffFFfOm6JYhj5uTuQ1AIT0kEqa-Cc">
                        <p class="panel-body">Your {{ $order->size }}, {{ $order->toppings }}, {{ $order->instructions }} pizza is preparing ... </p>
                    </div>
                    @endif
                </div>
            
                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <order-progress status="{{ $order->status->name}}" initial=" {{ $order->status->percent }}" order_id="{{ $order->id }}"></order-progress>

                    <order-alert user_id="{{ auth()->user()->id }}"></order-alert>



                    <hr>

                    <div class="order-details">
                        <strong>Order ID:</strong> {{ $order->id }} <br>
                        <strong>Size:</strong> {{ $order->size }} <br>
                        <strong>Toppings:</strong> {{ $order->toppings }} <br>

                        @if ($order->instructions != '')
                            <strong>Instructions:</strong> {{ $order->instructions }}
                        @endif

                    </div>

                    <a class="btn btn-primary" href="{{ route('user.orders') }}">Back to Orders</a>

                </div> <!-- end panel-body -->
            </div> <!-- end panel -->
        </div>
    </div>
</div>
@endsection
