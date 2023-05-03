<form action="{{ route('listings') }}">
    <div class="lg:ml-64 lg:mr-64">
        <div class="relative rounded-sm shadow-sm">
            <input type="text" name="search" id="search" class="p-3 md:p-3 block w-full rounded-sm border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:font-large sm:text-md sm:leading-6" placeholder="Search for drink...">
            <div class="absolute inset-y-0 right-0 flex items-center">
                <button id="submit" class="h-full rounded-sm border-0 md:text-md md:font-bold text-white bg-black py-0 pl-4 pr-6 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                    Search
                </button>
            </div>
        </div>
    </div>
</form>
