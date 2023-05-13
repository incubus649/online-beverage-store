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
      x-description="Off-canvas filters for mobile, show/hide based on off-canvas filters state." 
      x-ref="dialog" 
      aria-modal="true" 
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
        x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state." 
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
          x-description="Off-canvas menu, show/hide based on off-canvas menu state." 
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
            <h3 class="sr-only">Categories</h3>

            <div                     
              x-data="{ open: false }" 
              class="border-gray-200 px-4 py-6"
            >
              <h3 class="-mx-2 -my-3 flow-root">

                <button 
                  type="button" 
                  x-description="Expand/collapse section button" 
                  class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" 
                  aria-controls="filter-section-mobile-0" 
                  @click="open = !open" 
                  aria-expanded="false" 
                  x-bind:aria-expanded="open.toString()"
                >
                  <span class="font-medium text-gray-800">Color</span>
                  <span class="ml-6 flex items-center">

                    <svg 
                      class="h-5 w-5" 
                      x-description="Expand icon, show/hide based on section open state." 
                      x-show="!(open)" 
                      viewBox="0 0 20 20" 
                      fill="currentColor" 
                      aria-hidden="true"
                    >
                      <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>

                    <svg 
                      class="h-5 w-5" 
                      x-description="Collapse icon, show/hide based on section open state." 
                      x-show="open" 
                      viewBox="0 0 20 20" 
                      fill="currentColor" 
                      aria-hidden="true" 
                      style="display: none;"
                    >
                      <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                    </svg>
                  </span>
                </button>
              </h3>

              <div 
                class="pt-6" 
                x-description="Filter section, show/hide based on section state." 
                id="filter-section-mobile-0" 
                x-show="open" 
                style="display: none;"
              >
                <div class="space-y-6">
                  <div class="flex items-center">
                    <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                    <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">White</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                    <label for="filter-mobile-color-1" class="ml-3 min-w-0 flex-1 text-gray-500">Beige</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                    <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Blue</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                    <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Brown</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                    <label for="filter-mobile-color-4" class="ml-3 min-w-0 flex-1 text-gray-500">Green</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                    <label for="filter-mobile-color-5" class="ml-3 min-w-0 flex-1 text-gray-500">Purple</label>
                  </div>
                </div>
              </div>
            </div>
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
          <div 
            x-data="{openSort: false}" 
            x-init="init()" 
            @keydown.escape.stop="openSort = false; focusButton()" 
            class="relative inline-block text-left"
          >
            <div>
              <button 
                type="button" 
                class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-800" 
                id="menu-button" 
                x-ref="button" 
                @click="openSort = !openSort" 
                aria-expanded="false" 
                aria-haspopup="true"
                x-bind:aria-expanded="open.toString()" 
              >
                Sort
                <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>

            <div 
              x-show="openSort" 
              x-transition:enter="transition ease-out duration-100" 
              x-transition:enter-start="transform opacity-0 scale-95" 
              x-transition:enter-end="transform opacity-100 scale-100" 
              x-transition:leave="transition ease-in duration-75" 
              x-transition:leave-start="transform opacity-100 scale-100" 
              x-transition:leave-end="transform opacity-0 scale-95" 
              class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none" 
              x-ref="menu-items" 
              x-description="Dropdown menu, show/hide based on menu state." 
              x-bind:aria-activedescendant="activeDescendant" 
              role="menu" 
              aria-orientation="vertical" 
              aria-labelledby="menu-button" 
              tabindex="-1" 
              @keydown.tab="open = false" 
              @keydown.enter.prevent="open = false; focusButton()" 
              @keyup.space.prevent="open = false; focusButton()" 
              style="display: none;"
            >
              <div 
                x-data="{ selected: 'menu-item-1' }" 
                class="py-1" 
                role="none"
              >
                <a 
                  href="#" 
                  class="text-gray-500 block px-4 py-2 text-sm"
                  role="menuitem" 
                  tabindex="-1" 
                  id="menu-item-1"
                  x-on:click.prevent="selected = 'menu-item-1'"
                  x-bind:class="{ 'bg-gray-100': selected === 'menu-item-1', 'text-gray-800 font-medium': selected === 'menu-item-1', 'text-gray-500': selected !== 'menu-item-1' }"
                >
                  Newest
                </a>
                <a 
                  href="#" 
                  class="text-gray-500 block px-4 py-2 text-sm"
                  role="menuitem" 
                  tabindex="-1" 
                  id="menu-item-2"
                  x-on:click.prevent="selected = 'menu-item-2'"
                  x-bind:class="{ 'bg-gray-100': selected === 'menu-item-2', 'text-gray-800 font-medium': selected === 'menu-item-2', 'text-gray-500': selected !== 'menu-item-2' }"
                >
                  Price: Low to High
                </a>
                <a 
                  href="#" 
                  class="text-gray-500 block px-4 py-2 text-sm"
                  role="menuitem" 
                  tabindex="-1" 
                  id="menu-item-3"
                  x-on:click.prevent="selected = 'menu-item-3'"
                  x-bind:class="{ 'bg-gray-100': selected === 'menu-item-3', 'text-gray-800 font-medium': selected === 'menu-item-3', 'text-gray-500': selected !== 'menu-item-3' }"
                >
                  Price: High to Low
                </a>
              </div>
            </div>
          </div>

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
          </div>
        </div>
      </section>
    </main>
  </div>
</div>

@endsection

@section('scripts')
<script>
  // Add event listener to the filter checkboxes
  document.querySelectorAll('#product-filter-form input[type=checkbox]').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
          // Make an AJAX call to the endpoint with the selected filter values
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
      });
  });
</script>
@endsection