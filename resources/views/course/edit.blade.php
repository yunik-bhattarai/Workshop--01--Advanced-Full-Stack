<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
</head>
<body>

    <h1>Edit Course</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Name:</label><br>
            <input type="text" name="name"
                   value="{{ old('name', $course->name) }}" required>
        </p>

        <p>
            <label>Description:</label><br>
            <textarea name="description" required>{{ old('description', $course->description) }}</textarea>
        </p>

        <p>
            <label>Duration:</label><br>
            <input type="text" name="duration"
                   value="{{ old('duration', $course->duration) }}" required>
        </p>

        <p>
            <label>Fee:</label><br>
            <input type="number" name="fee" step="0.01" min="0"
                   value="{{ old('fee', $course->fee) }}" required>
        </p>

        <p>
            <label>Difficulty:</label><br>
            <select name="difficulty" required>
                <option value="Easy"
                    {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>
                    Easy
                </option>

                <option value="Medium"
                    {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="Hard"
                    {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>
                    Hard
                </option>
            </select>
        </p>

        <p>
            <label>Active:</label><br>
            <select name="is_active" required>
                <option value="1"
                    {{ old('is_active', $course->is_active) == '1' ? 'selected' : '' }}>
                    Yes
                </option>

                <option value="0"
                    {{ old('is_active', $course->is_active) == '0' ? 'selected' : '' }}>
                    No
                </option>
            </select>
        </p>

        <button type="submit">Update Course</button>

        <a href="{{ route('courses.index') }}">
            Back to Course List
        </a>
    </form>

</body>
</html>