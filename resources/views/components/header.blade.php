<nav class="flex justify-between items-center shrink sticky-header h-12 border-b border-slate-300 p-2 top-0">
    <!-- logo -->
    <a class="h-full " href="{{ route('products.index') }}">
        <img class="h-full" src="https://t.ly/3dHzQ" />
    </a>

    <!-- search bar -->
    @if (empty($form))
        @php
            $form = 'search-product';
        @endphp
        <form action="{{ route('products.index') }}" method="GET" id="search-product">
    @endif
    <div class="border px-2 w-96 py-1 flex justify-between items-center border-black rounded-full">
        <input form="{{ $form }}" class="no-border-input w-full" value="{{ request('name') }}" type="text"
            name="name" placeholder="Product name" />

        <button form="{{ $form }}" type="submit" class="flex">
            <span class="material-symbols-outlined">
                search
            </span>
        </button>
    </div>
    @if ($form === 'search-product')
        </form>
    @endif

    {{-- user login, account --}}
    <div class="flex gap-2 items-center">
        @if (Auth::check())
            <a href="{{ route('users.edit', ['user' => Auth::user()]) }}">
                <img src="{{ Auth::user()->avatar }}" class="h-10 rounded-full" />
            </a> |

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
