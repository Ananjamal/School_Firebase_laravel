<?php

namespace App\Http\Controllers\Firebase\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;

class SchoolInfoController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $school = $this->database->getReference('school')->getValue();

        return view('firebase.admin.school.main', compact('school'));
    }
    public function edit()
    {
        $school = $this->database->getReference('school')->getValue();
        return view('firebase.admin.school.edit', compact('school'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
        ]);

        $schoolRef = $this->database->getReference('school');
        $schoolRef->update([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'contact' => [
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
            ],
        ]);

        return redirect()->route('dashboard')->with('success', 'School updated successfully!');
    }
}
