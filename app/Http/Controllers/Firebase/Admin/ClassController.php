<?php

namespace App\Http\Controllers\Firebase\Admin;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $classes = $this->database->getReference('school/classes')->getValue();
        return view('firebase.admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('firebase.admin.classes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'grade' => 'required|string',
            'section' => 'required|string',
            'teacher' => 'required|string',
        ]);

        $classes = $this->database->getReference('school/classes')->getValue();
        $newClassName = 'class_' . (count($classes ?? []) + 1);

        $newClassData = [
            'grade' => $validatedData['grade'],
            'section' => $validatedData['section'],
            'teacher' => $validatedData['teacher'],
            'students' => [],
            'subjects' => [],
        ];

        $this->database->getReference("school/classes/$newClassName")->set($newClassData);

        return redirect()->route('classes.index')->with('success', 'New class added successfully!');
    }

    public function edit($id)
    {
        $class = $this->database->getReference("school/classes/$id")->getValue();
        return view('firebase.admin.classes.edit', compact('class', 'id'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'grade' => 'required|string',
            'section' => 'required|string',
            'teacher' => 'required|string',
        ]);
        $classRef = $this->database->getReference("school/classes/$id");

        $classRef->update([
            'grade' => $validatedData['grade'],
            'section' => $validatedData['section'],
            'teacher' => $validatedData['teacher'],
        ]);

        return redirect()->route('classes.index')->with('success', 'Class updated successfully!');
    }

    public function destroy($id)
    {
        $this->database->getReference("school/classes/$id")->remove();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully!');
    }
}
