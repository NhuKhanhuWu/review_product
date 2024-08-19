@extends('app')

@section('content')
<div class="flex p-10 gap-20">
    <x-sidebar-user :user='$user' />

    <div class="w-full">
        <ul class="flex flex-col gap-5">
            @foreach ($user->reviews as $review)
            <a href="{{ route('products.show', ['product' => $review->product]) }}#review-{{ $review->id }}">
                <x-review :review="$review"></x-review>
            </a>
            @endforeach
        </ul>
    </div>
</div>
@endsection