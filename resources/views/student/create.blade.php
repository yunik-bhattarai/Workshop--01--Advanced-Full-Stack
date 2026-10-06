@extends('layouts.app')

@section('title', 'Add Student')

@section('content')

    <h1>Add Student</h1>

    @include('partials.errors')

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name:</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
            >
        </div>

        <br>

        <div>
            <label for="email">Email:</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
            >
        </div>

        <br>

        <div>
            <label for="phone">Phone:</label><br>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
            >
        </div>

        <br>

        <div>
            <label for="date_of_birth">Date of Birth:</label><br>
            <input
                type="date"
                id="date_of_birth"
                name="date_of_birth"
                value="{{ old('date_of_birth') }}"
            >
        </div>

        <br>

        <div>
            <label for="address">Address:</label><br>
            <textarea
                id="address"
                name="address"
            >{{ old('address') }}</textarea>
        </div>

        <br>

        <button type="submit">Save Student</button>

        <a href="{{ route('students.index') }}">
            Back to Student List
        </a>
    </form>

@endsection