@extends('layout')

@section('content')

    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="px-6 py-24 xl:px-96 space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h1 class="text-lg mb-12 font-semibold leading-7 text-gray-900">Create New Product</h1>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Product General Information</h2>
                
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- product category -->
                    <div class="sm:col-span-6">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Product category</label>
                        <div class="mt-2">
                            <select id="category" name="category" autocomplete="category-name" class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                @foreach ($categories as $category)
                                    @foreach ($category->children as $child)
                                        <option value="{{$child->id}}">{{$category->name}} / {{$child->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- product name -->
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Product name</label>
                        <div class="mt-2">
                            <div class="flex rounded-sm shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                    value="{{ old('name') }}" placeholder="Château Palmer, Gaja Barbaresco, Highland Park 25 Yr...">
                            </div>
                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- product price -->                   
                    <div class="sm:col-span-2">
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                        <div class="relative mt-2 shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">€</span>
                            </div>
                            <div class="flex rounded-sm shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="price" id="price" class="block flex-1 border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                                    value="{{ old('price') }}" placeholder="0.00">
                            </div>
                        </div>
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div class="col-span-full">
                        <label for="cover" class="block text-sm font-medium leading-6 text-gray-900 pb-8">Product photo</label>
                        <input type="file" id="cover" name="image" class="border border-gray-200 rounded-sm p-2 w-full">
                        @error('cover')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
      
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Product Attributes</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">  </p>
                
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- product brand -->
                    <div class="sm:col-span-6">
                        <label for="brand" class="block text-sm font-medium leading-6 text-gray-900">Brand</label>
                        <div class="mt-2">
                            <div class="flex rounded-sm shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="brand" id="brand" autocomplete="brand" class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                    value="{{ old('brand') }}" placeholder="Jim Beam, Coppola, Mondavi...">
                            </div>
                        </div>
                        @error('brand')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- product country -->
                    <div class="sm:col-span-6">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                        <div class="mt-2">
                            <div class="flex rounded-sm shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="country" id="country" autocomplete="country" class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                    value="{{ old('country') }}" placeholder="Germany, France, Italy...">
                            </div>
                        </div>
                        @error('country')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- product alcohol volume -->
                    <div class="col-span-6 xl:col-span-2">
                        <label for="alcohol_vlm" class="block text-sm font-medium leading-6 text-gray-900">Alcohol volume</label>
                        <div class="relative mt-2 shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">%</span>
                            </div>
                            <div class="flex-1 rounded-sm shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="alcohol_vlm" id="alcohol_vlm" class="block w-full border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                                    value="{{ old('alcohol_vlm') }}" placeholder="0.0">
                            </div>
                        </div>
                        @error('alcohol_vlm')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                        
                    <!-- product size -->
                    <div class="col-span-6 xl:col-span-2">
                        <label for="size" class="block text-sm font-medium leading-6 text-gray-900">Size in litres</label>
                        <div class="relative mt-2 shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">L</span>
                            </div>
                            <div class="flex-1 rounded-sm shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="size" id="size" class="block w-full border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                                    value="{{ old('size') }}" placeholder="0.0">
                            </div>
                        </div>
                        @error('size')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- product stock -->
                    <div class="col-span-6 xl:col-span-2">
                        <label for="stock" class="block text-sm font-medium leading-6 text-gray-900">Stock</label>
                        <div class="mt-2">
                            <div class="flex rounded-sm shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="stock" id="stock" autocomplete="stock" class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                    value="{{ old('stock') }}" placeholder="0">
                            </div>
                        </div>
                        @error('stock')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" autocomplete="description" rows="3" placeholder="Write a few sentences about your product (Optional)" 
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6 flex items-center justify-end gap-x-6 xl:px-96 mb-12">
          <a href="{{ route('listings') }}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
          <button type="submit" class="rounded-sm bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>

@endsection