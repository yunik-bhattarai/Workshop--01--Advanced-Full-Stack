@extends('layouts.app')

@section('title', 'Add Course')

@section('content')

    <h1>Add Course</h1>

    @include('partials.errors')

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <p>
            <label for="name">Name:</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
            >
        </p>

        <p>
            <label for="description">Description:</label><br>
            <textarea
                id="description"
                name="description"
            >{{ old('description') }}</textarea>
        </p>

        <p>
            <label for="duration">Duration:</label><br>
            <input
                type="number"
                id="duration"
                name="duration"
                min="1"
                value="{{ old('duration') }}"
            >
        </p>

        <p>
            <label for="fee">Fee:</label><br>
            <input
                type="number"
                id="fee"
                name="fee"
                step="0.01"
                min="0"
                value="{{ old('fee') }}"
            >
        </p>

        <p>
            <label for="difficulty">Difficulty:</label><br>
            <select id="difficulty" name="difficulty">
                <option value="">Select Difficulty</option>

                <option
                    value="Easy"
                    {{ old('difficulty') === 'Easy' ? 'selected' : '' }}
                >
                    Easy
                </option>

                <option
                    value="Medium"
                    {{ old('difficulty') === 'Medium' ? 'selected' : '' }}
                >
                    Medium
                </option>

                <option
                    value="Hard"
                    {{ old('difficulty') === 'Hard' ? 'selected' : '' }}
                >
                    Hard
                </option>
            </select>
        </p>

        <p>
            <input type="hidden" name="is_active" value="0">

            <label>
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                >
                Active
            </label>
        </p>

        <button type="submit">Save Course</button>

        <a href="{{ route('courses.index') }}">
            Back to Course List
        </a>

    </form>

@endsection