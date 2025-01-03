<?php

namespace App\Http\Controllers\Firebase\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;

class StaffController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $staff = $this->database->getReference('school/staff')->getValue();
        return view('firebase.admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('firebase.admin.staff.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
        ]);

        $staff = $this->database->getReference('school/staff')->getValue();
        $newStaffName = 'staff_' . (count($staff ?? []) + 1);

        $newStaffData = [
            'name' => $validatedData['name'],
            'role' => $validatedData['role'],
            'contact' => [
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
            ],
        ];

        $this->database->getReference("school/staff/$newStaffName")->set($newStaffData);

        return redirect()->route('staff.index')->with('success', 'New Staff added successfully!');
    }

    public function edit($id)
    {
        $staff = $this->database->getReference("school/staff/$id")->getValue();
        return view('firebase.admin.staff.edit', compact('staff', 'id'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
        ]);

        $staffRef = $this->database->getReference("school/staff/$id");

        $staffRef->update([
            'name' => $validatedData['name'],
            'role' => $validatedData['role'],
            'contact' => [
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
            ],
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully!');
    }

    public function destroy($id)
    {
        $this->database->getReference("school/staff/$id")->remove();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully!');
    }
}
