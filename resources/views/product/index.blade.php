@extends('app')

@section('title', 'Product list')

@section('content')
<x-account-icon />
<div class="sticky-header">
    @php
    $sort = [
    '' => 'Latest',
    'a_z' => 'A -> Z',
    'z_a' => 'Z -> A',
    'expensive_cheap' => 'Expensive -> Cheap',
    'cheap_expensive' => 'Cheap -> Expensive',
    'hight_rating' => 'Hight rating -> Low rating',
    'low_rating' => 'Low rating -> Hight rating',
    ];
    $currentSort = \Request::input('sort');
    @endphp

    <!-- SORT RESULT: START -->
    <div class="p-2 flex gap-2">
        <p class="bold-text">Sort by:</p>
        <ul class="flex gap-5">
            @foreach ($sort as $key => $label)
            <li>
                <a class="{{ $key === $currentSort || ($key === '' && $currentSort === null) ? 'btn-active' : 'btn' }}"
                    href="{{ route('products.index', ['sort' => $key]) }}">
                    {{ $label }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- SORT RESULT: END -->

    <!-- PRICE RANGE: START -->
    <div class="p-2 flex gap-3">
        <p class="bold-text">Price range:</p>
        <form action="{{ route('products.index') }}" method="POST" class="flex gap-5" id="price_form">
            @csrf
            @method('GET')

            <div>
                <input type="number" min="1" name="price_from" placeholder="from" class="input no-border-input"
                    id="price_from" value="{{ old('price_from', request()->input('price_from')) }}" />
                <div class="border-bottom-input"></div>
            </div>

            <div>
                <input type="number" min="1" name="price_to" placeholder="to" class="input no-border-input"
                    id="price_to" value="{{ old('price_to', request()->input('price_to')) }}" />
                <div class="border-bottom-input"></div>
            </div>

            <button class=" btn" type="submit" id="price_submit">Search</button>

            <p id="price-form-message"></p>
        </form>
    </div>
    <!-- PRICE RANGE: END -->

</div>

<!-- PRODUCT LIST: START -->
<ul class="grid grid-cols-4 gap-8 center-x-80 ">
    @forelse ($products as $product)
    <li class="">
        <a href="{{ route('products.show', ['product' => $product]) }}">
            <!-- img -->
            <div class="hover-zoom-parent">
                <img src="{{ $product->img_link }}" alt="{{ $product->name }}" class="hover-zoom-child" />

            </div>

            <!-- infor -->
            <p>{{ $product->name }}</p>
            <p>{{ $product->price }} $</p>

            <!-- rating -->
            <p>
                <x-star-rating :rating="number_format($product->review_avg_star_rating, 1)" />
                {{ $product->review_count }} review(s)
            </p>
        </a>

    </li>
    @empty
    <li>There are no product!</li>
    @endforelse
</ul>
<!-- PRODUCT LIST: END -->

@endsection

@section('script')
@endsection