<div x-data="{ open: false, focus: false }" x-init="init()" @keydown.escape="onEscape"
    @close-popover-group.window="onClosePopoverGroup">
    <button type="button" @mousedown="if (open) $event.preventDefault()" @click="open = true"
        class="hover:text-indigo-950 hover:font-semibold hover:drop-shadow-md" aria-expanded="true"
        :aria-expanded="open.toString()" href="#">
        <span>Catalogue</span>
    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        x-description="Flyout menu, show/hide based on flyout menu state."
        class="absolute left-1/2 z-10 mt-2 flex w-screen max-w-max -translate-x-1/2 px-4" style="display: none;"
        @click.away="open = false">
        <div
            class="w-screen lg:max-w-4xl flex-auto overflow-hidden rounded-sm bg-white text-base leading-6 shadow-lg ring-1 ring-gray-900/5">
            <div class="col-start-2 grid grid-cols-2 gap-x-8">
                <div class="p-4 gap-x-6 ml-4">
                    <a href=" {{ route('listings') }} " class="font-semibold text-gray-900">
                        Alcohol
                    </a>
                </div>
                @foreach ($categories as $category)
                    <div class="row-start-2 grid grid-cols-2 ml-4 gap-y-10 text-sm">
                        <div class="p-4 gap-x-6">
                            <a href=" {{ route('listings', [$category]) }} " class="font-semibold text-gray-900">
                                {{ $category->name }}
                            </a>
                            <ul class="rounded-sm mt-6 space-y-5 sm:mt-4 sm:space-y-3" role="list">
                                @foreach ($category->children as $child)
                                    <li>
                                        <a href=" {{ route('listings', [$category, $child]) }} "
                                            class="mt-1 text-gray-600">
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
