@extends('layout')

@section('content')

<div class="bg-white">
  <div
    x-data="{ open: false }" 
    @keydown.window.escape="open = false"
  >
    <!--
      Mobile filter dialog
    -->
    <div 
      x-show="open" 
      class="relative z-40 lg:hidden" 
      style="display: none;"
    >
      <div 
        x-show="open" 
        x-transition:enter="transition-opacity ease-linear duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition-opacity ease-linear duration-300" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="fixed inset-0 bg-black bg-opacity-25" 
        style="display: none;"
      ></div>

      <div class="fixed inset-0 z-40 flex">
        <div 
          x-show="open" 
          x-transition:enter="transition ease-in-out duration-300 transform" 
          x-transition:enter-start="translate-x-full" 
          x-transition:enter-end="translate-x-0" 
          x-transition:leave="transition ease-in-out duration-300 transform" 
          x-transition:leave-start="translate-x-0" 
          x-transition:leave-end="translate-x-full" 
          class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl" 
          @click.away="open = false" 
          style="display: none;"
        >
          <div class="flex items-center justify-between px-4">
            <h2 class="text-lg font-medium text-gray-800">Filters</h2>
            <button                     
              type="button" 
              class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400" 
              @click="open = false"
            >
              <span class="sr-only">Close menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Filters -->
          <form class="mt-4 border-t border-gray-200">
              @csrf
              <x-product-filter-mobile :filters="$brands" filterName="brand" filterTitle="Brand" attribute=""/>
              <x-product-filter-mobile :filters="$countries" filterName="country" filterTitle="Country" attribute=""/>
              <x-product-filter-mobile :filters="$sizes" filterName="size" filterTitle="Size" attribute="L"/>
              <x-product-filter-mobile :filters="$alcohol_vlms" filterName="alcohol_vlm" filterTitle="Alcohol volume" attribute="%"/>
          </form>
        </div>
      </div>
    </div>
    
    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-12">
        <h1 class="text-4xl font-bold tracking-tight text-gray-800"> {{ $categoryName }} </h1>
        <div class="flex-1 mx-auto max-w-5xl visible lg:invisible" >
          @include('partials._search')
        </div>
        <div class="flex items-center">
          <x-product-sort/>

          <button 
            type="button" 
            class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden" 
            @click="open = true"
          >
            <span class="sr-only">Filters</span>
            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>

      <section aria-labelledby="products-heading" class="pb-24 pt-6">
        <h2 id="products-heading" class="sr-only">Products</h2>

        <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
          <!-- Filters -->
          <div id="product-filters">
            <form id="product-filter-form" class="hidden lg:block" method="GET">
              @csrf
              <x-product-filter :filters="$brands" filterName="brand" filterTitle="Brand" attribute=""/>
              <x-product-filter :filters="$countries" filterName="country" filterTitle="Country" attribute=""/>
              <x-product-filter :filters="$sizes" filterName="size" filterTitle="Size" attribute="L"/>
              <x-product-filter :filters="$alcohol_vlms" filterName="alcohol_vlm" filterTitle="Alcohol volume" attribute="%"/>
            </form>
          </div>
            
          <div class="lg:col-span-3"> 
            <div id="product-cards-container">
              @include('partials._product-cards', ['products' => $products])
            </div>
            <div class="mt-6 p-4">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</div>

@endsection

@section('scripts')
<script>
  /*
  function updateFilter() {
      // Make an AJAX call to the endpoint with the selected filter and sort values
      const formData = new FormData(document.querySelector('#product-filter-form'));
      fetch('/products', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text())
      .then(data => {
          // Replace the product cards container with the new filtered products view
          document.querySelector('#product-cards-container').innerHTML = data;
      });
  }
  */
</script>
@endsection