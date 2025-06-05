@extends('dashboard.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Total</th>
                <th>Placed At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Guest' }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
