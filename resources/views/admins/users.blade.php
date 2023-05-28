@extends('users.layout')

@section('content')
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 pb-2 text-gray-900">Users Information</h3>

            <a href="{{ route('admin.users', ['sort' => 'all']) }}" class="text-gray-500 font-semibold block px-6  text-sm">
                All accounts
            </a>
            <a href="{{ route('admin.users', ['sort' => 'customers']) }}"
                class="text-gray-500 font-semibold block px-6  text-sm">
                Accounts: Customers
            </a>
            <a href="{{ route('admin.users', ['sort' => 'suppliers']) }}"
                class="text-gray-500 font-semibold block px-6  text-sm">
                Accounts: Suppliers
            </a>
            <a href="{{ route('admin.users', ['sort' => 'admins']) }}"
                class="text-gray-500 font-semibold block px-6  text-sm">
                Accounts: Admins
            </a>
        </div>
        <div class="mt-6 border-t border-gray-500 gap-x-8">
            <dl class="divide-y divide-gray-500 border-b border-gray-500">
                @foreach ($users as $user)
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 hover:bg-gray-200">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Account Nr. <span
                                class="font-bold">{{ $user->id }}</span></dt>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Account creation date <span
                                class="font-bold">{{ $user->created_at }}</span></dt>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Account role <span class="font-bold">
                                @if ($user->is_admin)
                                    Admin
                                @elseif($user->is_supplier)
                                    Supplier
                                @else
                                    Customer
                                @endif
                            </span></dt>

                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0 col-span-2">Account name: <span
                                class="font-bold">{{ $user->name }}</span></dd>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0 col-span-1">Account email: <span
                                class="font-bold">{{ $user->email }}</span></dd>
                        @if ($user->is_supplier)
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3"> Company name: <span
                                    class="font-bold">{{ $user->company_name }}</span></dd>
                            </dd>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3"> Company address: <span
                                    class="font-bold">{{ $user->address }}</span></dd>
                            </dd>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Company logo</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <img src="{{ $user->logo ? asset('storage/' . $user->logo) : asset('/images/logo.png') }}"
                                        alt="{{ $user->company_name }}" class="object-scale-down">
                                </dd>
                            </div>
                        @endif

                        @if ($user->is_supplier)
                            <dd class="pt-4 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3">
                                <a href="{{ route('supplier.edit', [$user]) }}"
                                    class="rounded-sm bg-black px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Update supplier information
                                </a>
                            </dd>
                        @elseif ($user->is_admin)
                        @else
                            <dd class="pt-4 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3">
                                <a href="{{ route('user.edit', [$user]) }}"
                                    class="rounded-sm bg-black px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Update customer information
                                </a>
                            </dd>
                        @endif

                        @if (!$user->is_admin)
                            <dd class="pt-4 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3">
                                <form method="POST" action="{{ route('user.destroy', [$user]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded-sm bg-red-900 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                        Delete account
                                    </button>
                                </form>
                            </dd>
                        @endif
                    </div>
                @endforeach
            </dl>
            <div class="mt-6 p-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
