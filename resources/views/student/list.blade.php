<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>

    <h1>Student List</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div>
            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>
        <a href="{{ route('students.create') }}">Add Student</a>
        |
        <a href="{{ route('students.export') }}">Export CSV</a>
    </p>

    <h3>Import Students from CSV</h3>

    <form
        action="{{ route('students.import') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <input
            type="file"
            name="csv_file"
            accept=".csv,.txt"
            required
        >

        <button type="submit">Import CSV</button>
    </form>

    <br>

    @if ($students->isEmpty())
        <p>No students found.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->address }}</td>

                        <td>
                            <a href="{{ route('students.show', $student) }}">
                                View
                            </a>

                            <a href="{{ route('students.edit', $student) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('students.destroy', $student) }}"
                                method="POST"
                                style="display:inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Are you sure you want to delete this student?')"
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

</body>
</html>