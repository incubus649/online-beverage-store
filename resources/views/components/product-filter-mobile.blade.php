@props(['filters', 'filterName', 'filterTitle', 'attribute'])

<div x-data="{ open: false }" class="border-gray-200 px-4 py-6">
    <h3 class="-mx-2 -my-3 flow-root">

        <button type="button" x-description="Expand/collapse section button"
            class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
            aria-controls="filter-section-mobile-0" @click="open = !open" aria-expanded="false"
            x-bind:aria-expanded="open.toString()">
            <span class="font-medium text-gray-800">{{ $filterTitle }}</span>
            <span class="ml-6 flex items-center">

                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state."
                    x-show="!(open)" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path
                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>

                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state."
                    x-show="open" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;">
                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>
    </h3>

    <div class="pt-6" x-description="Filter section, show/hide based on section state." id="filter-section-mobile-0"
        x-show="open" style="display: none;">
        <div class="space-y-6">
            @foreach ($filters as $filter)
                @php
                    $attributes = $filter->getAttributes();
                    $values = array_values($attributes);
                    $firstAttribute = $values[0];
                    $secondAttribute = $values[1];
                @endphp
                <div class="flex items-center">
                    @if (is_numeric($firstAttribute))
                        <input id="{{ $firstAttribute }}" name="{{ $filterName }}" onChange="this.form.submit()"
                            value="{{ number_format($firstAttribute, 2) }}" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                    @else
                        <input id="{{ $firstAttribute }}" name="{{ $filterName }}" onChange="this.form.submit()"
                            value="{{ $firstAttribute }}" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                    @endif

                    <label for="{{ $firstAttribute }}" class="ml-3 text-sm text-gray-600">
                        {{ $firstAttribute }}{{ $attribute }}
                        <span>({{ $secondAttribute }})</span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
