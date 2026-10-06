@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')

    <h1>Edit Student</h1>

    @include('partials.errors')

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $student->name) }}"
            >
        </div>

        <br>

        <div>
            <label for="email">Email:</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $student->email) }}"
            >
        </div>

        <br>

        <div>
            <label for="phone">Phone:</label><br>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $student->phone) }}"
            >
        </div>

        <br>

        <div>
            <label for="date_of_birth">Date of Birth:</label><br>
            <input
                type="date"
                id="date_of_birth"
                name="date_of_birth"
                value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}"
            >
        </div>

        <br>

        <div>
            <label for="address">Address:</label><br>
            <textarea
                id="address"
                name="address"
            >{{ old('address', $student->address) }}</textarea>
        </div>

        <br>

        <button type="submit">Update Student</button>

        <a href="{{ route('students.show', $student) }}">
            Cancel
        </a>
    </form>

@endsection