@extends('app')

@section('title', 'Product list')

@section('content')
    <x-header></x-header>

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
                    'hight_rating' => 'Hight rating -> Low rating',
                    'low_rating' => 'Low rating -> Hight rating',
                ];
            @endphp

            <!-- SORT RESULT: START -->
            <p class="bold-text">Sort by:</p>
            <div class="p-2 gap-2 flex flex-col gap-2">
                <x-sort_filter.sort-filter :method="$sort" :hostName="'null'" :hostValue="null" :routeName="'products.index'"
                    :feature="'sort'">
                </x-sort_filter.sort-filter>
            </div>
            <!-- SORT RESULT: END -->

            <!-- PRICE RANGE: START -->
            <div class="p-2 flex flex-col gap-3">
                <p class="bold-text">Price range:</p>
                <form action="{{ route('products.index') }}" method="POST" class="flex flex-col gap-5" id="price_form">
                    @csrf
                    @method('GET')

                    <div>
                        <input type="number" min="1" name="price_from" placeholder="from"
                            class="input no-border-input w-full" id="price_from"
                            value="{{ old('price_from', request()->input('price_from')) }}" />
                        <div class="border-bottom-input"></div>
                    </div>

                    <div>
                        <input type="number" min="1" name="price_to" placeholder="to"
                            class="input no-border-input w-full" id="price_to"
                            value="{{ old('price_to', request()->input('price_to')) }}" />
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
            <ul class="grid grid-cols-4 gap-8 center-x-80 ">
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
