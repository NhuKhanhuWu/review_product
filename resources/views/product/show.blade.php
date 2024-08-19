@extends('app')

@section('title', $product->name)

@section('content')
<!-- login recomment -->
<x-modal></x-modal>

<!-- go back to product list -->
<a href="{{ route('products.index') }}" class="center-x-50 block"><- Go back to list</a>

        <!-- product's infor: start -->
        <div class="flex gap-10 mt-5 center-x-50">
            <!-- left-col -->
            <img src="{{ $product->img_link }}" alt="{{ $product->name }}" class="size-96">

            <!-- right-col -->
            <div>
                <h3 class="font-bold">{{ $product->name }}</h3>
                <p>{{ $product->price }} $</p>
                <p>{{ $product->description }}</p>

                <!-- rating -->
                <x-star-rating :rating="number_format($product->review_avg_star_rating, 1)" />
                {{ $product->review_count }} review(s)
            </div>
        </div>
        <!-- product's infor: end -->

        <!-- product's reviews: start -->
        <div class="center-x-50 mt-5">
            <!-- reviews filter/sort: start -->
            @php
            $review_filter = [
            '' => 'All reviews',
            '1_star' => '1 star',
            '2_star' => '2 stars',
            '3_star' => '3 stars',
            '4_star' => '4 stars',
            '5_star' => '5 stars',
            ];

            $currentFilter = \Request::input('filter');
            @endphp

            <div class="sticky-header">
                <p class="font-semibold">Filter by: </p>

                <div class="flex gap-5">
                    @forelse ($review_filter as $key=>$label)
                    <a href="{{ route('products.show', ['product' => $product, 'filter' => $key]) }}"
                        class="{{ $key === $currentFilter || ($key === '' && $currentFilter === null) ? 'btn-active' : 'btn' }}">
                        {{ $label }}
                    </a>
                    @empty
                    @endforelse
                </div>
            </div>
            <!-- reviews filter/sort: end -->

            <h2 class="font-bold mb-2">Reviews:</h2>

            <!-- write review: star -->
            <form class="my-5 flex flex-col gap-3"
                action="{{ route('reviews.store', ['product_id' => $product, 'user_id' => Auth::id()]) }}"
                method="POST">
                @csrf
                {{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> --}}
                <!-- review -->
                <div class="flex gap-5 h-8" id="review-form-field">
                    <select name="star_rating" class="border-round w-24 no-padding" required>
                        <option value="">Rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} star</option>
                            @endfor
                    </select>

                    <!-- input -->
                    <div class="w-full">
                        <textarea class="no-border-input input w-full h-6 p-0 border-0" type="text" name="review_txt"
                            placeholder="Write your thoughts" id="review-input" required></textarea>
                        <div class="border-bottom-input"></div>
                    </div>
                </div>

                <!-- submit -->
                <div class="w-fit self-end text-sm">
                    <button class="btn-round-white">Cancel</button>
                    <button class="btn-round-black" type="submit">Comment</button>
                </div>
            </form>
            <!-- write review: end -->

            @if (@isset($reviews))
            <ul class="flex flex-col gap-5" id="product_review">
                @foreach ($reviews as $review)
                <x-review :review="$review"></x-review>
                @endforeach
            </ul>
            @else
            <p class="py-5 text-center text-slate-500 text-xl font-medium">Be the first review!</p>
            @endif
        </div>

        {{-- not login => redirect to login page: start --}}
        <script src="{{ URL::asset('js/product_show.js') }}"></script>
        {{-- not login => redirect to login page: end --}}
        @endsection