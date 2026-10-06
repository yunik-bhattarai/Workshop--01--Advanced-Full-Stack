@extends('layouts.app')

@section('title', 'Courses')

@section('content')

    <h1>Course List</h1>

    <p>
        <a href="{{ route('courses.create') }}">Add Course</a>
    </p>

    @if ($courses->isEmpty())
        <p>No courses found.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Fee</th>
                    <th>Difficulty</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->duration }}</td>
                        <td>{{ $course->fee }}</td>
                        <td>{{ $course->difficulty }}</td>
                        <td>{{ $course->is_active ? 'Yes' : 'No' }}</td>

                        <td>
                            <a href="{{ route('courses.show', $course) }}">
                                View
                            </a>

                            <a href="{{ route('courses.edit', $course) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('courses.destroy', $course) }}"
                                method="POST"
                                style="display:inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Are you sure you want to delete this course?')"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection