<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>

    <h1>Student Details</h1>

    <p>
        <strong>ID:</strong>
        {{ $student->id }}
    </p>

    <p>
        <strong>Name:</strong>
        {{ $student->name }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $student->email }}
    </p>

    <p>
        <strong>Phone:</strong>
        {{ $student->phone }}
    </p>

    <p>
        <strong>Date of Birth:</strong>
        {{ $student->date_of_birth }}
    </p>

    <p>
        <strong>Address:</strong>
        {{ $student->address }}
    </p>

    <a href="{{ route('students.edit', $student) }}">
        Edit Student
    </a>

    <br><br>

    <a href="{{ route('students.index') }}">
        Back to Student List
    </a>

</body>
</html>