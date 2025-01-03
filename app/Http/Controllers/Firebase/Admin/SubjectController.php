<?php

namespace App\Http\Controllers\Firebase\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;

class SubjectController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $subjects = $this->database->getReference('school/classes')->getValue();
        return view('firebase.admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $classes = $this->database->getReference('school/classes')->getValue();
        return view('firebase.admin.subjects.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'teacher' => 'required|string',
            'class_id' => 'required|string',
        ]);

        $classId = $validatedData['class_id'];

        $subjectReference = $this->database->getReference("school/classes/$classId/subjects");

        $subjects = $subjectReference->getValue();

        $subjects = $subjects ?: [];

        $nextSubjectIndex = count($subjects) + 1;
        $subjectKey = 'subject_' . $nextSubjectIndex;

        $newSubjectData = [
            'name' => $validatedData['name'],
            'teacher' => $validatedData['teacher'],
        ];

        $subjectReference->getChild($subjectKey)->set($newSubjectData);

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully!');
    }

    public function edit($classId, $subjectId)
    {
        $subject = $this->database->getReference("school/classes/$classId/subjects/$subjectId")->getValue();
        return view('firebase.admin.subjects.edit', compact('subject', 'classId', 'subjectId'));
    }

    public function update(Request $request, $classId, $subjectId)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'teacher' => 'required|string|max:255',
        ]);

        $subjectReference = $this->database->getReference("school/classes/$classId/subjects/$subjectId");

        $subjectReference->update([
            'name' => $validatedData['name'],
            'teacher' => $validatedData['teacher'],
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
    }

    public function destroy($classId, $subjectId)
    {
        $this->database->getReference("school/classes/$classId/subjects/$subjectId")->remove();
        return redirect()->route('subjects.index')->with('success', 'subject deleted successfully!');
    }
}
