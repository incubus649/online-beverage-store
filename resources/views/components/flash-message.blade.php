@if (session()->has('message'))
    <div>
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed bottom-6 left-6 transform rounded-md bg-indigo-950 text-white px-6 py-3 z-50">
            <p>
                {{ session('message') }}
            </p>
        </div>
    </div>
@endif
