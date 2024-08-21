@php
    $img_src =
        $user->avatar === null
            ? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDwmG52pVI5JZfn04j9gdtsd8pAGbqjjLswg&s'
            : $user->avatar;
@endphp

<div class="flex-col flex">

    <img src="{{ $img_src }}" class="border-2 border-black rounded-full" />
    <p>{{ $user->name }}</p>

    {{-- options --}}
    <a href="{{ route('users.edit', ['user' => Auth::user()]) }}"
        class="{{ \Request::route()->getName() === 'users.edit' ? 'btn-active' : 'btn' }}">Edit profile</a>
    <a href="{{ route('users.review', ['user' => Auth::user()]) }}"
        class="{{ \Request::route()->getName() === 'users.review' ? 'btn-active' : 'btn' }}">Your reviews</a>
</div>
