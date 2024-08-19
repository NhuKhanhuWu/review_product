@if (Auth::check())
    <a href="{{ route('users.edit', ['user' => Auth::user()]) }}">Account</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>LOGOUT</button>
    </form>
@else
    {{ Session::put('pre_url', url()->current()) }}
    <a href="{{ route('login') }}">LOGIN</a>
    <a href="{{ route('users.create') }}">Create account</a>
@endif
