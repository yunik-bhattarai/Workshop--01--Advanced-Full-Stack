<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
</head>
<body>

    <h1>Course Details</h1>

    <p><strong>ID:</strong> {{ $course->id }}</p>

    <p><strong>Name:</strong> {{ $course->name }}</p>

    <p><strong>Description:</strong> {{ $course->description }}</p>

    <p><strong>Duration:</strong> {{ $course->duration }}</p>

    <p><strong>Fee:</strong> {{ $course->fee }}</p>

    <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>

    <p>
        <strong>Active:</strong>
        {{ $course->is_active ? 'Yes' : 'No' }}
    </p>

    <p>
        <a href="{{ route('courses.edit', $course) }}">
            Edit Course
        </a>
    </p>

    <p>
        <a href="{{ route('courses.index') }}">
            Back to Course List
        </a>
    </p>

</body>
</html>