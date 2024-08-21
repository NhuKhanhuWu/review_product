<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- tailwin -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- css -->
    <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" />

    <!-- custom class -->
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .alert-message {
            @apply text-red-500 text-sm
        }

        .border-round {
            @apply border border-gray-950 rounded-md
        }

        .bold-text {
            @apply font-bold text-lg
        }

        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 bg-slate-200 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-100
        }

        .btn-active {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-200 bg-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-500
        }

        .btn-round-white {
            @apply font-semibold py-2 px-4 rounded-full hover:bg-slate-200
        }

        .btn-round-black {
            @apply font-semibold border-2 py-2 px-4 rounded-full bg-black text-white hover:bg-white hover:text-black ease-in duration-100
        }

        .center-x-30 {
            @apply w-1/3 mx-auto
        }

        .center-x-50 {
            @apply w-1/2 mx-auto
        }

        .center-x-80 {
            @apply w-4/5 mx-auto
        }

        .highlight {
            transition: all 0.3s;
            transform: scale(1.03);
            box-shadow: 0 0 10px 0px rgb(135 135 135);
        }

        .error {
            @apply text-red-500 text-sm
        }

        .form {
            @apply center-x-30 flex flex-col gap-5 border-round px-10 pb-8 bg-white
        }

        .hover-zoom-parent {
            @apply overflow-hidden rounded-md size-fit
        }

        .hover-zoom-child {
            @apply hover:scale-125 transition-all duration-500 cursor-pointer
        }

        .success {
            @apply text-green-500 text-sm
        }

        .sticky-header {
            @apply sticky bg-white z-20 top-0
        }

        .sticky-side-bar {
            @apply sticky left-0 bg-white z-20 mb-10 ml-10
        }

        .top-3rem {
            top: 3rem !important
        }

        .red {
            color: #ff4545;
        }

        .yellow {
            color: #ffa534;
        }

        .yellow-green {
            color: #b7dd29;
        }
    </style>
    {{-- blade-formatter-disable --}}

    <title>@yield('title')</title>
</head>

@php
    $slate_bg_page = ['http://127.0.0.1:8000/api/login', 'http://127.0.0.1:8000/users/create'];
    $is_slate = in_array(Request::url(), $slate_bg_page);
@endphp

<body class="{{ $is_slate ? 'bg-slate-300' : '' }}">
    @yield('content')

    @yield('script')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
