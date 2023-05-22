@csrf
<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
    <!-- show all products -->
    @forelse ($products as $product)
        <x-product-card :product="$product" />
    @empty
        <div class="">
            No products found!
            Return to <a href="{{ route('home') }}" class="text-slate-950 font-bold">home</a>?
        </div>
    @endforelse
</div>
