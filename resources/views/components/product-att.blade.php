@props(['product'])

<ul class="flex">
    <li class="flex items-center justify-center">
        @if ($product->alcohol_vlm)
            {{ $product->alcohol_vlm }}%, 
        @endif
        {{ $product->size }}L, 
        {{ number_format($product->price / $product->size, 2) }}€ / L 
    </li>
</ul>