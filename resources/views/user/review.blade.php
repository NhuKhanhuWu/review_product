@extends('app')

@section('content')
    {{-- header: start --}}
    <x-header></x-header>
    {{-- header: end --}}

    {{-- content: start --}}
    <div class="flex px-10 py-5 gap-20">
        <div class="top-3rem sticky-header self-start ">
            <x-sidebar-user :user='$user' />
        </div>

        <div class="w-full">
            {{-- review filter: star --}}
            @php
                $filter = [
                    '' => 'All reviews',
                    '1_star' => '1 star',
                    '2_star' => '2 stars',
                    '3_star' => '3 stars',
                    '4_star' => '4 stars',
                    '5_star' => '5 stars',
                ];
            @endphp
            <div class="flex gap-2 sticky-header top-3rem p-2">
                <p class="bold-text">Filter</p>
                <x-sort_filter.sort-filter :method="$filter" :feature="'filter'" :hostName="'user'" :hostValue="$user"
                    routeName="users.review"></x-sort_filter.sort-filter>
            </div>
            {{-- review filter: end --}}

            {{-- review: start --}}
            <ul class="flex flex-col gap-5">
                @foreach ($reviews as $review)
                    <a href="{{ route('products.show', ['product' => $review->product]) }}#review-{{ $review->id }}">
                        <x-review :review="$review"></x-review>
                    </a>
                @endforeach
            </ul>
            {{-- review: end --}}
        </div>
    </div>
    {{-- content: end --}}
@endsection
