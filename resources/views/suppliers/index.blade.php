@extends('users.layout')

@section('content')
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">User Information</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal information.</p>
        </div>
        <div class="mt-6 border-t border-gray-100 gap-x-8">
            <dl class="divide-y divide-gray-100 border-b border-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ auth()->user()->name }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Company name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ auth()->user()->company_name }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Company logo</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <img src="{{ auth()->user()->logo ? asset('storage/' . auth()->user()->logo) : asset('/images/logo.png') }}"
                            alt="{{ auth()->user()->company_name }}" class="h-36 w-36 object-scale-down">
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Company address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ auth()->user()->address }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ auth()->user()->email }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Member since</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ auth()->user()->created_at }}
                    </dd>
                </div>
            </dl>
            <div class="mt-6 flex items-center justify-end gap-x-6 xl:px-96">
                <a href="{{ route('supplier.edit', [auth()->user()]) }}"
                    class="rounded-sm bg-black px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update supplier information
                </a>

                <a href="{{ route('password.edit', [auth()->user()]) }}"
                    class="rounded-sm bg-black px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Change password
                </a>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6 xl:px-96">
                <form method="POST" action="{{ route('user.destroy', [auth()->user()]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="rounded-sm bg-red-900 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                        Delete account
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
