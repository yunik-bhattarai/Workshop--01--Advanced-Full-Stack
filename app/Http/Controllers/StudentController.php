<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        return view('student.list', [
            'students' => Student::all(),
        ]);
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created student.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return redirect()
            ->route('students.index')
            ->with('success', "Student {$student->name} created successfully!");
    }

    /**
     * Display a specific student.
     */
    public function show(Student $student)
    {
        return view('student.detail', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing a student.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update a student.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student updated successfully!');
    }

    /**
     * Delete a student.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }

    /**
     * Export students to CSV.
     */
    public function exportCsv()
    {
        $students = Student::all();

        $csv = Writer::createFromString('');

        $csv->insertOne([
            'ID',
            'Name',
            'Email',
            'Phone',
            'Date of Birth',
            'Address',
        ]);

        foreach ($students as $student) {
            $csv->insertOne([
                $student->id,
                $student->name,
                $student->email,
                $student->phone,
                $student->date_of_birth,
                $student->address,
            ]);
        }

        return response($csv->toString(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="students.csv"',
        ]);
    }

    /**
     * Import students from CSV.
     */
    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $csv = Reader::createFromPath(
            $request->file('csv_file')->getRealPath(),
            'r'
        );

        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();

        $imported = 0;

        foreach ($records as $record) {
            if (
                empty($record['Name']) ||
                empty($record['Email']) ||
                empty($record['Phone']) ||
                empty($record['Date of Birth']) ||
                empty($record['Address'])
            ) {
                continue;
            }

            Student::updateOrCreate(
                [
                    'email' => $record['Email'],
                ],
                [
                    'name' => $record['Name'],
                    'phone' => $record['Phone'],
                    'date_of_birth' => $record['Date of Birth'],
                    'address' => $record['Address'],
                ]
            );

            $imported++;
        }

        return redirect()
            ->route('students.index')
            ->with('success', $imported . ' student(s) imported successfully.');
    }
}