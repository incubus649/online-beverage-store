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
        x-description="Dropdown menu, show/hide based on menu state." 
        style="display: none;"
    >
        <div 
            x-data="{ selected: 'menu-item-1' }" 
            class="py-1" 
            role="none"
        >
            <a 
                href="{{ route('listings', ['sort' => 'newest']) }}" 
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
                href="{{ route('listings', ['sort' => 'low-to-high']) }}" 
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
                href="{{ route('listings', ['sort' => 'high-to-low']) }}" 
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