@isset($rating)
    @if ($rating == 0)
    @else
        @php
            $rating_demical = $rating - floor($rating);

            $color = '';
            if ($rating < 2.6) {
                $color = 'red';
            } elseif ($rating >= 2.6 && $rating < 3.7) {
                $color = 'yellow';
            } else {
                $color = 'yellow-green';
            }
        @endphp

        {{ number_format($rating, 1) }} |
        <span class="text-base {{ $color }}">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $rating || ($i - $rating <= 0.3 && $i > $rating))
                    <ion-icon name="star"></ion-icon>
                @elseif (($i > $rating && $rating_demical < 0.2) || $i - $rating > 1)
                    <ion-icon name="star-outline"></ion-icon>
                @elseif ($rating_demical > 0.2 && $rating_demical <= 0.7)
                    <ion-icon name="star-half-outline"></ion-icon>
                @endif
            @endfor
        </span><br>
    @endif
@endisset
