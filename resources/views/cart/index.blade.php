@extends('layouts')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Votre Panier</h2>
    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" width="60">
                            <span>{{ $item['name'] }}</span>
                        </td>
                        <td>{{ number_format($item['price'], 0) }} د.ت</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 0) }} د.ت</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end fw-bold fs-5">
            Total : {{ number_format($total, 0) }} د.ت
        </div>
        <a href="{{ route('checkout.show') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Checkout</a>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
