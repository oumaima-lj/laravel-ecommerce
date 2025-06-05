@extends('layouts')

<link href="{{ asset('css/checkout.css') }}" rel="stylesheet">

@import './custom.css';


@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6">Checkout</h2>
    @if(empty($cart))
        <p>Your cart is empty.</p>
    @else
        <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block font-semibold mb-1">Address</label>
                <input type="text" name="address" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Phone Number</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Order Details / Notes</label>
                <textarea name="details" class="w-full border rounded px-3 py-2"></textarea>
            </div>
            <table class="w-full mb-6">
                <thead>
                    <tr>
                        <th class="text-left">Product</th>
                        <th class="text-left">Quantity</th>
                        <th class="text-left">Price</th>
                        <th class="text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cart as $item)
                        @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>${{ number_format($total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-4">
                <strong>Grand Total: ${{ number_format($grandTotal, 2) }}</strong>
            </div>
            <button type="submit" class="checkout-button mt-8">
    Place Order
</button>

        </form>
    @endif
</div>
@endsection
