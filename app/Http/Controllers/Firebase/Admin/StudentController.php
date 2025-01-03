<?php

namespace App\Http\Controllers\Firebase\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;

class StudentController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $students = $this->database->getReference('school/classes')->getValue();
        return view('firebase.admin.students.index', compact('students'));
    }

    public function create()

    {
        $classes = $this->database->getReference('school/classes')->getValue();
        return view('firebase.admin.students.create', compact('classes'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'gender' => 'required|string|in:Male,Female',
        'class_id' => 'required|string',
    ]);

    $classId = $validatedData['class_id'];

    $classReference = $this->database->getReference("school/classes/$classId/students");

$students = $classReference->getValue();

$students = $students ?: [];

$nextStudentIndex = count($students) + 1;
$studentKey = 'student_' . $nextStudentIndex;


    $newStudentData = [
        'name' => $validatedData['name'],
        'age' => $validatedData['age'],
        'gender' => $validatedData['gender'],
    ];

    $classReference->getChild($studentKey)->set($newStudentData);

    return redirect()->route('students.index')->with('success', 'Student added successfully!');
}

    public function edit($classId, $studentId)
    {
        $student = $this->database->getReference("school/classes/$classId/students/$studentId")->getValue();
        return view('firebase.admin.students.edit', compact('student', 'classId', 'studentId'));
    }

    public function update(Request $request, $classId, $studentId)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'gender' => 'required|string|in:Male,Female',
    ]);

    $studentReference = $this->database->getReference("school/classes/$classId/students/$studentId");

    $studentReference->update([
        'name' => $validatedData['name'],
        'age' => $validatedData['age'],
        'gender' => $validatedData['gender'],
    ]);

    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
}

public function destroy($classId, $studentId)
{
    $this->database->getReference("school/classes/$classId/students/$studentId")->remove();
    return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
}

}
