<h2>
    {{ isset($category) ? $category->name : 'All Products' }}
</h2>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

@foreach($products as $product)
    <div style="border:1px solid #ccc; padding:10px; width:200px;">

        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" width="100%">
        @endif

        <h4>{{ $product->name }}</h4>
        <p>₹{{ $product->price }}</p>
        <p>{{ $product->category->name ?? '' }}</p>

    </div>
@endforeach

</div>
