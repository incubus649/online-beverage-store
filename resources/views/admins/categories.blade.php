@extends('users.layout')

@section('content')
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 pb-2 text-gray-900">Categories Information</h3>
            <a class="flex space-x-2" href="{{ route('category.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

                <span class="text-gray-900">Create category</span>
            </a>
        </div>
        <div class="mt-6 border-t border-gray-500 gap-x-8">
            <dl class="divide-y divide-gray-500 border-b border-gray-500">
                @foreach ($categories as $category)
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-1 sm:px-0 hover:bg-gray-200">
                        <dt class="text-sm font-medium leading-6 text-gray-900 col-span-3">Category Nr. <span
                                class="font-bold">{{ $category->id }}</span></dt>

                        <dd class="text-sm leading-6 text-gray-700 sm:mt-0 col-span-3">Category name: <span
                                class="font-bold">{{ $category->name }}</span></dd>

                        <dd class="text-sm font-medium py-1 leading-6 text-gray-900 mb-2 col-span-3">
                            <a class="flex space-x-2" href="{{ route('category.edit', [$category]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="darkgreen" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                <span class="text-gray-900">Edit</span>
                            </a>
                        </dd>

                        <dd class="text-sm font-medium leading-6 text-gray-900 col-span-3">
                            <form method="POST" action="{{ route('category.destroy', [$category]) }}">
                                @csrf
                                @method('DELETE')

                                <button class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="darkred" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    <span class="text-gray-900">Delete</span>
                                </button>
                            </form>
                        </dd>


                    </div>
                    @foreach ($category->children as $child)
                        <div class="px-4 py-1 text-sm sm:grid sm:grid-cols-3 sm:gap-1 sm:px-0 hover:bg-gray-200">
                            <dt class=" pl-12 font-medium leading-6 text-gray-900 ">Category Nr. <span
                                    class="font-bold">{{ $child->id }}</span></dt>

                            <dd class="pl-12  leading-6 text-gray-700 sm:mt-0 col-span-3">Category name: <span
                                    class="font-bold">{{ $child->name }}</span></dd>
                            <dd class="pl-12  leading-6 text-gray-700 sm:mt-0 col-span-3">Category parent: <span
                                    class="font-bold">{{ $category->name }}</span></dd>

                            <dd class="pl-12 text-sm font-medium leading-6 text-gray-900 mb-2 col-span-3">
                                <a class="flex space-x-2" href="{{ route('category.edit', [$child]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="darkgreen" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <span class="text-gray-900">Edit</span>
                                </a>
                            </dd>

                            <dd class="pl-12 text-sm font-medium leading-6 text-gray-900 col-span-3">
                                <form method="POST" action="{{ route('category.destroy', [$child]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="flex space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="darkred" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                        <span class="text-gray-900">Delete</span>
                                    </button>
                                </form>
                            </dd>
                        </div>
                    @endforeach
                @endforeach
            </dl>
            <div class="mt-6 p-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
