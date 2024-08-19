@isset($review)
<li class="border-round p-4" id="review-{{ $review->id }}">
    <!-- star -->
    <div class="flex items-center gap-2">
        <img src="{{ $review->user->avatar }}" class="h-10 w-10 rounded-full" />

        <div>
            <p class="text-xs">{{ $review->user->name }}</p>
            <x-star-rating :rating="$review->star_rating" />
            <p class="text-xs">Created at {{ $review->created_at->format('d-m-Y') }}</p>

            {{-- like, dislike --}}
            <div>
                {{ $review->countLike($review->id) }}
                <span class="material-symbols-outlined" id="like-{{ $review->id }}">thumb_up</span>

                {{ $review->countDislike($review->id) }}
                <span class="material-symbols-outlined" id="dislike-{{ $review->id }}">thumb_down</span>
            </div>
        </div>
    </div>

    <!-- review txt -->
    <p>{{ $review->review_txt }}</p>
</li>
@endisset