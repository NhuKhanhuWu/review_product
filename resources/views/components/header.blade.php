<nav class="flex justify-between items-center shrink sticky-header h-12 border-b border-slate-300 p-2 top-0">
    <!-- logo -->
    <a class="h-full " href="{{ route('products.index') }}">
        <img class="h-full" src="https://t.ly/3dHzQ" />
    </a>

    <!-- search bar -->
    <form class="border px-2 py-1 w-1/3 flex justify-between items-center border-black rounded-full"
        action="{{ route('products.index') }}" method="POST">
        @csrf
        @method('GET')

        <input class="w-full no-border-input" required value="{{ request('name') }}" type="text" name="name"
            placeholder="Product name">

        <button type="submit" class="flex">
            <span class="material-symbols-outlined">
                search
            </span>
        </button>
    </form>

    <div class="flex gap-2">
        @if (Auth::check())
            <a href="{{ route('users.edit', ['user' => Auth::user()]) }}">Account</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>LOGOUT</button>
            </form>
        @else
            {{ Session::put('pre_url', url()->current()) }}
            <a href="{{ route('login') }}">LOGIN</a> |
            <a href="{{ route('users.create') }}">SIGN UP</a>
        @endif
    </div>
</nav>
