@extends('app')

@section('title', 'Product list')

@section('content')
    <x-header form="sort-filter-products"></x-header>

    <!-- content -->
    <div class="flex p-5">
        <div class="sticky top-0 self-start h-auto">
            @php
                $sort = [
                    '' => 'Latest',
                    'a_z' => 'A -> Z',
                    'z_a' => 'Z -> A',
                    'expensive_cheap' => 'Expensive -> Cheap',
                    'cheap_expensive' => 'Cheap -> Expensive',
                    'hight_rating' => 'Hight star -> Low star',
                    'low_rating' => 'Low star -> Hight star',
                ];
            @endphp

            <form id="sort-filter-products" action="{{ route('products.index') }}" method="GET" class="flex flex-col gap-2"
                id="price_form">
                <!-- SORT RESULT: START -->
                <p class="bold-text">Filter:</p>
                @foreach ($sort as $key => $label)
                    <div>
                        <input id="{{ $key }}" type="radio" value="{{ $key }}" name="sortOption"
                            {{ $key == request('sortOption') ? 'checked' : '' }} />
                        <label for="{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                <!-- SORT RESULT: END -->

                <!-- PRICE RANGE: START -->
                <div class="p-2 flex flex-col gap-3">
                    <p class="bold-text">Price range:</p>

                    <div>
                        <input type="number" min="1" name="price_from" placeholder="from"
                            class="input no-border-input w-full" id="price_from" value="{{ request('price_from') }}" />
                        <div class="border-bottom-input"></div>
                    </div>

                    <div>
                        <input type="number" min="1" name="price_to" placeholder="to"
                            class="input no-border-input w-full" id="price_to" value="{{ request('price_to') }}" />
                        <div class="border-bottom-input"></div>
                    </div>

                    <button class=" btn" type="submit" id="price_submit">Search</button>

                    <p id="price-form-message"></p>
            </form>
        </div>
        <!-- PRICE RANGE: END -->

    </div>

    <!-- PRODUCT LIST: START -->
    @if (count($products))
        <ul class="grid grid-cols-4 gap-x-24 gap-y-10 center-x-80 ">
            @foreach ($products as $product)
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
            @endforeach
        </ul>
    @else
        <p>There are no product!</p>
    @endif
    </div>
    <!-- PRODUCT LIST: END -->

@endsection

@section('script')
@endsection
