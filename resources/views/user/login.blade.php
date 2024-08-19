@extends('app')

@section('content')
<form action="{{ route('login_check') }}" method="POST" class="form">
    @csrf
    <input type="hidden" name="pre_url" value="{{ url()->previous() }}">

    <h1 class="my-3 text-center text-3xl font-semibold">Login</h1>

    {{-- Login fail message --}}
    @if (session()->has('message'))
    <p class="alert-message">{{ session('message') }}</p>
    @endif

    {{-- username, pass: start --}}
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
    <button type="submit" class="btn-round-black w-full self-center">LOGIN</button>
    {{-- username, pass: end --}}
</form>
@endsection