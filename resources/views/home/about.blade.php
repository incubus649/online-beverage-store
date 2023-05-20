@extends('layout')
@section('content')
<div class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
  <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
      <div class="lg:pr-4">
        <div class="lg:max-w-lg">
          <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Welcome to Necromancer's Nectar</h1>
          <p class="mt-6 text-xl leading-8 text-gray-700">
            We are an online beverage store like no other, offering a unique platform that connects passionate suppliers directly with discerning customers!
          </p>
        </div>
      </div>
    </div>
    <div class="-ml-12 -mt-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
      <img class="w-[48rem] max-w-none rounded-xl bg-indigo-950 shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem]" src="{{ asset('images/logo.png') }}" alt="">
    </div>
    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
      <div class="lg:pr-4">
        <div class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg">
          <p>
            Our platform revolves around a simple yet powerful concept: we provide a seamless registration process for suppliers, enabling them to showcase their extraordinary drinks on our website. With no need for storage facilities, our suppliers can focus on what they do best: crafting and delivering exceptional beverages that will leave you spellbound.
          </p>
          <p class="mt-8">
            We take pride in curating a diverse selection of drinks that cater to all tastes and preferences. From age-old elixirs brewed by ancient alchemists to contemporary concoctions crafted by visionary mixologists, Necromancer's Nectar is a haven for those seeking truly extraordinary beverages. Whether you're in search of tantalizing potions, potent potions, or rejuvenating tonics, our virtual shelves are stocked with enchantments to delight your senses.
          </p>
          <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">Nectare interitus, vita redit</h2>
          <p class="mt-6">
            At Necromancer's Nectar, we are committed to providing a truly enchanting experience for all beverage aficionados. Whether you are seeking a mystical brew to accompany a special occasion or simply wish to indulge in a moment of personal indulgence, our virtual shelves hold the secrets to elation in every bottle. Join us on this extraordinary journey as we unlock the magic of beverages together. Cheers to a world of endless enchantment!
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection