@extends('app')

@section('content')
<div class="flex p-10 gap-20">
    <div>
        @php
        $review_filter = [
        '' => 'All reviews',
        '1_star' => '1 star',
        '2_star' => '2 stars',
        '3_star' => '3 stars',
        '4_star' => '4 stars',
        '5_star' => '5 stars',
        ];
        @endphp

        <x-sidebar-user :user='$user' />
        <x-sort_filter.filter :hostName="'user'" :hostValue="$user" routeName="users.review"></x-sort_filter.filter>
    </div>

    <div class="w-full">
        <ul class="flex flex-col gap-5">
            @foreach ($reviews as $review)
            <a href="{{ route('products.show', ['product' => $review->product]) }}#review-{{ $review->id }}">
                <x-review :review="$review"></x-review>
            </a>
            @endforeach
        </ul>
    </div>
</div>
@endsection