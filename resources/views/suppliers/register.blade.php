@extends('products.layout')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 pt-12 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-36 w-auto" src="{{ asset('/images/small-logo.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Become a supplier
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input value="{{ old('name') }}" id="name" name="name" type="text" autocomplete="name"
                            required
                            class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="company_name" class="block text-sm font-medium leading-6 text-gray-900">Company Name</label>
                    <div class="mt-2">
                        <input value="{{ old('company_name') }}" id="company_name" name="company_name" type="text"
                            autocomplete="company_name" required
                            class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('company_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="logo" class="block text-sm font-medium leading-6 text-gray-900 pb-8">Company
                        logo</label>
                    <input type="file" id="logo" name="logo"
                        class="border border-gray-200 rounded-sm p-2 w-full">
                    @error('logo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                    <div class="mt-2">
                        <input value="{{ old('address') }}" id="address" name="address" type="text"
                            autocomplete="address" required
                            class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
                    <div class="mt-2">
                        <input value="{{ old('email') }}" id="email" name="email" type="email" autocomplete="email"
                            required
                            class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input value="{{ old('password') }}" id="password" name="password" type="password"
                            autocomplete="current-password" required
                            class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                            Password</label>
                    </div>
                    <div class="mt-2">
                        <input value="{{ old('password_confirmation') }}" id="password_confirmation"
                            name="password_confirmation" type="password" autocomplete="current-password" required
                            class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-sm bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-950">Sign
                        up</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already have an account?
                <a href="{{ route('user.login') }}" class="font-semibold leading-6 text-black hover:text-indigo-950">Log
                    in!</a>
            </p>
        </div>
    </div>
@endsection
