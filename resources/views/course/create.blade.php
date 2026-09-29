<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<body>

    <h1>Add Course</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <p>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </p>

        <p>
            <label>Description:</label><br>
            <textarea name="description" required>{{ old('description') }}</textarea>
        </p>

        <p>
            <label>Duration:</label><br>
            <input type="text" name="duration" value="{{ old('duration') }}" required>
        </p>

        <p>
            <label>Fee:</label><br>
            <input type="number" name="fee" step="0.01" min="0"
                   value="{{ old('fee') }}" required>
        </p>

        <p>
            <label>Difficulty:</label><br>
            <select name="difficulty" required>
                <option value="">Select Difficulty</option>
                <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>
                    Easy
                </option>
                <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>
                <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>
                    Hard
                </option>
            </select>
        </p>

        <p>
            <label>Active:</label><br>

            <select name="is_active" required>
                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                    Yes
                </option>
                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>
                    No
                </option>
            </select>
        </p>

        <button type="submit">Save Course</button>

        <a href="{{ route('courses.index') }}">
            Back to Course List
        </a>

    </form>

</body>
</html>