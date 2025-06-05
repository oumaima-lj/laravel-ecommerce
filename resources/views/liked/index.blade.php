@include('components.navbar')

<div class="container py-5">
    <h2 class="mb-4">Liked Items</h2>
    @if($likedItems->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($likedItems as $item)
                    <tr>
                        <td>
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="60">
                            @endif
                            <span>{{ $item->name }}</span>
                        </td>
                        <td>${{ number_format($item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You haven't liked any items yet.</p>
    @endif
</div>
