@extends('app')

@section('content')
<form action="{{ route('users.store') }}" method="POST" class="form" id="signup-form">
    @csrf
    {{-- <input type="hidden" name="previous_url" value="{{ url()->previous() }}"> --}}

    <h1 class="my-3 text-center text-3xl font-semibold">Signup</h1>

    {{-- Signup fail message: star --}}
    @if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- Signup fail message: end --}}

    {{-- infor: start --}}
    <div>
        <label for="email">Email</label>
        <div>
            <input type="email" name="email" placeholder="Type your email" id="email"
                class="no-border-input input w-full" required />
            <div class="border-bottom-input"></div>
        </div>
    </div>

    <div>
        <label for="password">Password</label>
        <div>
            <input type="password" name="password" placeholder="Type your password" id="password"
                class="no-border-input input w-full" required />
            <div class="border-bottom-input"></div>
        </div>
    </div>

    <div>
        <label for="password">Type password again</label>
        <div>
            <input type="password" placeholder="Type your password again" id="password_check"
                class="no-border-input input w-full" required />
            <div class="border-bottom-input"></div>
        </div>
    </div>

    <div>
        <label for="password">Name</label>
        <div>
            <input type="text" name="name" placeholder="Name" id="name" class="no-border-input input w-full"
                required />
            <div class="border-bottom-input"></div>
        </div>
    </div>
    <button type="submit" class="btn-round-black w-full self-center">SIGNUP</button>
    {{-- infor: end --}}
</form>

<script src="{{ URL::asset('js/signup.js') }}"></script>
@endsection