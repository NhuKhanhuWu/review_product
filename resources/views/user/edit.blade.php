@extends('app')

@section('content')
@php
class Field
{
public $type;
public $id;
public $value;

function __construct($type, $id, $value)
{
$this->type = $type;
$this->id = $id;
$this->value = $value;
}
}

$form_content = [
new Field('text', 'name', $user->name),
new Field('email', 'email', $user->email),
new Field('date', 'birth', $user->birth),
];

$genders = ['male', 'female'];
@endphp

<div class="flex">
    <x-sidebar-user :user='$user' />

    <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            @foreach ($form_content as $field)
            <tr>
                <td><label for="{{ $field->id }}">{{ $field->id }}</label></td>
                <td>
                    <input required class="border-round" placeholder="{{ $field->id }}" name="{{ $field->id }}"
                        id="{{ $field->id }}" type="{{ $field->type }}" value="{{ $field->value }}" />
                </td>
            </tr>
            @endforeach

            <tr>
                <td>
                    <p for="gender">Gender</p>
                </td>
                <td>
                    @foreach ($genders as $gender)
                    <input required class="border-round" name="gender" id="{{ $gender }}"
                        value="{{ $gender }}" type="radio"
                        {{ $user->gender === $gender ? 'checked' : '' }} />
                    <label for="{{ $gender }}">{{ $gender }}</label>
                    @endforeach
                </td>
            </tr>
        </table>

        <button type="submit">Submit</button>
    </form>
</div>
@endsection