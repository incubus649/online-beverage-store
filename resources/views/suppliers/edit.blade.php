@extends('users.layout')

@section('content')
    <form method="POST" action="{{ route('user.update', [$user]) }}">
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
                                value="{{ $user->name }}">
                        </dd>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Company name</dt>
                        <dd
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            <input type="text" name="company_name" id="company_name" autocomplete="company_name"
                                value="{{ $user->company_name }}">
                        </dd>
                        @error('company_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- company logo -->
                    <div class="col-span-full">
                        <label for="logo" class="block text-sm font-medium leading-6 text-gray-900 pb-8">Company
                            logo</label>
                        <input type="file" id="logo" name="logo"
                            class="border border-gray-200 rounded-sm p-2 w-full">
                        <img src="{{ $user->logo ? asset('storage/' . $user->logo) : asset('/images/small-logo.png') }}"
                            alt="{{ $user->company_name }}" class="h-64 object-cover">
                        @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Address</dt>
                        <dd
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            <input type="text" name="address" id="address" autocomplete="address"
                                value="{{ $user->address }}">
                        </dd>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                        <dd
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            <input type="text" name="email" id="email" autocomplete="email"
                                value="{{ $user->email }}">
                        </dd>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </dl>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6 xl:px-72 mb-72">
            <a href="{{ route('user.dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-sm bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
@endsection
