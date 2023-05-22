@extends('layout')
@section('content')
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contact Us</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Thank you for your interest in Necromancer's Nectar, your
                    go-to online beverage store! We value your feedback, inquiries, and suggestions. To get in touch with
                    us, please refer to the following contact information:</p>
            </div>
            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900">
                            <p>
                                <span class="absolute inset-0"></span>
                                Call Us
                            </p>
                        </h3>
                        <p class="mt-5 text-sm leading-6 text-gray-600">
                            We strive to respond to all inquiries within 24 hours, excluding weekends and holidays. If your
                            matter is urgent, we recommend giving us a call for immediate assistance.
                        </p>
                        <p class="text-sm leading-6 text-black font-semibold underline">+371 14031815</p>
                    </div>
                </article>

                <div class="flex max-w-xl flex-col items-start justify-between">
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900">
                            <p>
                                <span class="absolute inset-0"></span>
                                Customer Support
                            </p>
                        </h3>
                        <p class="mt-5 text-sm leading-6 text-gray-600">
                            If you have any questions regarding your orders, products, or general inquiries, our dedicated
                            customer support team is here to assist you. Please send an email to <span
                                class="font-semibold text-black underline">customersupport@necromancersnectar.com</span>,
                            and we'll get back to you as soon as possible.
                        </p>
                    </div>
                </div>

                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900">
                            <p>
                                <span class="absolute inset-0"></span>
                                Feedback and Suggestions
                            </p>
                        </h3>
                        <p class="mt-5 text-sm leading-6 text-gray-600">
                            We value your opinions and ideas to improve our services. If you have any feedback or
                            suggestions, please feel free to reach out to us at <span
                                class="font-semibold text-black underline">feedback@necromancersnectar.com</span>. We
                            appreciate your input and strive to make your experience with us even better.

                        </p>
                    </div>
                </article>
            </div>

            <div class="pt-24 ">
                <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:max-w-4xl">
                        <img class="mx-auto h-48" src="{{ asset('images/small-logo.png') }}" alt="Necromancer's Nectar">
                        <figure class="mt-10">
                            <div class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                                <p>If you have any questions, suggestions, or enchanting tales to share, we'd love to hear
                                    from you. Please don't hesitate to contact us. Our team of sorcerers will be delighted
                                    to assist you on your journey through the realms of tantalizing beverages!</p>
                            </div>
                        </figure>
                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
