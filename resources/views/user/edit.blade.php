@extends('app')

@section('content')
    @php
        class Field
        {
            public $type;
            public $id;
            public $value;
            public $isRequired;

            function __construct($type, $id, $value, $isRequired)
            {
                $this->type = $type;
                $this->id = $id;
                $this->value = $value;
                $this->isRequired = $isRequired;
            }
        }

        $form_content = [
            new Field('text', 'name', $user->name, true),
            new Field('email', 'email', $user->email, true),
            new Field('date', 'birth', $user->birth, false),
        ];

        $genders = ['male', 'female'];
    @endphp

    {{-- header --}}
    <x-header></x-header>

    <div class="flex px-10 py-5 gap-20">
        <div class="top-3rem sticky-header self-start ">
            <x-sidebar-user :user='$user' />
        </div>

        <form class="w-full" action="{{ route('users.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- display message: start --}}
            @if (session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- display message: end --}}

            <table class="w-1/2 border-spacing-3 border-separate">
                @foreach ($form_content as $field)
                    <tr>
                        <td class="w-20"><label for="{{ $field->id }}">{{ ucfirst($field->id) }}</label></td>

                        <td>
                            <input {{ $field->isRequired ? 'required' : '' }} class="w-full input no-border-input"
                                placeholder="{{ $field->id }}" name="{{ $field->id }}" id="{{ $field->id }}"
                                type="{{ $field->type }}" value="{{ $field->value }}" />
                            <div class="border-bottom-input"></div>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td>
                        <p for="gender">Gender</p>
                    </td>
                    <td>
                        @foreach ($genders as $gender)
                            <input class="border-round" name="gender" id="{{ $gender }}"
                                value="{{ $gender }}" type="radio"
                                {{ $user->gender === $gender ? 'checked' : '' }} />
                            <label for="{{ $gender }}">{{ $gender }}</label>
                        @endforeach
                    </td>
                </tr>
            </table>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
@endsection
