@extends('products.layout')
@section('content')
    <div>
        <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-4xl">
                <a href="{{ route('supplier.create') }}">
                    <img class="mx-auto rounded-md w-full shadow-lg hover:shadow-xl"
                        src="{{ asset('images/supplier-image.png') }}" alt="Necromancer's Nectar">
                </a>
                <figure class="mt-10">
                    <div class="text-center text-base font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                        <p>Thank you for your interest in becoming a supplier at Necromancer's Nectar, the premier online
                            beverage store. As a supplier, you have the opportunity to showcase your unique drinks to a wide
                            customer base and be part of our growing community of beverage enthusiasts. </p>
                        <p class="pt-8">Becoming a supplier with us is a straightforward and hassle-free process. You can
                            start by
                            filling <a href="{{ route('supplier.create') }}" class="font-bold hover:underline">this form</a>
                        </p>
                    </div>
                </figure>
            </div>
        </section>
    </div>
@endsection
