@extends('users.layout')

@section('content')
    <form method="POST" action="{{ route('user.update', [auth()->user()]) }}">
        @csrf
        @method('PUT')
        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">User Information</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal information.</p>
            </div>
            <div class="mt-6 border-t border-gray-100 gap-x-8">
                <dl class="divide-y divide-gray-100 border-b border-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                        <dd
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            <input type="text" name="name" id="name" autocomplete="name"
                                value="{{ auth()->user()->name }}">
                        </dd>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                        <dd
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            <input type="text" name="email" id="email" autocomplete="email"
                                value="{{ auth()->user()->email }}">
                        </dd>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </dl>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6 xl:px-96 mb-12">
            <a href="{{ route('user.dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-sm bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
@endsection
