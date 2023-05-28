@extends('users.layout')

@section('content')
    <form method="POST" action="{{ route('category.store', [$category]) }}">
        @csrf
        @method('PUT')
        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Category Information</h3>
            </div>
            <div class="mt-6 border-t border-gray-100 gap-x-8">
                <dl class="divide-y divide-gray-100 border-b border-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Category name</dt>

                        <input type="text" name="name" id="name" autocomplete="name"
                            class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                        value="{{ $category->name }}">

                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Parent</dt>

                        <select id="parent_id" name="parent_id" autocomplete="parent_id"
                            class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            @foreach ($categories as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}
                                </option>
                            @endforeach
                            <option value="{{ null }}">No Parent
                            </option>
                        </select>
                        @error('parent_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </dl>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6 xl:px-72 mb-72">
            <a href="{{ route('admin.categories') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-sm bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
@endsection
