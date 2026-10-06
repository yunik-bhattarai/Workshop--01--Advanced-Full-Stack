@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')

    <h1>Edit Course</h1>

    @include('partials.errors')

    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Name:</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $course->name) }}"
            >
        </p>

        <p>
            <label for="description">Description:</label><br>
            <textarea
                id="description"
                name="description"
            >{{ old('description', $course->description) }}</textarea>
        </p>

        <p>
            <label for="duration">Duration:</label><br>
            <input
                type="number"
                id="duration"
                name="duration"
                min="1"
                value="{{ old('duration', $course->duration) }}"
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
                value="{{ old('fee', $course->fee) }}"
            >
        </p>

        <p>
            <label for="difficulty">Difficulty:</label><br>

            <select id="difficulty" name="difficulty">

                <option
                    value="Easy"
                    {{ old('difficulty', $course->difficulty) === 'Easy' ? 'selected' : '' }}
                >
                    Easy
                </option>

                <option
                    value="Medium"
                    {{ old('difficulty', $course->difficulty) === 'Medium' ? 'selected' : '' }}
                >
                    Medium
                </option>

                <option
                    value="Hard"
                    {{ old('difficulty', $course->difficulty) === 'Hard' ? 'selected' : '' }}
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
                    {{ old('is_active', $course->is_active) ? 'checked' : '' }}
                >
                Active
            </label>
        </p>

        <button type="submit">Update Course</button>

        <a href="{{ route('courses.show', $course) }}">
            Cancel
        </a>

    </form>

@endsection